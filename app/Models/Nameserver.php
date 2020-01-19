<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Staudenmeir\LaravelUpsert\Eloquent\HasUpsertQueries;

class Nameserver extends Model
{
    use HasUpsertQueries;

    protected $guarded = [];

    public function domain()
    {
        return $this->belongsTo('App\Models\CustomerDomain', 'domain_id');
    }
}
