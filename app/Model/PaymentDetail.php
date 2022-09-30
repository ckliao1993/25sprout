<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PaymentDetail extends Model
{
    protected $fillable = [
        'payment_id',
        'detail',
        'quantity',
        'subtotal',
    ];

    public function product()
    {
        return $this->hasOne('App\Model\Product', 'id', 'detail');
    }

    public function ispayment()
    {
        return $this->hasOne('App\Model\Payment', 'id', 'payment_id');
    }
}
