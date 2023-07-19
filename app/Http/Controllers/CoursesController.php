<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCoursesRequest;
use App\Http\Requests\UpdateCoursesRequest;
use App\Models\Courses;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Courses::orderBy('created_at', 'desc')->get();
        return view('admin.pages.courses', [
            'courses' => $courses
        ]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCoursesRequest $request ,Courses $courses)
    {
        $date = $request->validated();


        $courses->create($date);

        $notification = array(
            'message' => 'Course Item Has Added Successfully',
            'alert-type' => 'success'
        );
        return back()->with($notification);

    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCoursesRequest $request, Courses $courses)
    {
        // Validate the request data using the MissionRequest class
        $data = $request->validated();

        // Retrieve the first Mission model instance $ Fill the model with the updated $data and save it
        $courses->find($data['id'])->update($data);

        // Create a notification message for the user
        $notification = array(
            'message' => 'Course Item Has Updated Successfully',
            'alert-type' => 'success'
        );

        // Redirect back to the previous page with the notification message
        return back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy(Request $request ,Courses $courses)
    {
        $courses->findOrFail($request->query('id'))->delete();

        // Create a notification message for the user
        $notification = array(
            'message' => 'Course Item Has Deleted Successfully',
            'alert-type' => 'success'
        );

        return back()->with($notification);
    }
}
