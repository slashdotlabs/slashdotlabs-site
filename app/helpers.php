<?php

// Generate urls for the wordpress site
function wordpress_url($path)
{
    return config('app.wordpress_url') . $path;
}

function get_product_name(\App\Models\OrderItem $order_item)
{
    if ($order_item->product_type == \App\Models\Product::class) {
        return $order_item->product->product_name;
    } else {
        return $order_item->product->domain_name;
    }
}

function get_product_type(\App\Models\OrderItem $order_item)
{
    if ($order_item->product_type == \App\Models\Product::class) {
        return $order_item->product->product_type;
    } else {
        $order_item->product->load('domain_tld');
        $type = $order_item->product->domain_tld->product_type;
        return $type;
    }
}
