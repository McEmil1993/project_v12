<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceList extends Model
{
    protected $fillable = ['store_id','name', 'description', 'gender', 'rate'];
}
