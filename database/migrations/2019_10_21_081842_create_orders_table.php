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
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_no');
            $table->double('price');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('server_id');
            $table->unsignedInteger('order_status_id');
            $table->unsignedInteger('image_id')->nullable();
            $table->timestamps();
        });

        Schema::table('orders', function ($table) {
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('server_id')->references('id')->on('servers');
            $table->foreign('order_status_id')->references('id')->on('order_statuses');
            $table->foreign('image_id')->references('id')->on('images');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
