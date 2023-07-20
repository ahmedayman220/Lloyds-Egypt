<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreQrCodeRequest;
use App\Http\Requests\UpdateQrCodeRequest;
use App\Models\QrCode;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Storage;

class QrCodeController extends Controller
{
    private function generate_data($body,$eye,$eyeBall,$bgColor,$gradientColor1,$gradientColor2,$gradientType,$eyeColor,$eyeBallColor,$logo)
    {
        $data = [
            'data' => 'https://www.google.com/',
            'config' => [
                "body" => $body,
                "eye" => $eye,
                "eyeBall" => $eyeBall,
                "bgColor" => $bgColor,
                "gradientColor1" => $gradientColor1,
                "gradientColor2" => $gradientColor2,
                "gradientType" => $gradientType,
                "eye1Color" => $eyeColor,
                "eye2Color" => $eyeColor,
                "eye3Color" => $eyeColor,
                "eyeBall1Color" => $eyeBallColor,
                "eyeBall2Color" => $eyeBallColor,
                "eyeBall3Color" => $eyeBallColor,
                'logo' => $logo,
                "logoMode" => "default"
            ],
            "size" => 1000,
            "download" => "imageUrl",
            "file" => "png"
        ];
        return $data;
    }


    private function uploadLogoImage($logoImage)
    {
        $apiEndpoint = 'https://api.qrcode-monkey.com/qr/uploadImage';

        $client = new Client();

        $response = $client->request('POST', $apiEndpoint, [
            'multipart' => [
                [
                    'name' => 'file',
                    'contents' => file_get_contents($logoImage->getRealPath()),
                    'filename' => $logoImage->getClientOriginalName(),
                ],
            ],
        ]);

        return json_decode($response->getBody(), true);
    }

    private function createQRCodeWithLogo($data)
    {
        $apiEndpoint = 'https://api.qrcode-monkey.com/qr/custom';

        $client = new Client();

        $response = $client->request('POST', $apiEndpoint, [
            'json' => $data,
        ]);

        $responseBody = json_decode($response->getBody(), true);
        if ($responseBody['imageUrl']) {
            return $responseBody['imageUrl'];
        } else {
            return null;
        }
    }


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

    public function store(StoreQrCodeRequest $request , QrCode $qrCode) {
        $request->validated();
        $logoImage = $request->file('image');
        $uploadedLogoResponse = $this->uploadLogoImage($logoImage);

        $data = $this->generate_data(
            $request->body,
            $request->eye,
            $request->eyeBall,
            $request->bgColor,
            $request->gradientColor1,
            $request->gradientColor2,
            $request->gradientType,
            $request->eyeColor,
            $request->eyeBallColor,
            $uploadedLogoResponse['file']
        );
        // Step 3: Make the POST request to create the QR code with the logo
        $qrCodeImageUrl = $this->createQRCodeWithLogo($data);
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

            return back()->with($notification);
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
