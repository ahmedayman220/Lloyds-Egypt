<?php

namespace App\Http\Controllers;

use App\Http\Requests\MissionRequset;
use App\Models\Mission;
use Illuminate\Support\Facades\File;

class MissionController extends Controller
{
    public function index()
    {
        // Retrieve the first About model instance
        $mission = Mission::first();

        // Return the mision view with the 'mision' variable
        return view('admin.pages.mission', [
            'mission' => $mission,
        ]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(MissionRequset $request)
    {
        // Validate the request data using the MissionRequest class
        $data = $request->validated();

        // Check if the request has an uploaded file with the key 'image'
        if ($request->hasFile('image')) {

            // Get the path of the folder to store the uploaded image
            $folderPath = storage_path('app/public/mission/upload');

            // Check if the folder exists, and delete it if it does
            if (File::exists($folderPath)) {
                File::deleteDirectory($folderPath);
            }

            // Retrieve the uploaded image file
            $image = $request->file('image');

            // Store the uploaded image in the specified folder and assign the path to the 'images' attribute in the $data array
            $path = $image->store('mission/upload', 'public');
            $data['image'] = $path;
        }

        // Retrieve the first Mission model instance
        $mission = Mission::first();

        // Fill the model with the updated $data and save it
        $mission->fill($data)->save();

        // Create a notification message for the user
        $notification = array(
            'message' => 'Mission Has Updated Successfully',
            'alert-type' => 'success'
        );

        // Redirect back to the previous page with the notification message
        return back()->with($notification);
    }


}
