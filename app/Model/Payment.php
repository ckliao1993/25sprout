<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\PaymentDetail;

class Payment extends Model
{
    protected $fillable = [
        'total',
        'status',
        'user',
    ];

    public function hasdetails()
    {
        return $this->hasMany('App\Model\PaymentDetail', 'payment_id', 'id');
    }

    public function isuser()
    {
        return $this->hasOne('App\Model\User', 'id', 'user');
    }
}
