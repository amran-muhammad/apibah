<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'status','date','customerId','driverId','subTotal','paymentType','grandTotal','shippingPrice','discount'
    ];
}
