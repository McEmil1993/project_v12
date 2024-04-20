<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;


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
}
