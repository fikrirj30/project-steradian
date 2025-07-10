<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

     protected $table = 'orders';

    protected $fillable = [
        'car_id',
        'order_date',
        'pickup_date',
        'dropoff_date',
        'pickup_location',
        'dropoff_location',
    ];
}
