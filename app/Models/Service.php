<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'date_of_request',
        'customer_id',
        'motorcycle_name',
        'motorcycle_type',
        'service_types',
        'total_amount',
        'status',
        'store_id',
        // You don't need to include 'id', 'created_at', and 'updated_at' here
        // because Laravel automatically handles them.
    ];
}
