<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('schedules', function (Blueprint $table) {
        //     $table->id();
        //     $table->smallInteger('program_id')->unsigned();
        //     $table->string('filename');
        //     $table->timestamps();
        // });

        Schema::table('schedules', function (Blueprint $table) {
            $table->foreign('program_id')->references('id')->on('programs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schedules');
    }
}
