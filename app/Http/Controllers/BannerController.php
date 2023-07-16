<?php

namespace App\Http\Controllers;

use App\Http\Requests\BannerRequest;
use App\Models\Banner;
use Illuminate\Support\Facades\File;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve the first Banner model instance
        $banner = Banner::first();

        // Check if the 'images' attribute is not empty
        if (!empty($banner->images)) {
            // Decode the JSON string stored in the 'images' attribute
            $banner->images = json_decode($banner->images);
        }

        // Return the banner view with the 'banner' variable
        return view('admin.pages.banner', [
            'banner' => $banner,
        ]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(BannerRequest $request)
    {
        // Validate the request data using the BannerRequest class

        $data = $request->validated();

        // Check if the request has uploaded files with the key 'images'
        if ($request->hasFile('images')) {

            $images = [];

            // Get the path of the folder to store the uploaded images
            $folderPath = storage_path('app/public/banners/upload');

            // Check if the folder exists, and delete it if it does
            if (File::exists($folderPath)) {
                File::deleteDirectory($folderPath);
            }

            // Iterate through each uploaded file
            foreach ($request->file('images') as $index => $image) {
                // Get the file extension
                $extension = $image->getClientOriginalExtension();

                // Store the uploaded image with a custom filename in the specified folder
                $path = $image->storeAs('banners/upload', ($index + 1) . '.' . $extension, 'public');

                // Add the stored image path to the $images array
                array_push($images, $path);
            }

            // Encode the $images array as a JSON string and assign it to the 'images' attribute in the $data array
            $data['images'] = json_encode($images);
        }

        // Retrieve the first Banner model instance
        $banner = Banner::first();

        // Fill the model with the updated $data and save it
        $banner->fill($data)->save();

        // Create a notification message
        $notification = array(
            'message' => 'Banners Has Updated Successfully',
            'alert-type' => 'success'
        );

        // Redirect back to the previous page with the notification message
        return back()->with($notification);
    }
}
