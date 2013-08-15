<?php

use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('users', function($table) {
                    $table->engine = 'InnoDB';

                    $table->create();

                    $table->increments('id')->unsigned();

                    $table->string('email');
                    $table->string('real_name');
                    $table->string('password');

                    $table->timestamps();
                });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        //
        Schema::drop('users');
    }

}