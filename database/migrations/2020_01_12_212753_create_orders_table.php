<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('domaincart_orders', function (Blueprint $table) {
            $table->bigInteger('order_id');
            $table->bigInteger("customer_id");
            $table->bigInteger("product_id");
            $table->decimal("amount");
            $table->string("currency");
            $table->dateTime("expiry_date");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('domaincart_orders');
    }
}
