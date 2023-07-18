<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSupplierCategoryRequest;
use App\Http\Requests\UpdateSupplierCategoryRequest;
use App\Models\SupplierCategory;
use Illuminate\Http\Request;

class SupplierCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $supplier_category = SupplierCategory::orderBy('created_at' , 'desc')->get();
        return view('admin.pages.supplier_category' , [
            'suppliers_category' => $supplier_category
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSupplierCategoryRequest $request)
    {
        $date = $request->validated();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->store('supplier_category/upload' , 'public');
            $date['image'] = $path;
        }

        SupplierCategory::create($date);

        $notification = array(
            'message' => 'Supplier Category Has Added Successfully',
            'alert-type' => 'success'
        );
        return back()->with($notification);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSupplierCategoryRequest $request)
    {
        // Validate the request data using the MissionRequest class
        $data = $request->validated();

        // Check if the request has an uploaded file with the key 'image'
        if ($request->hasFile('image')) {

            // Retrieve the uploaded image file
            $image = $request->file('image');

            // Store the uploaded image in the specified folder and assign the path to the 'images' attribute in the $data array
            $path = $image->store('supplier_category/upload', 'public');
            $data['image'] = $path;
        }

        // Retrieve the first Mission model instance
        $supplier_category = SupplierCategory::find($data['id']);
        // Fill the model with the updated $data and save it
        $supplier_category->fill($data)->save();

        // Create a notification message for the user
        $notification = array(
            'message' => 'Supplier Category Has Updated Successfully',
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
        $service_category = SupplierCategory::findOrFail($request->query('id'));
        $service_category->delete();

        // Create a notification message for the user
        $notification = array(
            'message' => 'Supplier Category Has Deleted Successfully',
            'alert-type' => 'success'
        );

        return back()->with($notification);
    }
}
