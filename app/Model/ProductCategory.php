<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    protected $fillable = [
        'name',
        'msrp'
    ];

    public function hasproducts()
    {
        return $this->hasMany('App\Model\Product', 'category');
    }
}
