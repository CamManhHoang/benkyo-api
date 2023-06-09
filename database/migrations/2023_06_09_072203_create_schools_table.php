<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schools', function (Blueprint $table) {
            $table->id();
            $table->string('school_code');
            $table->string('school_name');
            $table->string('school_locate_at');
            $table->string('school_type_code');
            $table->string('school_type');
            $table->string('zip_code');
            $table->integer('city_id')->nullable();
            $table->integer('pref_code');
            $table->string('pref');
            $table->integer('school_status_code')->nullable();
            $table->string('school_status')->nullable();
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
        Schema::dropIfExists('schools');
    }
}
