<?php

use Illuminate\Database\Migrations\Migration;

class CreatePassportsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        //
        Schema::table('passports', function ($table) {
                    $table->engine = 'InnoDB';
                    $table->create();

                    $table->increments('id');

                    $table->integer('user_id')->unsigned();

                    $table->integer('number');

                    $table->timestamps();

                    $table->foreign('user_id')->references('id')->on('users');
                });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        //
        Schema::drop('passports');
    }

}