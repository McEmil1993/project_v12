<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Twilio\Rest\Client;


class SMSController extends Controller
{
    public function sendSMS()
    {

        
        $sid = config('services.twilio.sid');
        $token = config('services.twilio.token');
        $twilio = new Client($sid, $token);

        $message = $twilio->messages
        ->create("+639469377377", // to
            array(
                "from" => "+15078794698",
                "body" => "OTP sample: 123568"
            )
        );

        return response()->json(['message' => 'SMS sent successfully', 'sid' => $message]);

    }

    public function sendMessage($data)
    {

        $sid = config('services.twilio.sid');
        $token = config('services.twilio.token');
        $twilio = new Client($sid, $token);

        $message = $twilio->messages
        ->create($data['number'], // to
            array(
                "from" => "+15078794698",
                "body" => $data['message']
            )
        );

        return response()->json(['message' => 'SMS sent successfully', 'sid' => $message]);

    }
}
