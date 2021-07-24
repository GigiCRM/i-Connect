<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfileStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile_students', function (Blueprint $table) {
            $table->id();
            $table->string('Name');
            $table->string('Gender');
            $table->string('StudentID');
            $table->string('Batch_No');
            $table->string('Email');
            $table->integer('Contact')->unsigned();
            $table->string('University');
            $table->string('FieldOfStudy');
            $table->string('Program');
            $table->double('GPA',2,1);
            $table->integer('YearGraduate');
            $table->string('RelevantProject');
            $table->string('Result');
            $table->string('Image');
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
        Schema::dropIfExists('profile_students');
    }
}
