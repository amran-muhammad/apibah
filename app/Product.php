<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name','description','cost','price','warranty','statusId','stock','isNew','isFeatured','totalSale','color','size'
    ];
}
