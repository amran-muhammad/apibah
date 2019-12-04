<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $fillable = [
        'userId','orderId','productId','price','totalPrice','quantity'
        ];
}
