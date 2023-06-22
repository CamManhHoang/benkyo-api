<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitySchoolReports extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('city_school_reports', function (Blueprint $table) {
            $table->id();
            $table->integer('prefecture_id');
            $table->integer('city_id');
            $table->string('city_name');
            $table->integer('elementary')->nullable();
            $table->integer('middle')->nullable();
            $table->integer('senior')->nullable();
            $table->integer('year');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('city_school_reports');
    }
}
