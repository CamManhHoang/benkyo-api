<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\School;
use GuzzleHttp\Client;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use stdClass;

class CityReport extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        try {
            DB::table('city_school_reports')->truncate();
            DB::table('city_student_reports')->truncate();
            DB::table('city_teacher_reports')->truncate();

            $cities = City::all();
            foreach ($cities as $city) {
                DB::table('city_school_reports')->insert([
                    'prefecture_id' => $city->prefecture_id,
                    'city_id' => $city->id,
                    'city_name' => $city->name,
                    'year' => '2022',
                ]);
                DB::table('city_student_reports')->insert([
                    'prefecture_id' => $city->prefecture_id,
                    'city_id' => $city->id,
                    'city_name' => $city->name,
                    'year' => '2022',
                ]);
                DB::table('city_teacher_reports')->insert([
                    'prefecture_id' => $city->prefecture_id,
                    'city_id' => $city->id,
                    'city_name' => $city->name,
                    'year' => '2022',
                ]);
            }

            $elementarySchoolFile = database_path('seeders/elementary_school.xlsx');

            $elementarySchool = Excel::toCollection(new stdClass(), $elementarySchoolFile);
            // loop through all sheets to get data
            foreach ($elementarySchool as $prefId => $sheet) {
                $data = $sheet->skip(6)->toArray();
                foreach ($data as $row) {
                    // $row[1] is city name
                    $city = City::where('prefecture_id', $prefId)->where('name', 'LIKE', '%' . $row[1] . '%')->first();
                    if ($city) {
                        DB::table('city_school_reports')->where('city_id', $city->id)->update(['elementary' => $row[2]]);
                    }
                }
            }

            $middleSchoolFile = database_path('seeders/middle_school.xlsx');

            $middleSchool = Excel::toCollection(new stdClass(), $middleSchoolFile);
            // loop through all sheets to get data
            foreach ($middleSchool as $prefId => $sheet) {
                $data = $sheet->skip(6)->toArray();
                foreach ($data as $row) {
                    // $row[1] is city name
                    $city = City::where('prefecture_id', $prefId)->where('name', 'LIKE', '%' . $row[1] . '%')->first();
                    if ($city) {
                        DB::table('city_school_reports')->where('city_id', $city->id)->update(['middle' => $row[2]]);
                    }
                }
            }

            $seniorSchoolFile = database_path('seeders/senior_school.xlsx');

            $seniorSchool = Excel::toCollection(new stdClass(), $seniorSchoolFile);
            // loop through all sheets to get data
            foreach ($seniorSchool as $prefId => $sheet) {
                $data = $sheet->skip(6)->toArray();
                foreach ($data as $row) {
                    // $row[1] is city name
                    $city = City::where('prefecture_id', $prefId)->where('name', 'LIKE', '%' . $row[1] . '%')->first();
                    if ($city) {
                        DB::table('city_school_reports')->where('city_id', $city->id)->update(['senior' => $row[2]]);
                    }
                }
            }

            $elementaryStudentFile = database_path('seeders/elementary_student.xlsx');

            $elementaryStudent = Excel::toCollection(new stdClass(), $elementaryStudentFile);
            // loop through all sheets to get data
            foreach ($elementaryStudent as $prefId => $sheet) {
                $data = $sheet->skip(5)->toArray();
                foreach ($data as $row) {
                    // $row[1] is city name
                    $city = City::where('prefecture_id', $prefId)->where('name', 'LIKE', '%' . $row[1] . '%')->first();
                    if ($city) {
                        DB::table('city_student_reports')->where('city_id', $city->id)->update(['elementary' => $row[2]]);
                    }
                }
            }

            $middleStudentFile = database_path('seeders/middle_student.xlsx');

            $middleStudent = Excel::toCollection(new stdClass(), $middleStudentFile);
            // loop through all sheets to get data
            foreach ($middleStudent as $prefId => $sheet) {
                $data = $sheet->skip(5)->toArray();
                foreach ($data as $row) {
                    // $row[1] is city name
                    $city = City::where('prefecture_id', $prefId)->where('name', 'LIKE', '%' . $row[1] . '%')->first();
                    if ($city) {
                        DB::table('city_student_reports')->where('city_id', $city->id)->update(['middle' => $row[2]]);
                    }
                }
            }

            $seniorStudentFullTimeFile = database_path('seeders/senior_student_fulltime.xlsx');

            $seniorStudentFullTime = Excel::toCollection(new stdClass(), $seniorStudentFullTimeFile);
            // loop through all sheets to get data
            foreach ($seniorStudentFullTime as $prefId => $sheet) {
                $data = $sheet->skip(5)->toArray();
                foreach ($data as $row) {
                    // $row[1] is city name
                    $city = City::where('prefecture_id', $prefId)->where('name', 'LIKE', '%' . $row[1] . '%')->first();
                    if ($city) {
                        DB::table('city_student_reports')->where('city_id', $city->id)->update(['senior_fulltime' => $row[2]]);
                    }
                }
            }

            $seniorStudentPartTimeFile = database_path('seeders/senior_student_parttime.xlsx');

            $seniorStudentPartTime = Excel::toCollection(new stdClass(), $seniorStudentPartTimeFile);
            // loop through all sheets to get data
            foreach ($seniorStudentPartTime as $prefId => $sheet) {
                $data = $sheet->skip(5)->toArray();
                foreach ($data as $row) {
                    // $row[1] is city name
                    $city = City::where('prefecture_id', $prefId)->where('name', 'LIKE', '%' . $row[1] . '%')->first();
                    if ($city) {
                        DB::table('city_student_reports')->where('city_id', $city->id)->update(['senior_partime' => $row[2]]);
                    }
                }
            }

            $elementaryTeacherFile = database_path('seeders/elementary_teacher.xlsx');

            $elementaryTeacher = Excel::toCollection(new stdClass(), $elementaryTeacherFile);
            // loop through all sheets to get data
            foreach ($elementaryTeacher as $prefId => $sheet) {
                $data = $sheet->skip(5)->toArray();
                foreach ($data as $row) {
                    // $row[1] is city name
                    $city = City::where('prefecture_id', $prefId)->where('name', 'LIKE', '%' . $row[1] . '%')->first();
                    if ($city) {
                        DB::table('city_teacher_reports')->where('city_id', $city->id)->update(['elementary' => $row[2]]);
                    }
                }
            }

            $middleTeacherFile = database_path('seeders/middle_teacher.xlsx');

            $middleTeacher = Excel::toCollection(new stdClass(), $middleTeacherFile);
            // loop through all sheets to get data
            foreach ($middleTeacher as $prefId => $sheet) {
                $data = $sheet->skip(5)->toArray();
                foreach ($data as $row) {
                    // $row[1] is city name
                    $city = City::where('prefecture_id', $prefId)->where('name', 'LIKE', '%' . $row[1] . '%')->first();
                    if ($city) {
                        DB::table('city_teacher_reports')->where('city_id', $city->id)->update(['middle' => $row[2]]);
                    }
                }
            }


        } catch (\Exception $e) {
            // If an error occurs, rollback the transaction

            echo $e->getMessage();
        }
    }
}
