<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMachinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('machines', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ip_address');
            $table->string('name');
            $table->integer('ssh_port');
            $table->string('root_username');
            $table->string('root_password');
            $table->unsignedInteger('location_id');
            $table->double('price_per_slot');
            $table->timestamps();
        });

        Schema::table('machines', function ($table) {
            $table->foreign('location_id')->references('id')->on('locations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('machines');
    }
}
