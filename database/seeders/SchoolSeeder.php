<?php

namespace Database\Seeders;

use App\Models\School;
use GuzzleHttp\Client;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SchoolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $client = new Client();
        echo 'Getting data from edu data API and insert into database...' . PHP_EOL;
        $token = env('EDU_DATA_API_TOKEN');

        // Continue to loop API where we left off
        $index = School::max('id');
        $leftoffPage = $index / 100;

        // loop through 587 pages of school API and get data
        for ($i = $leftoffPage + 1; $i <= 587; $i++) {
            echo 'Getting data for page number ' . $i . '...' . PHP_EOL;
            try {
                DB::beginTransaction();

                $url = 'https://api.edu-data.jp/api/v1/school?page=' . $i;
                $response = $client->get($url, [
                    'headers' => [
                        'Authorization' => 'Bearer ' . $token,
                        'Accept' => 'application/json',
                    ],
                ]);
                $data = json_decode($response->getBody(), true);
                $schools = $data['schools']['data'];

                $fillableAttributes = [
                    'school_code',
                    'school_name',
                    'school_locate_at',
                    'school_type_code',
                    'school_type',
                    'zip_code',
                    'pref_code',
                    'pref',
                    'school_status_code',
                    'school_status',
                ];

                $filteredData = array_map(function ($record) use ($fillableAttributes) {
                    return array_intersect_key($record, array_flip($fillableAttributes));
                }, $schools);
                DB::table('schools')->insert($filteredData);

                DB::commit();
            } catch (\Exception $e) {
                // If an error occurs, rollback the transaction
                DB::rollback();

                echo $e->getMessage();
                break;
            }
        }

        echo 'API limit reached. Continue the seeder command in the next few minutes.' . PHP_EOL;
    }
}
