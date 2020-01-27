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
        $unpaid_options = $this->paid ? '<a class="dropdown-item" href="javascript:void(0)"> No Actions </a>'
            : '<a class="dropdown-item btn-add-payment" href="javascript:void(0)"> Add payment </a>
                 <div class="dropdown-divider"></div>
                 <a class="dropdown-item btn-cancel-order" href="javascript:void(0)"> Cancel Order </a>';
        return '<div class="btn-group" role="group">
                    <button type="button" class="btn btn-sm btn-alt-info show-order-items">
                        Order Items
                    </button>
                    <button type="button" class="btn btn-sm btn-alt-secondary" data-toggle="dropdown">
                        <i class="si si-arrow-down"></i>
                    </button>
                   <div class="dropdown-menu">'
                    . $unpaid_options .
                   '</div>
                </div>';
    }
}
