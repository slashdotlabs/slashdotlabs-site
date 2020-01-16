<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $fillable = [
        'product_name', 'product_description', 'product_type', 'price'
    ];

    protected $table="products";

    protected $guarded = [];

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
}
