<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Backend\BackendController;
use App\Models\Admin\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class AdminController extends BackendController
{

    public function index()
    {
        $adminUsers = Admin::all();
        $this->data('adminUserData', $adminUsers);
        return view($this->pagePath . 'super-admin.index', $this->data);

    }


    public function create()
    {
        return view($this->pagePath . 'super-admin.create', $this->data);

    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3|max:200',
            'username' => 'required|min:3|max:20|unique:admins,username',
            'email' => 'required|unique:admins,email',
            'password' => 'required|min:5|max:20|confirmed',
            'password_confirmation' => 'required',
            'gender' => 'required',
            'image' => 'mimes:jpg,jpeg,png,gif',
            'date_of_birth' => 'required',
        ]);
        $adminObject = new Admin();
        $adminObject->name = $request->name;
        $adminObject->username = $request->username;
        $adminObject->slug = Str::slug($request->name);
        $adminObject->email = $request->email;
        $adminObject->password = bcrypt($request->password);
        $adminObject->gender = $request->gender;
        $adminObject->date_of_birth = $request->date_of_birth;
        $adminObject->phone = $request->phone;
        $adminObject->image = $this->customFileUpload('uploads/admins');
        if ($adminObject->save()) {
            return redirect()->route('super-admin.index')->with('success', 'Successfully Register');
        } else {
            return redirect()->back()->with('error', 'There was a problems');
        }
    }


    public function show($id)
    {

        $adminData = Admin::where('slug', '=', $id)
            ->orWhere('id', '=', $id)
            ->first();
        $this->data('adminData', $adminData);
        return view($this->pagePath . 'super-admin.show', $this->data);

    }

    public function edit($id)
    {
        $adminUsers = Admin::where('slug', '=', $id)->first();
        $this->data('adminUser', $adminUsers);
        return view($this->pagePath . 'super-admin.update', $this->data);

    }


    public function update(Request $request, $id)
    {
        $id = $request->criteria;
        $this->validate($request, [
            'name' => 'required|min:3|max:200',
            'username' => 'required|min:3|max:20|', [
                Rule::unique('admins', 'username')
                    ->ignore($id)
            ],
            'email' => 'required|', [
                Rule::unique('admins', 'email')
                    ->ignore($id)
            ],
            'gender' => 'required',
            'image' => 'mimes:jpg,jpeg,png,gif'
        ]);


        $adminObject = Admin::findOrFail($id);
        $adminObject->name = $request->name;
        $adminObject->username = $request->username;
        $adminObject->slug = Str::slug($request->name);
        $adminObject->email = $request->email;
        $adminObject->gender = $request->gender;
        if ($request->hasFile('image')) {
            $this->deleteFile($adminObject->image);
            $adminObject->image = $this->customFileUpload('uploads/admins');


        }

        if ($adminObject->update()) {
            return redirect()->route('super-admin.index')->with('success', 'Successfully Updated');
        } else {
            return redirect()->back()->with('error', 'There was a problems');
        }
    }


    public function destroy($id)
    {
        $aObj = Admin::findOrFail($id);

        if ($this->deleteFile($aObj->image) && $aObj->delete()) {
            return redirect()->back()->with('success', 'Successfully Deleted');
        } else {
            return redirect()->back()->with('error', 'There was a problems');
        }

    }

    public function updateAdminStatus(Request $request)
    {
        if ($request->isMethod('get')) return redirect()->back();

        if ($request->isMethod('post')) {
            $criteria = $request->criteria;
            $adminObj = Admin::findOrFail($criteria);
            if (isset($_POST['active'])) {
                $adminObj->status = 0;
                $message = 'Status was inactive';
            }

            if (isset($_POST['inactive'])) {
                $adminObj->status = 1;
                $message = 'Status was active';
            }

            if ($adminObj->update()) {
                return redirect()->back()->with('success', $message);
            }
        }
        return redirect()->back();
    }

    public function passwordChange(Request $request)
    {
        if ($request->isMethod('get')) {
            return view($this->pagePath . 'super-admin.change-password', $this->data);
        }

        if ($request->isMethod('post')) {
            $adminObj = Auth::guard('admin')->user();
            $adminPassword = $adminObj->password;
            $this->validate($request, [
                'old_password' => 'required|old_password:' . $adminPassword,
                'password' => 'required|min:5|max:20|confirmed',
                'password_confirmation' => 'required',
            ], [
                'old_password.old_password' => 'old password  not match'
            ]);

            $adminObj->password = bcrypt($request->password);
            if ($adminObj->update()) {
                return redirect()->back()->with('success', 'successfully change password');
            }

            return redirect()->back();

        }
    }
}
