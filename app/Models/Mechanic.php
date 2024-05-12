<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Mechanic extends Model
{
    protected $fillable = ['store_id','name', 'age', 'gender', 'contact_number', 'specialization', 'status'];


    public static function getName($id){

        
        $mechanic =  DB::table('mechanics')
        ->where('id',$id)->first();

        if ($mechanic) {
            echo $mechanic->name;
        }

        echo $mechanic;
    }
}
