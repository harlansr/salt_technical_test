<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    // use HasFactory;
    // protected $table = 'order';
    protected $fillable = [
        'user_id',
        'order_no',
        'product',
        'address',
        'mobile_number',
        'value',
        'total',
        'status',
        'shipping_code'

    ];
}
