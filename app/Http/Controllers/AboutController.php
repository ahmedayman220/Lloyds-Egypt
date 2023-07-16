<?php

namespace App\Http\Controllers;

use App\Http\Requests\AboutRequest;
use App\Http\Requests\BannerRequest;
use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve the first About model instance
        $about = About::first();

        // Return the about view with the 'about' variable
        return view('admin.pages.about', [
            'about' => $about,
        ]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(AboutRequest $request)
    {
        // Validate the request data using the AboutRequest class
        $data = $request->validated();

        // Check if the request has an uploaded file with the key 'image'
        if ($request->hasFile('image')) {

            // Get the path of the folder to store the uploaded image
            $folderPath = storage_path('app/public/about/upload');

            // Check if the folder exists, and delete it if it does
            if (File::exists($folderPath)) {
                File::deleteDirectory($folderPath);
            }

            // Retrieve the uploaded image file
            $image = $request->file('image');

            // Store the uploaded image in the specified folder and assign the path to the 'images' attribute in the $data array
            $path = $image->store('about/upload', 'public');
            $data['image'] = $path;
        }

        // Retrieve the first About model instance
        $about = About::first();

        // Fill the model with the updated $data and save it
        $about->fill($data)->save();

        // Create a notification message for the user
        $notification = array(
            'message' => 'About Has Updated Successfully',
            'alert-type' => 'success'
        );

        // Redirect back to the previous page with the notification message
        return back()->with($notification);
    }


}
