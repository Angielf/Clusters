<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSelectedProgramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('selected_programs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('proposed_program_id');
            // $table->unsignedBigInteger('school_id');
            $table->unsignedSmallInteger('school_id');
            $table->tinyInteger('status')->default(0);
            $table->timestamps();
        });

        Schema::table('selected_programs', function (Blueprint $table) {
            $table->foreign('school_id')->references('id')->on('users');
        });

        Schema::table('selected_programs', function (Blueprint $table) {
            $table->foreign('proposed_program_id')->references('id')->on('proposed_programs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('selected_programs');
    }
}
