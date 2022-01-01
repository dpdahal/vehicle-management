<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Backend\BackendController;

use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends BackendController
{
    use ThrottlesLogins;

    protected $maxAttempts = 3;
    protected $decayMinutes = 1;

    public function index()
    {

        return view($this->backendPath . 'admin-login.index', $this->data);

    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ],
        [
            'username.required'=>'Enter username',
            'password.required'=>'Enter password',
        ]);
        if (method_exists($this, 'hasTooManyLoginAttempts') &&
            $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);
            return $this->sendLockoutResponse($request);
        }
        $username = $request->username;
        $password = $request->password;

        $remember = $request->remember ? true : false;

        if (Auth::guard('admin')->attempt(['username' => $username, 'password' => $password], $remember)) {
            return redirect()->intended(route('dashboard'))->with('success', "Welcome back ");
        } else {
            $this->incrementLoginAttempts($request);
            return redirect()->back()->with('error', "Username & Password Incorrect");
        }

    }

    public function username()
    {
        return 'username';
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->intended('admin-login');
    }

}
