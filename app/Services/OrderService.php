<?php

namespace App\Services;

use App\Model\Payment;
use App\Model\Product;
use App\Model\PaymentDetail;
use App\Model\ProductCategory;
use Illuminate\Support\Facades\Auth;

class OrderService
{
    public function new($request)
    {
        $total = 0;
        $payment = Payment::create([
            'status' => 'new',
            'user' => auth()->user()->id,
            'total' => 0,
        ]);
        foreach($request->products as $product){
            $obj = Product::find($product['id'])->value('category');
            $price = ProductCategory::find($obj)->value('msrp');
            $detail = PaymentDetail::create([
                'payment_id' => $payment->id,
                'detail' => $product['id'],
                'quantity' => $product['qty'],
                'subtotal' => $price * $product['qty'],
            ]);
            $total += $detail->subtotal;
        }
        $payment->total = $total;
        $payment->save();
        return $payment;
    }

    public function show($payment)
    {
        
        return $payment;
    }
}