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
                    "messagingServiceSid" => "MG63f760cba73156f1f2d2367741a2dcf4",
                    "body" => "Sample Verification: 123654"
                )
            );



        return response()->json(['message' => 'SMS sent successfully', 'sid' => $message]);


        // $message = [
        //     "secret" => "94a5d4cca75ac2680f100364b7d0ee1cbb855af0", // your API secret from (Tools -> API Keys) page
        //     "mode" => "devices",
        //     "device" => "00000000-0000-0000-6e99-ceaebad18d86",
        //     "sim" => 1,
        //     "priority" => 1,
        //     "phone" => "+639157936545",
        //     "message" => "This message sample via gateway verification code: 963852 "
        // ];
      
        // $cURL = curl_init("https://sms.teamssprogram.com/api/send/sms");
        // curl_setopt($cURL, CURLOPT_RETURNTRANSFER, true);
        // curl_setopt($cURL, CURLOPT_POSTFIELDS, $message);
        // $response = curl_exec($cURL);
        // curl_close($cURL);
      
        // $result = json_decode($response, true);

        // return response()->json($result);
      
        // do something with response
        // print_r($result);
    }
}
