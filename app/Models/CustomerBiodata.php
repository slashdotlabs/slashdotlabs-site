<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomerBiodata extends Model
{
    protected $guarded = [];

    protected $table = 'customer_biodata';

    public function customer()
    {
        return $this->belongsTo('App\Models\User','customer_id');
    }
}
