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
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('game_id');
            $table->unsignedInteger('location_id');
            $table->unsignedInteger('mod_id')->nullable();
            $table->integer('slots')->nullable();
            $table->integer('gigabytes')->nullable();
            $table->unsignedInteger('order_status_id');
            $table->unsignedInteger('image_id')->nullable();
            $table->string('payment_method');
            $table->double('price_without_discount');
            $table->double('discount');
            $table->double('price');
            $table->timestamps();
        });

        Schema::table('orders', function ($table) {
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('game_id')->references('id')->on('games');
            $table->foreign('mod_id')->references('id')->on('mods');
            $table->foreign('location_id')->references('id')->on('locations');
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
