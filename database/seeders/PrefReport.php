<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\School;
use GuzzleHttp\Client;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use stdClass;

class PrefReport extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        try {
            for ($i = 1; $i <= 47; $i++) {
                DB::table('pref_school_reports')->insert([
                    'id' => $i,
                    'prefecture_id' => $i,
                    'year' => '2022',
                ]);
            }

            $elementarySchoolFile = database_path('seeders/elementary_school.xlsx');

            $elementarySchool = Excel::toCollection(new stdClass(), $elementarySchoolFile);
            // loop through all sheets to get data
            foreach ($elementarySchool as $prefId => $sheet) {
                if ($prefId == '0') {
                    DB::table('pref_school_reports')->where('prefecture_id', 999)->update(['elementary' => $sheet[5][1]]);
                } else {
                    DB::table('pref_school_reports')->where('prefecture_id', $prefId)->update(['elementary' => $sheet[5][2]]);
                }
            }

            $middleSchoolFile = database_path('seeders/middle_school.xlsx');

            $middleSchool = Excel::toCollection(new stdClass(), $middleSchoolFile);
            // loop through all sheets to get data
            foreach ($middleSchool as $prefId => $sheet) {
                if ($prefId == '0') {
                    DB::table('pref_school_reports')->where('prefecture_id', 999)->update(['middle' => $sheet[5][1]]);
                } else {
                    DB::table('pref_school_reports')->where('prefecture_id', $prefId)->update(['middle' => $sheet[5][2]]);
                }
            }

            $seniorSchoolFile = database_path('seeders/senior_school.xlsx');

            $seniorSchool = Excel::toCollection(new stdClass(), $seniorSchoolFile);
            // loop through all sheets to get data
            foreach ($seniorSchool as $prefId => $sheet) {
                if ($prefId == '0') {
                    DB::table('pref_school_reports')->where('prefecture_id', 999)->update(['senior' => $sheet[5][1]]);
                } else {
                    DB::table('pref_school_reports')->where('prefecture_id', $prefId)->update(['senior' => $sheet[5][2]]);
                }
            }

            $seniorStudentFullTimeFile = database_path('seeders/senior_student_fulltime.xlsx');

            $seniorStudentFullTime = Excel::toCollection(new stdClass(), $seniorStudentFullTimeFile);
            // loop through all sheets to get data
            foreach ($seniorStudentFullTime as $prefId => $sheet) {
                if ($prefId == '0') {
                    DB::table('pref_student_reports')->where('prefecture_id', 999)->update(['senior_fulltime' => $sheet[5][1]]);
                } else {
                    DB::table('pref_student_reports')->where('prefecture_id', $prefId)->update(['senior_fulltime' => $sheet[5][2]]);
                }
            }

            $seniorStudentPartTimeFile = database_path('seeders/senior_student_parttime.xlsx');

            $seniorStudentPartTime = Excel::toCollection(new stdClass(), $seniorStudentPartTimeFile);
            // loop through all sheets to get data
            foreach ($seniorStudentPartTime as $prefId => $sheet) {
                if ($prefId == '0') {
                    DB::table('pref_student_reports')->where('prefecture_id', 999)->update(['senior_partime' => $sheet[5][1]]);
                } else {
                    DB::table('pref_student_reports')->where('prefecture_id', $prefId)->update(['senior_partime' => $sheet[5][2]]);
                }
            }

        } catch (\Exception $e) {
            // If an error occurs, rollback the transaction

            echo $e->getMessage();
        }
    }
}
