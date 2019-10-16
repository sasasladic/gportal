<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('slots');
            $table->integer('port');
            $table->string('username');
            $table->string('password');
            $table->date('expire_on');
            $table->unsignedInteger('machine_id');
            $table->unsignedInteger('mod_id');
            $table->unsignedInteger('user_id');
            $table->timestamps();
        });

        Schema::table('servers', function ($table) {
            $table->foreign('machine_id')->references('id')->on('machines')->onDelete('cascade');
            $table->foreign('mod_id')->references('id')->on('mods')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('servers');
    }
}
