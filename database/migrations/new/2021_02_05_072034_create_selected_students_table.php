<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSelectedStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('selected_students', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('selected_schedule_id');
            $table->string('filename')->nullable();
            $table->smallInteger('students_amount')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->timestamps();
        });

        Schema::table('selected_students', function (Blueprint $table) {
            $table->foreign('selected_schedule_id')->references('id')->on('selected_schedules');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('selected_students');
    }
}
