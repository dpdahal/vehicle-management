<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Blog\Blog;
use App\Models\Blog\BlogComments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends FrontendController
{

    public function index()
    {
        return view($this->pagePath . 'home.home', $this->data);
    }

    public function blog(Request $request)
    {
        if ($request->criteria) {
            $slug = $request->criteria;
            $this->data('blogData', Blog::where('slug', '=', $slug)->first());
            $this->data('relatedBlogData',Blog::where('slug','!=',$slug)->get());
            return view($this->pagePath . 'blog.blog-details', $this->data);
        } else {
            $this->data('blogData', Blog::orderBy('id', 'desc')->get());
            return view($this->pagePath . 'blog.index', $this->data);
        }

    }

    public function blogComment(Request $request){
        if (!Auth::guard('web')->user()) {
            session(['last_product_page_id' => url()->previous()]);
            return redirect()->route('login');
        }

        if ($request->isMethod('get')) {
            return redirect()->back();
        }

        if ($request->isMethod('post')) {
            $request->validate([
                'body' => 'required',
            ]);
            $input = $request->all();
            $input['user_id'] = Auth::guard('web')->user()->id;
            BlogComments::create($input);
            return back();
        }
    }
}
