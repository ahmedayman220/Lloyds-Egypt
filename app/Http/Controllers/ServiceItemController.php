<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreServiceItemRequest;
use App\Http\Requests\UpdateServiceItemRequest;
use App\Models\ServiceCategory;
use App\Models\ServiceItem;
use Illuminate\Http\Request;

class ServiceItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $serviceItems = ServiceItem::with('serviceCategory')->get();
        $categories = ServiceCategory::all();

        return view('admin.pages.service_items', [
            'services_items' => $serviceItems,
            'categories' => $categories
        ]);

    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreServiceItemRequest $request)
    {
        $date = $request->validated();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->store('service_items/upload' , 'public');
            $date['image'] = $path;
        }

        ServiceItem::create($date);

        $notification = array(
            'message' => 'Service Item Has Added Successfully',
            'alert-type' => 'success'
        );
        return back()->with($notification);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateServiceItemRequest $request)
    {
        // Validate the request data using the MissionRequest class
        $data = $request->validated();

        // Check if the request has an uploaded file with the key 'image'
        if ($request->hasFile('image')) {
            // Retrieve the uploaded image file
            $image = $request->file('image');
            // Store the uploaded image in the specified folder and assign the path to the 'images' attribute in the $data array
            $path = $image->store('service_items/upload', 'public');
            $data['image'] = $path;
        }

        // Retrieve the first Mission model instance
        $service_item = ServiceItem::find($data['id']);
        // Fill the model with the updated $data and save it
        $service_item->fill($data)->save();

        // Create a notification message for the user
        $notification = array(
            'message' => 'Service Item Has Updated Successfully',
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
        $service_item = ServiceItem::findOrFail($request->query('id'));
        $service_item->delete();

        // Create a notification message for the user
        $notification = array(
            'message' => 'Service Category Has Deleted Successfully',
            'alert-type' => 'success'
        );

        return back()->with($notification);

    }
}
