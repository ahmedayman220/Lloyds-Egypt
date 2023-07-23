<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreQrCodeRequest;
use App\Models\QrCode;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Storage;
use App\Services\GenerateQrCodeService;

class QrCodeController extends Controller
{
    public function index(QrCode $qrCode)
    {
        $qrCode = $qrCode->all();
        return view('admin.pages.QrCode' , [
            'qrCodes' => $qrCode
        ]);

    }



    /**
     * Store a newly created resource in storage.
     */

    public function store(StoreQrCodeRequest $request , QrCode $qrCode , GenerateQrCodeService $uploadLogoImage) {

        $request->validated();
        $logoImage = $request->file('image');
        $uploadedLogoResponse = $uploadLogoImage->uploadLogoImage($logoImage);

        $data = $uploadLogoImage->generateData(
            $request->body,
            $request->eye,
            $request->eyeBall,
            $request->bgColor,
            $request->gradientColor1,
            $request->gradientColor2,
            $request->gradientType,
            $request->eyeColor,
            $request->eyeBallColor,
            $uploadedLogoResponse
        );
        // Step 3: Make the POST request to create the QR code with the logo
        $qrCodeImageUrl = $uploadLogoImage->createQRCodeWithLogo($data);

        if ($qrCodeImageUrl) {
            // Download the QR code image using Guzzle
            $client = new Client();
            $response = $client->get($qrCodeImageUrl);

            $contentType = 'image/png'; // Change this if needed
            $filename = time() . '.png'; // Change this if needed

            // Specify the path where the image should be saved on the server
            $path = 'Qr Code/upload' . $filename; // Change this to the desired path

            // Save the image to the specified path
            Storage::disk('public')->put($path, $response->getBody());

            $qrCode->name = $request->name;
            $qrCode->path = $path;
            $qrCode->data = json_encode($data);
            $qrCode->save();

            $notification = array(
                'message' => 'Qr Code Has Added Successfully',
                'alert-type' => 'success'
            );


        } else {

            $notification = array(
                'message' => 'Failed to create QR code. Please try again',
                'alert-type' => 'danger'
            );

        }


        // Return the QR code image URL
        return back()->with($notification);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request , QrCode $qrCode) {

        $qrCode->findOrFail($request->query('id'))->delete();

        $notification = array(
            'message' => 'Qr Code Has Deleted Successfully',
            'alert-type' => 'success'
        );

        return back()->with($notification);

    }
}
