<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderItem extends Model
{
    use SoftDeletes;

    protected $guarded = [];
    
    public function order()
    {
        return $this->belongsTo('App\Models\Order', 'order_id', 'order_id');
    }

    public function product()
    {
        return $this->morphTo();
    }
}
