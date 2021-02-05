<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProposedProgramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proposed_programs', function (Blueprint $table) {
            $table->id();

            $table->unsignedSmallInteger('user_id');
            $table->string('class')->nullable();
            $table->string('subject')->nullable();
            $table->string('modul')->nullable();
            $table->string('content')->nullable();
            $table->string('form_of_education')->nullable();
            $table->string('form_education_implementation')->nullable();
            $table->string('hours')->nullable();
            $table->string('educational_program')->nullable();
            $table->string('educational_activity')->nullable();
            $table->string('date_begin')->nullable();
            $table->string('date_end')->nullable();
            $table->string('filename')->nullable();
            $table->tinyInteger('status')->default(0);

            $table->timestamps();
        });

        Schema::table('proposed_programs', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proposed_programs');
    }
}
