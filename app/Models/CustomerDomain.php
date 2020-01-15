<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomerDomain extends Model
{
    protected $guarded = [];

    public function order_item()
    {
        return $this->morphOne('App\Models\CustomerDomain','product_type');
    }

    public function customer()
    {
        return $this->belongsTo('App\Models\User', 'customer_id');
    }

    public function domain_tld()
    {
        return $this->belongsTo('App\Models\Product', 'domain_tld_id');
    }

    public function nameservers()
    {
        return $this->hasMany('App\Models\Nameserver', 'domain_id');
    }
}
