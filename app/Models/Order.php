<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;

    protected $primaryKey = 'order_id';

    protected $fillable = ['customer_id', 'total_amount', 'currency'];

    public function order_items()
    {
        return $this->hasMany('App\Models\OrderItem','order_id', 'order_id');
    }

    public function customer()
    {
        return $this->belongsTo('App\Models\User', 'customer_id');
    }

    public function payment()
    {
        return $this->hasOne('App\Models\Payment', 'order_id');
    }
}
