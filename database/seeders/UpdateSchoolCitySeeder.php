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

            $elementary = [
                3319,
                709,
                708,
                947,
                769,
                841,
                956,
                618,
                1168,
                2662,
                1874,
                1817,
                3254,
                3315,
                1527,
                711,
                926,
                608,
                604,
                738,
                775,
                2035,
                2205,
                1514,
                697,
                1197,
                2944,
                2213,
                695,
                818,
                571,
                243,
                950,
                1540,
                634,
                629,
                560,
                753,
                463,
                2438,
                508,
                609,
                1198,
                1001,
                664,
                1921,
                1145,
            ];

            $middle = [
                11390,
                2945,
                2798,
                4875,
                2156,
                2198,
                4090,
                5851,
                4032,
                4003,
                12594,
                10842,
                20199,
                14776,
                4713,
                2036,
                2220,
                1860,
                1834,
                4717,
                4222,
                6961,
                14012,
                3769,
                3135,
                5135,
                16914,
                10388,
                2771,
                2301,
                1353,
                1811,
                4126,
                5636,
                2981,
                1717,
                2059,
                2774,
                1963,
                10211,
                2131,
                3225,
                4106,
                2521,
                2736,
                4289,
                3972
            ];

            // list all cities that displayed on WordPress Benkyo site
            for ($i = 1; $i <= 47; $i++) {
                DB::table('pref_teacher_reports')->insert([
                    'id' => $i,
                    'prefecture_id' => $i,
                    'elementary' => $elementary[$i - 1],
                    'middle' => $middle[$i - 1],
                    'senior' => null,
                    'year' => '2022',
                ]);
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();

            echo $e->getMessage();
        }
    }
}
