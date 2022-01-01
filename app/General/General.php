<?php

namespace App\General;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

trait General
{
    public function __construct()
    {
        $this->makeTitle();
    }


    public $data = [];

    public function data($key, $value = '')
    {
        if (empty($key)) throw new \Exception('Key is messing');
        return $this->data[$key] = $value;
    }

    /*
     * making title
     */
    public function makeTitle(): string
    {
        $serverName = env('APP_NAME');
        $path = Request::path();
        if ($path == '/') {
            $path = $serverName;
        }
        return str_replace('/', ' | ', $path);

    }

    private $thNail = '';


    public function makeThumbnail()
    {

        return $this->thNail;
    }

    public function customFileUpload($directionPath = '', $thumbnail = false, $thumbnailWidth = 300, $thumbnailHeight = 250)
    {
        if (!empty(Request::file())) {
            $directionPath = trim($directionPath, '/');
            $files = Request::file();
            $file = Arr::first($files);
            $ext = $file->getClientOriginalExtension();
            $imageName = md5(microtime()) . '.' . Str::lower($ext);
            $directionPath = trim($directionPath, '/');
            $uploadPath = public_path($directionPath);
            if (!File::exists($uploadPath)) {
                File::makeDirectory($directionPath, 0755, true);
            }

            if ($thumbnail == true) {
                $tmPath = $uploadPath . '/thumbnail/';
                if (!file_exists($tmPath)) {
                    File::makeDirectory($tmPath, 0755, true);
                }
                $thumbnailPath = public_path($directionPath . '/thumbnail/' . $imageName);
                $img = Image::make($file->getRealPath())->resize($thumbnailWidth, $thumbnailHeight);
                $img->save($thumbnailPath);
                $this->thNail = $directionPath . '/thumbnail/' . $imageName;
            }

            if (!$file->move($uploadPath, $imageName)) {
                return Redirect::back()->with('error', 'file upload errors');
            }
            return $directionPath . '/' . $imageName;

        }

        return false;
    }


    public function deleteThumbnail($thumbnail)
    {
        $thumbnailPath = public_path($thumbnail);
        if (file_exists($thumbnailPath) && is_file($thumbnailPath)) {
            unlink($thumbnailPath);
            return true;
        }
        return true;
    }

    public function deleteFile($filePath)
    {

        $getFilePath = public_path($filePath);

        if (file_exists($getFilePath) && is_file($getFilePath)) {
            unlink($filePath);
            return true;
        }


        return true;

    }

    protected function postedBy()
    {

        return Auth::guard('admin')->user()->id;
    }


    public function ShowMessage($messageType = 'success', $msg = '')
    {
        return redirect()->back()->with($messageType, $msg);
    }


}
