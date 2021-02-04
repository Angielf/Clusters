<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameStudentsIdColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('agreements', function (Blueprint $table) {
            $table->renameColumn('students_id', 'student_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('agreements', function (Blueprint $table) {
            $table->renameColumn('student_id', 'students_id');
        });
    }
}
