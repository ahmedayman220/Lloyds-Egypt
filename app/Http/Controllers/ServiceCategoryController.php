<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreServiceCategoryRequest;
use App\Http\Requests\UpdateServiceCategoryRequest;
use App\Models\ServiceCategory;
use Illuminate\Http\Request;

class ServiceCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $service_category = ServiceCategory::orderBy('created_at' , 'desc')->get();
        return view('admin.pages.service_category' , [
            'services_category' => $service_category
        ]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreServiceCategoryRequest $request)
    {
        $date = $request->validated();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->store('service_category/upload' , 'public');
            $date['image'] = $path;
        }

        ServiceCategory::create($date);

        $notification = array(
            'message' => 'Service Category Has Added Successfully',
            'alert-type' => 'success'
        );
        return back()->with($notification);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateServiceCategoryRequest $request)
    {
        // Validate the request data using the MissionRequest class
        $data = $request->validated();

        // Check if the request has an uploaded file with the key 'image'
        if ($request->hasFile('image')) {

            // Retrieve the uploaded image file
            $image = $request->file('image');

            // Store the uploaded image in the specified folder and assign the path to the 'images' attribute in the $data array
            $path = $image->store('service_category/upload', 'public');
            $data['image'] = $path;
        }

        // Retrieve the first Mission model instance
        $service_category = ServiceCategory::find($data['id']);
        // Fill the model with the updated $data and save it
        $service_category->fill($data)->save();

        // Create a notification message for the user
        $notification = array(
            'message' => 'Service Category Has Updated Successfully',
            'alert-type' => 'success'
        );

        // Redirect back to the previous page with the notification message
        return back()->with($notification);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $service_category = ServiceCategory::findOrFail($request->query('id'));
        $service_category->delete();

        // Create a notification message for the user
        $notification = array(
            'message' => 'Service Category Has Deleted Successfully',
            'alert-type' => 'success'
        );

        return back()->with($notification);
    }
}
