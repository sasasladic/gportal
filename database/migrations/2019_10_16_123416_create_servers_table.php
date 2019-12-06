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
            $table->integer('port')->nullable();
            $table->string('status');
            $table->string('username')->nullable();
            $table->string('password')->nullable();
            $table->timestamp('expire_on')->nullable();
            $table->unsignedInteger('machine_id');
            $table->unsignedInteger('mod_id')->nullable();
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('game_id');
            $table->timestamps();
        });

        Schema::table('servers', function ($table) {
            $table->foreign('machine_id')->references('id')->on('machines')->onDelete('cascade');
            $table->foreign('mod_id')->references('id')->on('mods')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('game_id')->references('id')->on('games')->onDelete('cascade');
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
