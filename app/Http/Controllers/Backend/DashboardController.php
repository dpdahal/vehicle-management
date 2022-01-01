<?php

namespace App\Http\Controllers\Backend;

use App\Models\Blog\Blog;
use App\Models\City\City;
use App\Models\User\User;
use Illuminate\Http\Request;

class DashboardController extends BackendController
{

    public function index()
    {

        $this->data('totalCity',City::count());
        $this->data('totalCustomers',User::count());
        $this->data('totalBlog',Blog::count());
        return view($this->pagePath . 'dashboard.dashboard', $this->data);
    }


    public function customerList()
    {
        $this->data('userData', User::all());
        return view($this->pagePath . 'user.index', $this->data);
    }

    public function customerDetails(Request $request)
    {
        $id = $request->criteria;
        $this->data('userData', User::findOrFail($id));
        return view($this->pagePath . 'user.show', $this->data);
    }
}
