<?php

namespace App\Http\Controllers;

use App\Http\Requests\BannerRequest;
use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $banner = Banner::first();
        return view('admin.pages.banner' , [
            'banner' => $banner,
        ]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
//        dd($request->hasFile('images'))
    }


}
