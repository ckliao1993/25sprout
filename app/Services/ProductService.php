<?php

namespace App\Services;

use App\Model\Product;

class ProductService
{
    // List all product.
    // @return $allproducts
    public function index()
    {
        $allproducts = Product::get();
        return $allproducts;
    }

    // Create new product
    public function store($content)
    {
        $newproduct = Product::create($content->all());
        return $newproduct;
    }

    // Update product.
    public function update($content, $product)
    {
        $product->update($content->all());
        return $product;
    }

    // Delete product.
    public function destroy($product)
    {
        $product->delete();
    }

    // Show one product.
    public function show($product)
    {
        $productWithCates = Product::with('iscategory')->find($product);
        return $productWithCates;
    }
}