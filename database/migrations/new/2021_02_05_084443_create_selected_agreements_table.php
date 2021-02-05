<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSelectedAgreementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('selected_agreements', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('selected_student_id');
            $table->string('filename')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->timestamps();
        });

        Schema::table('selected_agreements', function (Blueprint $table) {
            $table->foreign('selected_student_id')->references('id')->on('selected_students');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('selected_agreements');
    }
}
