<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShippingTable extends Model
{
    protected $fillable = [
        'orderId',	'name',	'mobile1','mobile2'	,'house',	'street',	'area',	'road','block','city','state',	'country'
    ];
    
}
