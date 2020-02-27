<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;

    public $incrementing = false;
    protected $primaryKey = 'order_id';
    protected $guarded = [];
    protected $appends = ['status_badge', 'action'];
    protected $casts = [
        'paid' => 'boolean',
        'created_at' => 'datetime:M d, Y H:i:s'
    ];

    public function order_items()
    {
        return $this->hasMany('App\Models\OrderItem', 'order_id', 'order_id');
    }

    public function customer()
    {
        return $this->belongsTo('App\Models\User', 'customer_id');
    }

    public function payment()
    {
        return $this->hasOne('App\Models\Payment', 'order_id');
    }

    public function getStatusBadgeAttribute()
    {
        return $this->paid ? '<span class="badge badge-success">Paid</span>' : '<span class="badge badge-warning">Not paid</span>';
    }

    public function getActionAttribute()
    {
       return view('components.orders-actions', ['paid' => $this->paid ])->render();
    }
}
