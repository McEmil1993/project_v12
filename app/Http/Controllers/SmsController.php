<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Http;

class SmsController extends Controller
{
    //

    public function sendOtp(Request $request){

        $url = 'https://api.itexmo.com/api/broadcast-otp';

        // The data you want to send via POST
        $fields = [
            "Email" => "dacoylomarkemilcajes@gmail.com",
            "Password" => "H20mwrweDLmNPR",
            "Recipients" => ["09157936545"],
            "Message" => "OTP 12345.",
            "ApiCode" => "PR-MARKE784594_FFQLZ",
            "SenderId" => ""
        ];
    
        // Initialize cURL session
        $ch = curl_init();
    
        // Set cURL options
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields)); // Encode the fields into JSON
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Return the transfer as a string
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Content-Length: ' . strlen(json_encode($fields))
        ]);
    
        // Execute cURL session and fetch the response
        $response = curl_exec($ch);
    
        // Close cURL session
        curl_close($ch);
    
        // Handle the response as needed
        if ($response) {
            // Assuming the API returns a JSON response, you might decode it like this:
            $responseData = json_decode($response, true);
    
            // Implement your logic based on the response data
            // For example, checking if the request was successful
            if (isset($responseData['status']) && $responseData['status'] == 'success') {
                return json_encode(['message' => 'OTP sent successfully'], JSON_PRETTY_PRINT);
            } else {
                return json_encode(['error' => $responseData], JSON_PRETTY_PRINT);
            }
        } else {
            return json_encode(['error' => 'Failed to send OTP'], JSON_PRETTY_PRINT);
        }
    }
}
