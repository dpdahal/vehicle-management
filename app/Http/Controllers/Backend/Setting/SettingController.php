<?php

namespace App\Http\Controllers\Backend\Setting;

use App\Http\Controllers\Backend\BackendController;
use App\Models\Setting\Setting;
use Illuminate\Http\Request;

class SettingController extends BackendController
{
    public function totalCompany()
    {
        return Setting::count();
    }

    public function deleteFile($id)
    {
        $criteria = $id;
        $objectData = Setting::findOrFail($criteria);
        $imageName = $objectData->logo;
        $fileLocation = public_path('uploads/logo/' . $imageName);
        if (file_exists($fileLocation) && is_file($fileLocation)) {
            unlink($fileLocation);
            return true;
        } else {
            return true;
        }

    }

    public function index(Request $request)
    {
        if ($request->isMethod('get')) {
            $settingData = Setting::all();
            if ($settingData->count() > 0) {
                $settingData = $settingData[0];
            } else {
                $settingData = [
                    'id' => '',
                    'company_name' => '',
                    'company_email' => '',
                    'company_address' => '',
                    'company_phone' => '',
                    'company_mobile' => '',
                    'company_logo' => '',
                    'company_fax' => '',
                    'company_post_box' => '',
                    'company_website' => '',
                    'meta_keywords' => '',
                    'meta_description' => ''

                ];
                $settingData = (object)$settingData;

            }

            $this->data('settingData', $settingData);
            return view($this->pagePath . 'setting.setting', $this->data);
        }

        if ($request->isMethod('post')) {
            $this->validate($request, [
                'company_name' => 'required'
            ]);

            $criteria = $request->company_id;
            if (!empty($criteria)) {
                $Object = Setting::findOrFail($criteria);
                $Object->company_name = $request->company_name;
                $Object->company_email = $request->company_email;
                $Object->company_address = $request->company_address;
                $Object->company_phone = $request->company_phone;
                $Object->company_mobile = $request->company_mobile;
                $Object->company_fax = $request->company_fax;
                $Object->company_post_box = $request->company_post_box;
                $Object->meta_keywords = $request->meta_keywords;
                $Object->meta_description = $request->meta_description;
                if ($request->hasFile('logo')) {
                    $file = $request->file('logo');
                    $ext = strtolower($file->getClientOriginalExtension());
                    $fileName = md5(microtime()) . '.' . $ext;
                    $uploadPath = public_path('uploads/logo');
                    if ($this->deleteFile($criteria) && $file->move($uploadPath, $fileName)) {
                        $Object->company_logo = $fileName;
                    } else {
                        return redirect()->back()->with('error', 'File upload error');
                    }
                }
                if ($Object->update()) {
                    return redirect()->back()->with('success', 'Successfully updated');
                } else {
                    return redirect()->back()->with('error', 'There was a problems');
                }
            } else {
                if ($this->totalCompany() > 0) {
                    return redirect()->back()->with('error', 'Only one Company add allows');
                } else {
                    $Object = new Setting();
                    $Object->company_name = $request->company_name;
                    $Object->company_email = $request->company_email;
                    $Object->company_address = $request->company_address;
                    $Object->company_phone = $request->company_phone;
                    $Object->company_mobile = $request->company_mobile;
                    $Object->company_fax = $request->company_fax;
                    $Object->company_post_box = $request->company_post_box;
                    $Object->meta_keywords = $request->meta_keywords;
                    $Object->meta_description = $request->meta_description;
                    if ($request->hasFile('logo')) {
                        $file = $request->file('logo');
                        $ext = strtolower($file->getClientOriginalExtension());
                        $fileName = md5(microtime()) . '.' . $ext;
                        $uploadPath = public_path('uploads/logo');
                        if ($file->move($uploadPath, $fileName)) {
                            $Object->company_logo = $fileName;
                        } else {
                            return redirect()->back()->with('error', 'File upload error');
                        }
                    }

                    if ($Object->save()) {
                        return redirect()->back()->with('success', 'Successfully Insert');
                    } else {
                        return redirect()->back()->with('error', 'There was a problems');
                    }
                }

            }
        }

        return redirect()->back();
    }
}
