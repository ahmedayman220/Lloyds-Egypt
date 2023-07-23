<?php


namespace App\Services;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Storage;


class GenerateQrCodeService
{

    public function uploadLogoImage($logoImage)
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

        $image = json_decode($response->getBody(), true);

        return $image['file'];
    }


    public function generateData($body, $eye, $eyeBall, $bgColor, $gradientColor1, $gradientColor2, $gradientType, $eyeColor, $eyeBallColor, $logo = null)
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


    public function createQRCodeWithLogo($data)
    {
        try {
            $apiEndpoint = 'https://api.qrcode-monkey.com/qr/custom';

            $client = new Client();

            $response = $client->request('POST', $apiEndpoint, [
                'json' => $data,
            ]);

            $responseBody = json_decode($response->getBody(), true);

            if (isset($responseBody['imageUrl'])) {
                return $responseBody['imageUrl'];
            } else {

                return null;
            }

        } catch (ClientException $e) {
            dd($e);
            // Handle 4xx client-side errors (e.g., 404, 400)
            $statusCode = $e->getResponse()->getStatusCode();
            $errorMessage = $e->getMessage();
            // Handle specific client-side errors based on status code
            if ($statusCode === 404) {
                // Handle 404 Not Found error
                echo "QR code not found: $errorMessage";
            } elseif ($statusCode === 400) {
                // Handle 400 Bad Request error
                echo "Bad request: $errorMessage";
            } else {
                // Handle other client-side errors
                echo "Client error: $errorMessage";
            }

            return null;
        } catch (RequestException $e) {
            // Handle connection-related errors (e.g., timeout, network issue)
            $errorMessage = $e->getMessage();
            echo "Connection error: $errorMessage";


            return null;
        } catch (Exception $e) {
            // Handle all other unexpected exceptions
            $errorMessage = $e->getMessage();
            $errorMessage = $e->getMessage();
            echo "Unexpected error: $errorMessage";

            return null;
        }
    }

}
