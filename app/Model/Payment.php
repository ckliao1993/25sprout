<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'total',
        'status',
        'user',
    ];

    public function hasdetails()
    {
        return $this->hasMany('App\Model\PaymentDetail', 'payment_id');
    }

    public function isuser()
    {
        return $this->hasOne('App\User', 'id', 'user');
    }
}
