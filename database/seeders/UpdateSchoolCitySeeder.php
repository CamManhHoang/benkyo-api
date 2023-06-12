<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\School;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UpdateSchoolCitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        try {
            DB::beginTransaction();

            // list all cities that displayed on WordPress Benkyo site
            $cityList = City::select('id', 'name', 'prefecture_id')->where('is_display', 1)->get();
            foreach ($cityList as $city) {
                // Update city_id for school has school_locate_at contains the city name
                 School::where('school_locate_at', 'LIKE', '%' . $city->name . '%')->where('pref_code', $city->prefecture_id)
                    ->update(['city_id' => $city->id]);
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();

            echo $e->getMessage();
        }
    }
}
