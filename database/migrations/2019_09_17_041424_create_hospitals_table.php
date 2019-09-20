<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHospitalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hospitals', function (Blueprint $table) {
            $table->bigIncrements('id');
            //$table->integer('hospital_id')->index()->unique();
            $table->string('hospital_name');
            $table->bigInteger('telephone_no');
            $table->string('licence_id');
            $table->time('open_time');
            $table->time('close_time');
            $table->string('pharmacy'); 
            $table->string('scan');
            $table->string('x-ray'); 
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
        Schema::dropIfExists('hospitals');
    }
}
