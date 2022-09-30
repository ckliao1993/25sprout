<?php

namespace App\Services;

use App\Model\Payment;

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
    public function sotre($content)
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
        $payment = Payment::show($obj);
        return $payment;
    }
}