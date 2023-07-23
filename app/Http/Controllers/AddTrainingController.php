<?php

namespace App\Http\Controllers;

use App\Jobs\GenerateQrCodeJob;
use App\Models\Companies;
use App\Models\Courses;
use App\Models\Instructors;
use App\Models\QrCode;
use App\Models\Training;
use Illuminate\Http\Request;

class AddTrainingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Courses::all();
        $instructors = Instructors::all();
        $companies = Companies::all();
        $qrCode = QrCode::all();

        return view('admin.pages.addTraining', [
            'courses' => $courses,
            'instructors' => $instructors,
            'companies' => $companies,
            'qrCodes' => $qrCode,
        ]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request , Training $training , QrCode $qrCode , Courses $course)
    {

        $qrCodeData = $qrCode->findOrFail($request->QrCode_id);
        $qrCodeData = json_decode($qrCodeData->data);
        $folderName = now();
        $course = $course->findOrFail($request->course_id);

      $training->name = $request->name;
      $training->training_place = $request->training_place;
      $training->start_date = $request->start_date;
      $training->number_of_years = $request->number_of_years;
      $training->course_id = $request->course_id;
      $training->instructor_id = $request->instructor_id;
      $training->company_id = $request->company_id;
      $training->QrCode_id = $request->QrCode_id;
      $training->save();
        for ($i = 0; $i < $request->number_of_student; $i++) {
            GenerateQrCodeJob::dispatch($qrCodeData , $i , $folderName, $request->start_date ,$course->short_cut , $training->id);
        }


      return response('test');
    }


}
