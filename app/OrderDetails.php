<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    protected $fillable = [
        'status','date','customerId','driverId','subTotal','paymentType','grandTotal','shippingPrice','discount','orderId'
    ];
}

