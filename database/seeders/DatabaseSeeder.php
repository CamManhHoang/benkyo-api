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

        // Read the SQL file contents
        $prefecture = file_get_contents($prefecture);
        $city = file_get_contents($city);

        // Execute the SQL statements
        DB::unprepared($prefecture);
        DB::unprepared($city);
    }
}
