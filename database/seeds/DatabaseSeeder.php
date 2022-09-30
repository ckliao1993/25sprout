<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use App\Model\User;
use App\Model\Product;
use App\Model\ProductCategory;
use App\Model\Payment;
use App\Model\PaymentDetail;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_categories')->truncate();
        DB::table('products')->truncate();
        DB::table('payments')->truncate();
        DB::table('payment_details')->truncate();
        DB::table('users')->truncate();

        // $this->call(UsersTableSeeder::class);
        $user = factory(User::class, 3)->create();

        $productCategory = factory(ProductCategory::class, 3)->create()->each(function($category){
            $category->hasproducts()->createMany(factory(Product::class, 3)->make()->toArray());
        });

        // $payment = factory(Payment::class, 3)->create()->each(function($order){
        //     $order->hasdetails()->createMany(factory(PaymentDetail::class, 3)->make()->toArray());
        // });
    }
}
