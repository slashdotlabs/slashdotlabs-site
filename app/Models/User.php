<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'password', 'user_type', 'suspended'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function get_name()
    {
        return ($this->first_name)[0] . ". " . $this->last_name;
    }

    public function get_fullname()
    {
        return $this->first_name . " " . $this->last_name;
    }

    public function customer_biodata()
    {
        return $this->hasOne('App\Models\CustomerBiodata', 'customer_id');
    }

    public function customer_domains()
    {
        return $this->hasMany('App\Models\CustomerDomain', 'customer_id');
    }

    public function customer_orders()
    {
        return $this->hasMany('App\Models\Order', 'customer_id');
    }

    public function customer_payments()
    {
        return $this->hasMany('App\Models\Payment', 'customer_id');
    }

    /**
     * Scope a query to only include users of a given type.
     *
     * @param Builder $query
     * @param mixed $type
     * @return Builder
     */
    public function scopeOfType($query, $type)
    {
        return $query->where('user_type', $type);
    }
}
