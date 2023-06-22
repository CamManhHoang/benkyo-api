<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrefTeacherReports extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pref_teacher_reports', function (Blueprint $table) {
            $table->id();
            $table->integer('prefecture_id');
            $table->integer('total');
            $table->integer('elementary');
            $table->integer('middle');
            $table->integer('senior');
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
        Schema::dropIfExists('pref_teacher_reports');
    }
}
