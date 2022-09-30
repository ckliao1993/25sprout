<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Model\User;

class PaymentTest extends TestCase
{
    // use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $email = 'test@custom.com';
        $this->seed();
        $user = factory(User::class)->create(['email' => $email,]);
        $response = $this->postJson('/api/auth/login', [
            'email' => $email,
            'password' => 'password',
        ]);
        $payment = $this->json('POST', '/api/newPayment', [
            "products" => array(
                ["id"=>2, "qty"=>1],
                ["id"=>4, "qty"=>3],
                ["id"=>6, "qty"=>5],
                ["id"=>8, "qty"=>7],
            ),
        ]);
        $payment->assertJsonPath('status', 'new');
    }
}
