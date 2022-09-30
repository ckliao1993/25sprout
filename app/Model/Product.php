<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    ////////////////////////可以批量賦值的欄位//////////////////////////
    protected $fillable = [
        'category',
        'size',
        'color',
        'stock',
    ];

    //////////////////////不能更改的欄位/////////////////////////
    // protected $guarded = [];

    public function iscategory()
    {
        return $this->hasOne('App\Model\ProductCategory', 'id', 'category');
    }

    public function hasdetails()
    {
        return $this->hasMany('App\Model\PaymentDetail', 'detail');
    }
}
