<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderItem extends Model
{
    use SoftDeletes;
    protected $guarded = [];
    protected $appends = ['item_status','datediff'];
    protected $dates = ['expiry_date'];

    public function order()
    {
        return $this->belongsTo('App\Models\Order', 'order_id', 'order_id');
    }

    public function product()
    {
        return $this->morphTo();
    }

    public function getExpiryDateAttribute($value)
    {
        return $this->attributes['expiry_date'] = (new Carbon($value))->toFormattedDateString();
    }

    public function getItemStatusAttribute()
    {
        $expiry_date = Carbon::make($this->expiry_date);
        $diff = Carbon::now()->diffInDays($expiry_date);
        if ($expiry_date->isPast()) {
            return 'expired';
        } else if ($diff <= 30) {
            return 'expiring_soon';
        } else {
            return 'active';
        }
    }

    public function scopeAlmostExpiring(Builder $query)
    {
        $now = now();
        return $query->select('*')
            ->selectRaw("DATEDIFF(expiry_date, '{$now}') as datediff")
            ->whereRaw("DATEDIFF(expiry_date, '{$now}') = 30")
            ->orWhereRaw("DATEDIFF(expiry_date, '{$now}') = 5");
    }

    public function getDatediffAttribute()
    {
        return Carbon::now()->diffInDays($this->expiry_date);
    }
}
