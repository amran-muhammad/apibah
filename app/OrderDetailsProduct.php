<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetailsProduct extends Model
{ 
    protected $fillable = [
    'userId','orderId','productId','price','totalPrice','quantity'
    ];

    
}
