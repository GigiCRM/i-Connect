<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnrolmentStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enrolment_students', function (Blueprint $table) {
            $table->id();
            $table->integer('studentId');
            $table->string('subjectId');
            $table->string('subjectName');
            $table->string('subjectCode');
            $table->string('lecturerId');
            $table->string('lecturerEmail');
            $table->string('faculty');
            $table->integer('availableNo');
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
        Schema::dropIfExists('enrolment_students');
    }
}
