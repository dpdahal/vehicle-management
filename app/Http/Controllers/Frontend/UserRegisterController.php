<?php

namespace App\Http\Controllers\Frontend;

use App\Mail\User\UserVerification;
use App\Models\User\User;
use App\Models\User\UserVerify;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class UserRegisterController extends FrontendController
{
    public function index()
    {
        return view($this->frontendPath . 'user.register', $this->data);
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'full_name' => 'required',
            'username' => 'required|min:5|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:5'
        ]);

        $data = $request->all();
        $data['password'] = bcrypt($request->password);
        $user = User::create($data);
        $userId = $user->id;
        UserVerify::create([
            'token' => Str::random(60),
            'user_id' => $userId,
        ]);
        Mail::to($user->email)->send(new UserVerification($user));
        return \redirect()->route('login')->with('success', 'Please click on the link sent to your email');

    }

}
