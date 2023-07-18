<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreinstructorsRequest;
use App\Http\Requests\UpdateinstructorsRequest;
use App\Models\instructors;

class InstructorsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StoreinstructorsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(instructors $instructors)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(instructors $instructors)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateinstructorsRequest $request, instructors $instructors)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(instructors $instructors)
    {
        //
    }
}
