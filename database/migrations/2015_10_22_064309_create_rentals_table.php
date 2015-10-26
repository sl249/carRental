<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRentalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rentals', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('car_id');
            $table->integer('numDays');
            $table->string('initMileage', 32);
            $table->string('finMileage', 32);
            $table->string('firstPayment', 10);
            $table->string('lastPayment', 10);
            $table->boolean('state');
            $table->timestamps();

        });

        Schema::table('rentals', function($table) {

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('car_id')->references('id')->on('cars');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::drop('rentals');
    
    }
}
