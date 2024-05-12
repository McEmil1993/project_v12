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


    public function sendMessage($data)
    {

        $sid = 'AC2786f88186b06eb5f4eaf058596029d5';
        $token = 'b4fd9f09abd5fc711f25af08c0078f9c';
        $twilio = new Client($sid, $token);
    
        try {
            $message = $twilio->messages
                ->create($data['number'], // to
                    array(
                        "from" => "+15078794698",
                        "body" => $data['message']
                    )
                );
    
            return "1";
        } catch (\Exception $e) {
            // Handle the exception
            return "0";
        }

    }
}
