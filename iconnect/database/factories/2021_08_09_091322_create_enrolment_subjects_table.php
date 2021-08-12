<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnrolmentSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enrolment_subjects', function (Blueprint $table) {
            $table->id();
            $table->string('creatorId');
            $table->string('subjectName');
            $table->string('subjectCode');
            $table->integer('lecturerId');
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
        Schema::dropIfExists('enrolment_subjects');
    }
}
