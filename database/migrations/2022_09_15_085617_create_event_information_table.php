<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_information', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('people_limit_id')->unsigned();
            $table->foreign('people_limit_id')->references('id')->on('people_limits');
            $table->integer('entry_number_of_people');
            $table->dateTime('entry_date');
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
        Schema::dropIfExists('event_information');
    }
}
