<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInternFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('intern_forms', function (Blueprint $table) {
            $table->id();
            $table->integer('studentId');
            $table->string('studentName');
            $table->string('faculty');
            $table->string('program');
            $table->string('address');
            $table->string('contact');
            $table->string('companyName');
            $table->string('companyAddress');
            $table->string('jobType');
            $table->string('jobName');
            $table->string('position');
            $table->integer('salary');
            $table->string('status')->nullable();
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
        Schema::dropIfExists('intern_forms');
    }
}
