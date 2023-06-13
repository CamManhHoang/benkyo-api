<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Get the path to the SQL file
        $prefecture = database_path('seeds/prefectures.sql');
        $city = database_path('seeds/cities.sql');
        $school = database_path('seeds/schools.sql');

        // Read the SQL file contents
        $prefecture = file_get_contents($prefecture);
        $city = file_get_contents($city);
        $school = file_get_contents($school);

        // Execute the SQL statements
        DB::unprepared($prefecture);
        DB::unprepared($city);
        DB::unprepared($school);
    }
}
