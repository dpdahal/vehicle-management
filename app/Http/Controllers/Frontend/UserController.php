<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

class UserController extends FrontendController
{

    public function index(Request $request)
    {
        return view($this->frontendPath . 'user.index', $this->data);
    }
}
