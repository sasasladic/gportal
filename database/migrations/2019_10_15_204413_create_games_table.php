<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('short_name');
            $table->unsignedInteger('image_id')->nullable();
            $table->integer('min_slots')->nullable();
            $table->integer('max_slots')->nullable();
            $table->integer('min_gigabytes')->nullable();
            $table->integer('max_gigabytes')->nullable();
            $table->integer('increase_by')->nullable();
            $table->text('description');

        });

        Schema::table('games', function ($table) {
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
        Schema::dropIfExists('games');
    }
}
