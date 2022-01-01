<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User\User;
use App\Models\User\UserVerify;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class UserLoginController extends FrontendController
{
    public function index()
    {
        return view($this->frontendPath . 'user.login', $this->data);
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required'
        ]);
        $userName = $request->username;
        $password = $request->password;
        $remember_me = isset($request->remember_me) ? true : false;

        if (Auth::guard('web')->attempt(['username' => $userName, 'password' => $password], $remember_me)) {
            if (Auth::guard('web')->user()->email_verified_at == null) {
                Auth::guard('web')->logout();
                return redirect(route('login'))->with('error', 'Please verify your email to continue');
            }
            if (session()->has('last_product_page_id')) {
                $lastUrl = session('last_product_page_id');
                $request->session()->forget('last_product_page_id');
                return redirect()->intended($lastUrl);
            } else {
                return redirect()->intended(route('users'));
            }

        } else {
            return redirect()->back()->with('error', 'Provide information not match');
        }

    }

    public function verificationUser($token)
    {
        $verifiedBUser = UserVerify::where('token', $token)->first();
        if (isset($verifiedBUser)) {
            $user = $verifiedBUser->user;
            if (!$user->email_verified_at) {
                $user->email_verified_at = Carbon::now();
                $user->save();
                return \redirect(route('login'))->with('success', 'Your email has been verified');
            } else {
                return \redirect()->back()->with('info', 'Your email has already been verified');
            }
        } else {
            return \redirect(route('login'))->with('error', 'Something went wrong!!');
        }
    }

    public function logout()
    {
        Auth::guard('web')->logout();
        return redirect()->intended(route('login'));
    }


    public function forgotPassword(Request $request)
    {
        if ($request->isMethod('get')) {
            return view($this->frontendPath . 'buyer.forgot-password', $this->data);
        }

        if ($request->isMethod('post')) {
            $this->validate($request, [
                'email' => ['required', new UserEmailExists],
            ]);
            $email = $request->email;
            $token = md5(uniqid(microtime()));
            $resetUrl = url("password-reset?_email=$email&&_token=$token");

            $data['email'] = $request->email;;
            $data['resetUrl'] = $resetUrl;
            Mail::to($email)->send(new UserPasswordReset($data));
            $saveData['email'] = $email;
            $saveData['token'] = $token;
            DB::table('user_password_reset')->insert($saveData);
            return redirect()->back()->with('success', 'Please check your email address');

        }

        return redirect()->back();
    }

    public function passwordReset(Request $request)
    {
        if ($request->isMethod('get')) {
            $email = $request->_email;
            $token = $request->_token;
            $data = DB::table("user_password_reset")->where('email', '=', $email)
                ->where('token', '=', $token)
                ->count();
            if ($data > 0) {
                $this->data('criteria', $email);
                return view($this->frontendPath . 'buyer.password-reset-complete', $this->data);

            } else {
                return redirect()->back()->with('error', 'invalid access');
            }

        }

        if ($request->isMethod('post')) {
            $criteria = $request->criteria;
            $this->validate($request, [
                'password' => 'required|min:5|max:20|confirmed',
                'password_confirmation' => 'required',
            ]);
            $password = bcrypt($request->password);
            $object = User::where('email', '=', $criteria)->first();
            $object->password = $password;
            if ($object->update()) {
                DB::table('user_password_reset')->where('email', '=', $criteria)->delete();
                return redirect()->route('login')->with('success', "Password was successfully change goto login page");
            } else {
                return redirect()->back()->with('error', 'invalid access');
            }


        }
    }


    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function Callback($provider)
    {
        $userSocial = Socialite::driver($provider)->stateless()->user();
        $users = User::where(['email' => $userSocial->getEmail()])->first();
        if ($users) {
            Auth::guard('web')->login($users);
            return redirect('/')->with('success', 'You are login from ' . $provider);
        } else {
            $user = User::create([
                'full_name' => $userSocial->getName(),
                'email' => $userSocial->getEmail(),
                'image' => $userSocial->getAvatar(),
                'provider_id' => $userSocial->getId(),
                'provider' => $provider,
            ]);
            return redirect()->route('index');
        }

    }
}
