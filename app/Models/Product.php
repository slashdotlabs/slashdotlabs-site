<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable =[
        'product_name', 'product_description', 'product_type', 'price'
    ];

    protected $guarded = [];

    public function order_item()
    {
        return $this->morphOne('App\Models\Product','product_type');
    }

    public function domain_names()
    {
        return $this->hasMany('App\Models\CustomerDomain','domain_tld_id');
    }
}
