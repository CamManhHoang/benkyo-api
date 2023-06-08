<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cities', function (Blueprint $table) {
            $table->id();
            $table->integer('prefecture_id');
            $table->string('code');
            $table->string('name');
            $table->string('slug')->nullable();
            $table->boolean('is_display')->default(0);
            $table->tinyInteger('big_city_flag')->comment('Special wards and administrative district flags:
            (0: general municipalities, 1: wards of ordinance-designated cities, 2: cities of ordinance-designated cities, 3: 23 wards of Tokyo)');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cities');
    }
}
