<?php

namespace App\Jobs;

use App\Models\QrCode;
use App\Models\SerialNumber;
use App\Models\Training;
use App\Services\GenerateQrCodeService;
use App\Services\GenerateRandomSerial;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

class GenerateQrCodeJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    private $requset;
    private $i;
    private $qrCodeData;
    private $folderName;
    private $date;
    private $courseShortCut;
    private $training_id;


    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($qrCodeData,$i , $folderName, $date, $courseShortCut, $training_id)
    {

        $this->i = $i;
        $this->qrCodeData = $qrCodeData;
        $this->folderName = $folderName;
        $this->date = $date;
        $this->courseShortCut = $courseShortCut;
        $this->training_id = $training_id;

    }

    /**
     * Execute the job.
     */

    public function handle(GenerateQrCodeService $generateQrCodeService , GenerateRandomSerial $generateRandomSerial) {
        $serialNumberModel = new SerialNumber;

        $uuid = $generateRandomSerial->generateUniqueUUID('SerialNumber');
        $url = url('/training/certificates/' . $uuid);
        $this->qrCodeData->data = $url;
        $serialNumber = $generateRandomSerial->generateSerialNumber($this->courseShortCut,$this->date,$this->i);

        $qrCodeImageUrl = $generateQrCodeService->createQRCodeWithLogo($this->qrCodeData);

        if ($qrCodeImageUrl) {
            // Download the QR code image using Guzzle
            $client = new Client();
            $response = $client->get($qrCodeImageUrl);

            $contentType = 'image/png'; // Change this if needed
            $filename = $serialNumber . '.png'; // Change this if needed

            // Specify the path where the image should be saved on the server
            $path = 'Qr Code/'. $this->folderName . "/" . $filename; // Change this to the desired path
            Storage::disk('public')->put($path, $response->getBody());

            $serialNumberModel->status = true;

        } else {
            $serialNumberModel->status = false;
            $this->fail(new \Exception('QR code image URL is null.'));
            dd('test');
            sleep(5);

        }

        $serialNumberModel->uuid  = $uuid;
        $serialNumberModel->serial_number = $serialNumber;
        $serialNumberModel->image = null;
        $serialNumberModel->training_id    = $this->training_id;


        $serialNumberModel->save();

    }


}
