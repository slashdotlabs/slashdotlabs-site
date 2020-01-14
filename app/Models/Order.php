<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;

    public function order_items()
    {
        return $this->hasMany('App\Models\OrderItem','order_id', 'order_id');
    }
}
