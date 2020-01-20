<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Staudenmeir\LaravelUpsert\Eloquent\HasUpsertQueries;

class Nameserver extends Model
{
    use HasUpsertQueries, SoftDeletes;

    protected $guarded = [];

    public function domain()
    {
        return $this->belongsTo('App\Models\CustomerDomain', 'domain_id');
    }
}
