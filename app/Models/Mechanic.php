<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mechanic extends Model
{
    protected $fillable = ['store_id','name', 'age', 'gender', 'contact_number', 'specialization', 'status'];
}
