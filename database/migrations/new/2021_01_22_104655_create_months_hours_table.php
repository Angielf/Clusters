<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMonthsHoursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('months_hours', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('schedule_id');
            $table->unsignedBigInteger('school_schedule_id');

            $table->string('month_1');
            $table->string('estimated_1')->nullable();
            $table->string('real_1')->nullable();
            $table->tinyInteger('status_1')->default(0);

            $table->string('month_2')->nullable();
            $table->string('estimated_2')->nullable();
            $table->string('real_2')->nullable();
            $table->tinyInteger('status_2')->default(0);

            $table->string('month_3')->nullable();
            $table->string('estimated_3')->nullable();
            $table->string('real_3')->nullable();
            $table->tinyInteger('status_3')->default(0);

            $table->string('month_4')->nullable();
            $table->string('estimated_4')->nullable();
            $table->string('real_4')->nullable();
            $table->tinyInteger('status_4')->default(0);

            $table->string('month_5')->nullable();
            $table->string('estimated_5')->nullable();
            $table->string('real_5')->nullable();
            $table->tinyInteger('status_5')->default(0);

            $table->string('month_6')->nullable();
            $table->string('estimated_6')->nullable();
            $table->string('real_6')->nullable();
            $table->tinyInteger('status_6')->default(0);

            $table->string('month_7')->nullable();
            $table->string('estimated_7')->nullable();
            $table->string('real_7')->nullable();
            $table->tinyInteger('status_7')->default(0);

            $table->string('month_8')->nullable();
            $table->string('estimated_8')->nullable();
            $table->string('real_8')->nullable();
            $table->tinyInteger('status_8')->default(0);

            $table->string('month_9')->nullable();
            $table->string('estimated_9')->nullable();
            $table->string('real_9')->nullable();
            $table->tinyInteger('status_9')->default(0);

            $table->string('month_10')->nullable();
            $table->string('estimated_10')->nullable();
            $table->string('real_10')->nullable();
            $table->tinyInteger('status_10')->default(0);

            $table->string('month_11')->nullable();
            $table->string('estimated_11')->nullable();
            $table->string('real_11')->nullable();
            $table->tinyInteger('status_11')->default(0);

            $table->string('month_12')->nullable();
            $table->string('estimated_12')->nullable();
            $table->string('real_12')->nullable();
            $table->tinyInteger('status_12')->default(0);

            $table->timestamps();
        });

        Schema::table('months_hours', function (Blueprint $table) {
            $table->foreign('schedule_id')->references('id')->on('schedules');
        });

        Schema::table('months_hours', function (Blueprint $table) {
            $table->foreign('school_schedule_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('months_hours');
    }
}
