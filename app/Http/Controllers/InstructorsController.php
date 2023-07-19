<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreInstructorsRequest;
use App\Http\Requests\UpdateInstructorsRequest;
use App\Models\instructors;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;

class InstructorsController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function index()
    {
        $instructors = Instructors::orderBy('created_at', 'desc')->get();
        return view('admin.pages.instructors', [
            'instructors' => $instructors
        ]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreInstructorsRequest $request)
    {
        $date = $request->validated();


        Instructors::create($date);

        $notification = array(
            'message' => 'Companies Has Added Successfully',
            'alert-type' => 'success'
        );
        return back()->with($notification);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateInstructorsRequest $request, instructors $instructors)
    {
        // Validate the request data using the MissionRequest class
        $data = $request->validated();

        // Retrieve the first Mission model instance $ Fill the model with the updated $data and save it
        $instructors->find($data['id'])->update($data);

        // Create a notification message for the user
        $notification = array(
            'message' => 'Instructor Has Updated Successfully',
            'alert-type' => 'success'
        );

        // Redirect back to the previous page with the notification message
        return back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, instructors $instructors)
    {
        $instructors->findOrFail($request->query('id'))->delete();

        // Create a notification message for the user
        $notification = array(
            'message' => 'Supplier Item Has Deleted Successfully',
            'alert-type' => 'success'
        );

        return back()->with($notification);

    }
}
