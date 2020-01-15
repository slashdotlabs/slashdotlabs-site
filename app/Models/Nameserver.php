<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nameserver extends Model
{
    protected $guarded = [];

    public function domain()
    {
        return $this->belongsTo('App\Models\CustomerDomain', 'domain_id');
    }
}
