<?php

namespace App\Http\Controllers\Backend\TripPage;

use App\Http\Controllers\Backend\BackendController;
use App\Models\DestinationRate\DestinationRate;
use App\Models\TripPage\TripPage;
use App\Models\TripPage\TripPageGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class TripPageController extends BackendController
{
    public function deleteGalleryImage($packageId)
    {
        $totalImage = TripPageGallery::where('trip_page_id', '=', $packageId)->get();
        foreach ($totalImage as $image) {
            $imagePath = $image->image_name;
            if (file_exists($imagePath) && is_file($imagePath)) {
                unlink($imagePath);
            }
        }

        return true;

    }


    public function tripGallery(Request $request)
    {

        $id = $request->criteria;
        $pgData = TripPageGallery::where('trip_page_id', '=', $id)->get();
        $this->data('tripGalleryData', $pgData);
        $this->data('packageId', $id);
        return view($this->pagePath . 'trip-page.gallery', $this->data);

    }

    public function deleteSingleGallery($id)
    {
        $totalImage = TripPageGallery::where('id', '=', $id)->first();
        $imagePath = $totalImage->image_name;
        if (file_exists($imagePath) && is_file($imagePath)) {
            return unlink($imagePath);
        }

        return true;
    }

    public function tripGalleryImageDelete(Request $request)
    {
        $id = $request->criteria;
        $this->deleteSingleGallery($id);
        TripPageGallery::where('id', '=', $id)->delete();
        return redirect()->back()->with('success', 'gallery image was deleted');


    }

    public function tripGalleryAddImage(Request $request)
    {
        if ($request->isMethod('get')) {
            return redirect()->back();
        }

        if ($request->isMethod('post')) {
            $this->validate($request, [
                'images' => 'required'
            ]);
            if ($request->hasFile('images')) {
                $files = $request->file('images');
                $uploadLocation = public_path('uploads/trip/trip-gallery');
                if (!File::exists($uploadLocation)) {
                    File::makeDirectory($uploadLocation, 0755, true);
                }
                $packageId = $request->package_id;
                foreach ($files as $file) {
                    $ext = $file->getClientOriginalExtension();
                    $imageName = md5(microtime()) . '.' . strtolower($ext);
                    $fileName = 'uploads/trip/trip-gallery' . '/' . $imageName;
                    if ($file->move($uploadLocation, $imageName)) {
                        TripPageGallery::create(
                            [
                                'image_name' => $fileName,
                                'trip_page_id' => $packageId
                            ]
                        );
                    }

                }

                return redirect()->back()->with('success', 'Image was successfully inserted');
            }

//
        }

        return redirect()->back();

    }

    public function tripGalleryEditImage(Request $request)
    {
        $id = $request->criteria;
        $galleryImage = TripPageGallery::where('id', '=', $id)->first();
        $this->data('tripGalleryData', $galleryImage);
        return view($this->pagePath . 'trip-page.gallery-edit', $this->data);
    }

    public function tripGalleryEditImageAction(Request $request)
    {
        if ($request->isMethod('get')) {
            return redirect()->back();
        }
        if ($request->isMethod('post')) {
            if (!empty($request->hasFile('images'))) {
                $id = $request->criteria;
                $this->deleteSingleGallery($id);
                $imageName = $this->customFileUpload('uploads/trip/trip-gallery');
                $obj = TripPageGallery::findOrFail($id);
                $obj->image_name = $imageName;
                $obj->save();
                return redirect()->back()->with('success', 'image was successfully change');

            }

        }

        return redirect()->back();
    }


    public function index(Request $request)
    {
        $tripPageData = TripPage::orderBy('id', 'DESC')->get();
        $this->data('tripPageData', $tripPageData);
        return view($this->pagePath . 'trip-page.index', $this->data);
    }


    public function create()
    {
        $this->data('destinationCost', DestinationRate::all());
        return view($this->pagePath . 'trip-page.create', $this->data);
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'slug' => 'required',
            'start_from' => 'required',
            'ends_at' => 'required',
            'image' => 'mimes:jpg,jpeg,png,gif',
            'status' => 'required',
            'trip_cost' => 'required'
        ], [
                'status.required' => 'Required'
            ]
        );
        $data['title'] = $request->title;
        $data['slug'] = Str::slug($request->slug);
        $data['price'] = $request->price;
        $data['discount_price'] = $request->discount_price;
        $data['start_from'] = $request->start_from;
        $data['ends_at'] = $request->ends_at;
        $data['status'] = $request->status;
        $data['trip_mode'] = $request->trip_mode;
        $data['trip_cost'] = $request->trip_cost;
        if ($request->hasFile('image')) {
            $data['image'] = $this->customFileUpload('uploads/trip', true);
            $data['thumbnail'] = $this->makeThumbnail();
        }

        $data['meta_keywords'] = $request->meta_keywords;
        $data['meta_description'] = $request->meta_description;
        $data['description'] = $request->description;

        $package = TripPage::create($data);
        if ($package) {
            $lastId = (int)$package->id;
            if ($request->hasFile('package_image_name')) {
                $files = $request->file('package_image_name');
                $uploadLocation = public_path('uploads/trip/trip-gallery');
                if (!File::exists($uploadLocation)) {
                    File::makeDirectory($uploadLocation, 0755, true);
                }

                foreach ($files as $file) {
                    $productImageObject = new TripPageGallery();
                    $ext = $file->getClientOriginalExtension();
                    $imageName = md5(microtime()) . '.' . strtolower($ext);
                    $fileName = 'uploads/trip/trip-gallery' . '/' . $imageName;
                    if ($file->move($uploadLocation, $imageName)) {
                        $productImageObject->image_name = $fileName;
                        $productImageObject->trip_page_id = $lastId;
                        $productImageObject->save();
                    }

                }

            }


            return redirect()->route('admin-trip-page.index')->with('success', 'Package was successfully inserted');


        } else {
            return redirect()->back()->with('error', 'There was a problems');
        }


    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $this->data('destinationCost', DestinationRate::all());
        $this->data('tripPageData', TripPage::findOrFail($id));
        return view($this->pagePath . 'trip-page.edit', $this->data);
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
                'title' => 'required',
                'slug' => 'required',
                'summary' => 'required',
                'image' => 'mimes:jpg,jpeg,png,gif',
            ]
        );
        $package = Package::findOrFail($id);
        $package->title = $request->title;
        $package->slug = Str::slug($request->slug);
        $package->date = $request->date;
        if ($request->hasFile('image')) {
            if ($request->hasFile('image')) {
                $this->DeleteFile($id);
                $this->deleteThumbnail($id, true);
                $package->image = $this->customFileUpload('uploads/package', true);
                $package->thumbnail = $this->makeThumbnail();
            }
        }

        $package->summary = $request->summary;
        $package->meta_description = $request->meta_description;
        $package->description = $request->description;
        $package->posted_by = $this->postedBy();
        $package->duration = $request->duration;
        $package->trip_grading = $request->trip_grading;
        $package->max_altitude = $request->max_altitude;
        $package->best_time = $request->best_time;
        $package->trip_mode = $request->trip_mode;
        $package->group_size = $request->group_size;

        if ($package->save()) {
            if (!empty($request->package_description)) {
                $res = PackageDetailItinerary::where('package_id', $id)->get();
                if ($res->count() < 1) {
                    PackageDetailItinerary::create([
                        'package_id' => $id,
                        'package_description' => $request->package_description
                    ]);
                } else {

                    PackageDetailItinerary::where('package_id', $id)->update([
                        'package_id' => $id,
                        'package_description' => $request->package_description
                    ]);

                }


            }
            if (!empty($request->package_important_infos)) {
                $res = PackageImportantInfo::where('package_id', $id)->get();
                if ($res->count() < 1) {
                    PackageImportantInfo::create([
                        'package_id' => $id,
                        'package_important_infos' => $request->package_important_infos
                    ]);
                } else {
                    PackageImportantInfo::where('package_id', $id)->update([
                        'package_id' => $id,
                        'package_important_infos' => $request->package_important_infos
                    ]);

                }

            }


//


            return redirect()->route('package.index')->with('success', 'Package was successfully inserted');


        } else {
            return redirect()->back()->with('error', 'There was a problems');
        }


    }


    public function destroy($id)
    {
        $tripObject = TripPage::findOrFail($id);

        $this->deleteGalleryImage($id);

        $this->deleteFile($tripObject->image);
        $this->deleteThumbnail($tripObject->thumbnail);
        $tripObject->delete();
        return redirect()->route('admin-trip-page.index')->with('success', 'trip was deleted');

    }


    public function updateStatus(Request $request)
    {
        if ($request->isMethod('get')) {
            return redirect()->back();
        }

        if ($request->isMethod('post')) {
            $criteria = $request->criteria;
            $result = Package::findOrFail($criteria);
            if (isset($_POST['enable'])) {
                $result->status = 0;
                $message = "package was not publish";

            }
            if (isset($_POST['disable'])) {
                $result->status = 1;
                $message = "package was  publish";
            }
            if ($result->update()) {
                return redirect()->back()->with('success', $message);
            }
        }

        return redirect()->back();

    }


}
