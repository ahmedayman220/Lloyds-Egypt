<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSupplierItemRequest;
use App\Http\Requests\UpdateSupplierItemRequest;
use App\Models\SupplierCategory;
use App\Models\SupplierItem;
use Illuminate\Http\Request;

class SupplierItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $supplierItems = SupplierItem::with('supplierCategory')->orderBy('created_at' , 'desc')->get();
        $categories = SupplierCategory::all();
        return view('admin.pages.supplier_items', [
            'suppliers_items' => $supplierItems,
            'categories' => $categories
        ]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSupplierItemRequest $request)
    {
        $date = $request->validated();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->store('supplier_items/upload' , 'public');
            $date['image'] = $path;
        }

        SupplierItem::create($date);

        $notification = array(
            'message' => 'Supplier Item Has Added Successfully',
            'alert-type' => 'success'
        );
        return back()->with($notification);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSupplierItemRequest $request)
    {
        // Validate the request data using the MissionRequest class
        $data = $request->validated();

        // Check if the request has an uploaded file with the key 'image'
        if ($request->hasFile('image')) {
            // Retrieve the uploaded image file
            $image = $request->file('image');
            // Store the uploaded image in the specified folder and assign the path to the 'images' attribute in the $data array
            $path = $image->store('supplier_items/upload', 'public');
            $data['image'] = $path;
        }

        // Retrieve the first Mission model instance
        $supplier_item = SupplierItem::find($data['id']);
        // Fill the model with the updated $data and save it
        $supplier_item->fill($data)->save();

        // Create a notification message for the user
        $notification = array(
            'message' => 'Supplier Item Has Updated Successfully',
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
        $supplier_item = SupplierItem::findOrFail($request->query('id'));
        $supplier_item->delete();

        // Create a notification message for the user
        $notification = array(
            'message' => 'Supplier Item Has Deleted Successfully',
            'alert-type' => 'success'
        );

        return back()->with($notification);

    }
}
