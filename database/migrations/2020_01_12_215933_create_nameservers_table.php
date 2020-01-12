<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNameserversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('domaincart_nameservers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger("domain_id");
            $table->string("ip_address");

            $table->boolean("suspended")->default(false);
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
        Schema::dropIfExists('domaincart_nameservers');
    }
}
