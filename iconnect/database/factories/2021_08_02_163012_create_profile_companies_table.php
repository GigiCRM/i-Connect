<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfileCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile_companies', function (Blueprint $table) {
            $table->id();
            $table->string('companyId');
            $table->string('name');
            $table->string('founder');
            $table->string('type');
            $table->string('address');
            $table->string('image');
            $table->integer('contact');
            $table->string('ssm');
            $table->string('establish');
            $table->string('URL');

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
        Schema::dropIfExists('profile_companies');
    }
}
