<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCompaniesRequest;
use App\Http\Requests\UpdateCompaniesRequest;
use App\Models\Companies;
use Illuminate\Http\Request;

class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = Companies::orderBy('created_at' , 'desc')->get();
        return view('admin.pages.companies' , [
            'companies' => $companies
        ]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCompaniesRequest $request)
    {
        $date = $request->validated();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->store('companies/upload' , 'public');
            $date['image'] = $path;
        }

        Companies::create($date);

        $notification = array(
            'message' => 'Companies Has Added Successfully',
            'alert-type' => 'success'
        );
        return back()->with($notification);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCompaniesRequest $request, Companies $companies)
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
        $companies = Companies::find($data['id']);
        // Fill the model with the updated $data and save it
        $companies->fill($data)->save();

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
        $company = Companies::findOrFail($request->query('id'));
        $company->delete();

        // Create a notification message for the user
        $notification = array(
            'message' => 'Supplier Item Has Deleted Successfully',
            'alert-type' => 'success'
        );

        return back()->with($notification);
    }
}
