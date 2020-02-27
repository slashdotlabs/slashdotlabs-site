<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Throwable;

class Product extends Model
{
    protected $guarded = [];
    protected $appends = ['status_badge', 'action'];
    protected $casts = [
        'suspended' => 'boolean'
    ];

    public function order_item()
    {
        return $this->morphOne('App\Models\Product', 'product_type');
    }

    public function domain_names()
    {
        return $this->hasMany('App\Models\CustomerDomain', 'domain_tld_id');
    }

    /**
     * Scope a query to only include products of a given type.
     *
     * @param Builder $query
     * @param mixed $type
     * @return Builder
     */
    public function scopeOfType($query, $type)
    {
        return $query->where('product_type', $type);
    }

    /**
     * @param Builder $query
     * @return Builder
     */
    public function scopeActive($query)
    {
        return $query->where('suspended', false);
    }

    public function getStatusBadgeAttribute()
    {
        return $this->suspended ? '<span class="badge badge-warning">Suspended</span>'
            : '<span class="badge badge-success">Active</span>';
    }

    /**
     * @return array|string
     * @throws Throwable
     */
    public function getActionAttribute()
    {
        return view('components.products-action', ['product' => $this])->render();
    }
}
