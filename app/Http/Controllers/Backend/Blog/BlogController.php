<?php

namespace App\Http\Controllers\Backend\Blog;

use App\Http\Controllers\Backend\BackendController;

use App\Models\Blog\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class BlogController extends BackendController
{
    public function index()
    {
        $this->data('blogData', Blog::orderBy('id', 'DESC')->get());
        return view($this->pagePath . 'blog.blog', $this->data);

    }

    public function create()
    {
        return view($this->pagePath . 'blog.add-blog', $this->data);

    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|unique:blogs,title',
            'slug' => 'required|unique:blogs,slug'
        ]);

        $blog = new Blog();
        $blog->title = $request->title;
        $blog->slug = Str::slug($request->slug);
        $blog->date = $request->date;
        $blog->status = $request->status;
        $blog->meta_title = $request->meta_title;
        $blog->meta_description = $request->meta_description;
        $blog->description = $request->description;
        $blog->image = $this->customFileUpload('uploads/blog', false);
        $blog->posted_by = $this->postedBy();
        if ($blog->save()) {
            return redirect()->route('admin-blog.index')->with('success', 'news was inserted');
        } else {
            return redirect()->back()->with('error', 'there was a problems');
        }
    }


    public function show($id)
    {
        $this->data('blogDetails', Blog::findOrFail($id));
        return view($this->pagePath . 'blog.blog-details', $this->data);
    }


    public function edit($id)
    {
        $newData = Blog::findOrFail($id);
        $this->data('blogData', $newData);
        return view($this->pagePath . 'blog.edit-blog', $this->data);
    }


    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'title' => 'required|', [
                Rule::unique('blogs', 'title')->ignore($id)
            ],
            'slug' => 'required|', [
                Rule::unique('blogs', 'slug')->ignore($id)
            ]

        ]);

        $blog = Blog::findOrFail($id);

        if ($request->hasFile('image')) {
            $this->deleteFile($blog->image);
            $blog->image = $this->customFileUpload('uploads/blog', false);
        }
        $blog->title = $request->title;
        $blog->slug = Str::slug($request->title);
        $blog->date = $request->date;
        $blog->status = $request->status;
        $blog->meta_title = $request->meta_title;
        $blog->meta_description = $request->meta_description;
        $blog->description = $request->description;
        $blog->posted_by = $this->postedBy();
        if ($blog->update()) {
            return redirect()->route('admin-blog.index')->with('success', 'news was updated');
        } else {
            return redirect()->back()->with('error', 'there was a problems');
        }
    }


    public function destroy($id)
    {

        $findData = Blog::findOrFail($id);
        if ($this->deleteFile($findData->image)  &&
            $findData->delete()) {
            return redirect()->route('admin-blog.index')->with('success', 'news was deleted');
        } else {
            return redirect()->back()->with('error', 'there was a problems');
        }

    }

    public function updateBlogStatus(Request $request)
    {
        if ($request->isMethod('get')) {
            return redirect()->back();
        }

        if ($request->isMethod('post')) {
            $criteria = $request->criteria;
            $result = Blog::findOrFail($criteria);
            if (isset($_POST['enable'])) {
                $result->status = 0;
                $message = "blog was not publish";

            }
            if (isset($_POST['disable'])) {
                $result->status = 1;
                $message = "blog was  publish";
            }


            if ($result->update()) {
                return redirect()->back()->with('success', $message);
            }
        }


    }
}
