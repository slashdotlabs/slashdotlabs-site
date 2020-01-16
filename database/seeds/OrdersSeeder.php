<?php

use App\Models\CustomerDomain;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Payment;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrdersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Order::doesntHave('payment')->delete();

        DB::table('orders')->where('total_amount', '=', 0)->delete();

        $orders = factory(Order::class, 3)->make(['paid' => true]);
        $orders->map(function (Order $order) {
            $order->save();
            return $order;
        })->each(function ($order) {
            // Create domain order_item
            $customer_domain = factory(CustomerDomain::class)->create([
                'customer_id' => $order->load('customer')->customer->id
            ])->load('domain_tld');
            $domain_item = factory(OrderItem::class)->make([
                'product_id' => $customer_domain->id,
                'product_type' => CustomerDomain::class,
                'price' => $customer_domain->domain_tld->price
            ]);

            $order_items = [
                $domain_item,
                factory(OrderItem::class)->state('hosting')->make(),
                factory(OrderItem::class)->state('ssl')->make()
            ];

            collect($order_items)->each(function (OrderItem $order_item) use (&$order) {
                $order_item->order()->associate($order);
                $order->total_amount += $order_item->price;
                $order_item->push();
                $order_item->save();
            });

            // Create payment
            factory(Payment::class)->state('manual')->create([
                'customer_id' => $order->load('customer')->customer->id,
                'order_id' => $order->order_id,
                'amount' => $order->total_amount
            ]);
        });


    }
}
