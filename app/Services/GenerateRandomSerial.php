<?php

namespace App\Services;

use Illuminate\Support\Str;

class GenerateRandomSerial
{
    public function generateSerialNumber($courseShortCut, $date , $i)
    {
        // Convert the provided date to the desired format (L.E-050723)
        $formattedDate = date('dmy', strtotime($date));

        // Combine the courseShortCut and formattedDate to create the serial number
        $serialNumber = 'L.E-' . $formattedDate . ( ($i < 9) ? '0' . $i+1 : $i+1  ). $courseShortCut;

        return $serialNumber;
    }


    function generateUniqueUUID($modelName)
    {
        // Get the model class based on the provided model name
        $modelClass = "App\\Models\\" . $modelName;

        // Generate a version 4 (random) UUID
        $uuid = Str::uuid()->toString();

        // Take the first 8 characters of the UUID as the eyes
        $eyes = substr($uuid, 0, 8);

        // Check if the UUID is unique in the specified model's table
        while ($modelClass::where('uuid', $eyes)->exists()) {
            // If the UUID already exists, generate a new one
            $uuid = Str::uuid()->toString();
            $eyes = substr($uuid, 0, 8);
        }

        // Return the UUID with 8 eyes
        return $eyes;
    }



}
