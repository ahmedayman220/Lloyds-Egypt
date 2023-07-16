<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSettingRequest;
use App\Http\Requests\SettingRequest;
use App\Models\Setting;
use Illuminate\Support\Facades\File;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $setting = Setting::first();

        return view('admin.pages.setting', [
            'setting' => $setting,
        ]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(SettingRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('app_favicon')) {
            $folderPath = storage_path('app/public/setting/upload');

            if (File::exists($folderPath)) {
                File::deleteDirectory($folderPath);
            }

            $image = $request->File('app_favicon');
            $extension = $image->getClientOriginalExtension();
            $path = $image->storeAs('setting/upload', 'app_favicon'.$extension, 'public');

            $data['app_favicon'] = $path;
        }

        $setting = Setting::first();

        $setting->fill($data)->save();


        $notification = array(
            'message' => 'Setting Has Updated Successfully',
            'alert-type' => 'success'
        );
        return back()->with($notification);
    }

}
