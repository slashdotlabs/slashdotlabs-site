<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerDomainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_domains', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("domain_name"); // remember to strip http https www from name
            $table->bigInteger("domain_tld_id"); //this will be product_id
            $table->bigInteger("customer_id"); // user_id

            $table->boolean('suspended')->default(false);
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
        Schema::dropIfExists('customer_domains');
    }
}
