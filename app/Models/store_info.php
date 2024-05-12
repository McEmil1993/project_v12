<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

use Twilio\Rest\Client;


class store_info extends Model
{
    protected $table = "store_info";
    protected $primaryKey = 'id';
    protected $fillable = ['user_id',  'firstname',  'middlename',  'lastname',  'gender', 'address',  'shopname',  'contact',  'shopimage'];


    public function getStoreId() {
        $model = $this->select('id')->where('user_id', Auth::id())->first();
        return $model->id;
    }

    // public function getStoreId() {
    //     try {
    //         $userId = Auth::id();
    //         $storeId = DB::table('store_info')
    //         ->where('user_id', $userId)
    //         ->value('id');

    //         return $storeId;
            
    //     } catch (\Exception $e) {
    //         // Log any exceptions that occur
    //         Log::error('Error fetching store ID: ' . $e->getMessage());
    //         return null;
    //     }
    // }


    public function sendMessage($data)
    {

        $sid = 'AC2786f88186b06eb5f4eaf058596029d5';
        $token = 'b4fd9f09abd5fc711f25af08c0078f9c';
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
