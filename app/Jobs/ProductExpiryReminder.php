<?php

namespace App\Jobs;

use App\Models\OrderItem;
use App\Notifications\ProductExpiringNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProductExpiryReminder implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        OrderItem::with('order.customer', 'product')
            ->almostExpiring()
            ->get()
            ->groupBy(function ($order_item) {
                return $order_item->order->customer_id;
            })->map(function ($order_items) {
                $record = [];
                $record['customer'] = collect($order_items)->first()->order->customer;
                $record['expiring_items'] = $order_items;
                return $record;
            })->each(function ($record) {
                // For each send notification
                $record['customer']->notify(new ProductExpiringNotification($record['expiring_items']));
            });
    }
}
