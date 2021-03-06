<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->integer('publisherId');
            $table->string('companyName');
            $table->string('jobName');
            $table->string('position');
            $table->integer('salary');
            $table->string('qualification');
            $table->string('location');
            $table->string('workingHour');
            $table->string('typeOfJob');
            $table->string('description');
            $table->string('employeeType');
            $table->string('image');
            $table->string('status');
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
        Schema::dropIfExists('jobs');
    }
}
