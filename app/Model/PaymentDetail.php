<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Product;
use App\Model\ProductCategory;

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

    // public function set($value)
    // {
    //     $category = Product::find($this->detail)->value('category');
    //     $price = ProductCategory::find($category)->value('msrp');
    //     return $this->subtotal = $price * $this->quantity;
    // }
}
