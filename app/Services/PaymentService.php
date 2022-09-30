<?php

namespace App\Services;

use App\Model\Payment;
use App\Model\Product;
use App\Model\PaymentDetail;
use App\Model\ProductCategory;
use Illuminate\Support\Facades\Auth;

class PaymentService
{

    // List all obj.
    // @return $allobj
    public function index()
    {
        $allPayment = Payment::get();
        return $allPayment;
    }

    // Create new product
    public function store($content)
    {
        $new = Payment::create($content->all());
        return $new;
    }

    // Update product.
    public function update($content, $obj)
    {
        $obj->update($content->all());
        return $obj;
    }

    // Delete product.
    public function destroy($obj)
    {
        $obj->delete();
    }

    // Show one obj.
    public function show($obj)
    {
        $payment = Payment::with('hasdetails', 'isuser')->find($obj->id);
        return $payment;
    }

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
}