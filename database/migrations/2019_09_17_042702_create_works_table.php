<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('works', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('hospital_id')->nullable();
            $table->unsignedBigInteger('doctor_id')->nullable();
            $table->time('working_time');
            $table->string('working_days'); 
            $table->timestamps();

            $table->foreign('hospital_id')
            ->references('id')->on('hospitals')
            ->onDelete('cascade');

            $table->foreign('doctor_id')
            ->references('id')->on('doctors')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('works');
    }
}
