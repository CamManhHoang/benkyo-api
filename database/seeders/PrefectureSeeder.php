<?php

namespace Database\Seeders;

use GuzzleHttp\Client;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PrefectureSeeder extends Seeder
{

    public function run()
    {
//        $client = new Client();

        try {
//            $url = 'https://opendata.resas-portal.go.jp/api/v1/prefectures';
//            $apiKey = env('OPEN_DATA_API_KEY');
//            $response = $client->get($url, [
//                'headers' => [
//                    'X-API-KEY' => $apiKey,
//                    'Accept' => 'application/json',
//                ],
//            ]);
//            $data = json_decode($response->getBody(), true);

            $prefectures = [
                [
                    "id" => 1,
                    "name" => "北海道",
                    "slug" => "hokkaido-pref"
                ],
                [
                    "id" => 2,
                    "name" => "青森県",
                    "slug" => "aomori-pref"
                ],
                [
                    "id" => 3,
                    "name" => "岩手県",
                    "slug" => "iwate-pref"
                ],
                [
                    "id" => 4,
                    "name" => "宮城県",
                    "slug" => "miyagi-pref"
                ],
                [
                    "id" => 5,
                    "name" => "秋田県",
                    "slug" => "akita-pref"
                ],
                [
                    "id" => 6,
                    "name" => "山形県",
                    "slug" => "yamagata-pref"
                ],
                [
                    "id" => 7,
                    "name" => "福島県",
                    "slug" => "fukushima-pref"
                ],
                [
                    "id" => 8,
                    "name" => "茨城県",
                    "slug" => "ibaraki-pref"
                ],
                [
                    "id" => 9,
                    "name" => "栃木県",
                    "slug" => "tochigi-pref"
                ],
                [
                    "id" => 10,
                    "name" => "群馬県",
                    "slug" => "gunma-pref"
                ],
                [
                    "id" => 11,
                    "name" => "埼玉県",
                    "slug" => "saitama-pref"
                ],
                [
                    "id" => 12,
                    "name" => "千葉県",
                    "slug" => "chiba-pref"
                ],
                [
                    "id" => 13,
                    "name" => "東京都",
                    "slug" => "tokyo-metropolis"
                ],
                [
                    "id" => 14,
                    "name" => "神奈川県",
                    "slug" => "kanagawa-pref"
                ],
                [
                    "id" => 15,
                    "name" => "新潟県",
                    "slug" => "niigata-pref"
                ],
                [
                    "id" => 16,
                    "name" => "富山県",
                    "slug" => "toyama-pref"
                ],
                [
                    "id" => 17,
                    "name" => "石川県",
                    "slug" => "ishikawa-pref"
                ],
                [
                    "id" => 18,
                    "name" => "福井県",
                    "slug" => "fukui-pref"
                ],
                [
                    "id" => 19,
                    "name" => "山梨県",
                    "slug" => "yamanashi-pref"
                ],
                [
                    "id" => 20,
                    "name" => "長野県",
                    "slug" => "nagano-pref"
                ],
                [
                    "id" => 21,
                    "name" => "岐阜県",
                    "slug" => "gifu-pref"
                ],
                [
                    "id" => 22,
                    "name" => "静岡県",
                    "slug" => "shizuoka-pref"
                ],
                [
                    "id" => 23,
                    "name" => "愛知県",
                    "slug" => "aichi-pref"
                ],
                [
                    "id" => 24,
                    "name" => "三重県",
                    "slug" => "mie-pref"
                ],
                [
                    "id" => 25,
                    "name" => "滋賀県",
                    "slug" => "shiga-pref"
                ],
                [
                    "id" => 26,
                    "name" => "京都府",
                    "slug" => "kyoto-pref"
                ],
                [
                    "id" => 27,
                    "name" => "大阪府",
                    "slug" => "osaka-pref"
                ],
                [
                    "id" => 28,
                    "name" => "兵庫県",
                    "slug" => "hyogo-pref"
                ],
                [
                    "id" => 29,
                    "name" => "奈良県",
                    "slug" => "nara-pref"
                ],
                [
                    "id" => 30,
                    "name" => "和歌山県",
                    "slug" => "wakayama-pref"
                ],
                [
                    "id" => 31,
                    "name" => "鳥取県",
                    "slug" => "tottori-pref"
                ],
                [
                    "id" => 32,
                    "name" => "島根県",
                    "slug" => "shimane-pref"
                ],
                [
                    "id" => 33,
                    "name" => "岡山県",
                    "slug" => "okayama-pref"
                ],
                [
                    "id" => 34,
                    "name" => "広島県",
                    "slug" => "hiroshima-pref"
                ],
                [
                    "id" => 35,
                    "name" => "山口県",
                    "slug" => "yamaguchi-pref"
                ],
                [
                    "id" => 36,
                    "name" => "徳島県",
                    "slug" => "tokushima-pref"
                ],
                [
                    "id" => 37,
                    "name" => "香川県",
                    "slug" => "kagawa-pref"
                ],
                [
                    "id" => 38,
                    "name" => "愛媛県",
                    "slug" => "ehime-pref"
                ],
                [
                    "id" => 39,
                    "name" => "高知県",
                    "slug" => "kochi-pref"
                ],
                [
                    "id" => 40,
                    "name" => "福岡県",
                    "slug" => "fukuoka-pref"
                ],
                [
                    "id" => 41,
                    "name" => "佐賀県",
                    "slug" => "saga-pref"
                ],
                [
                    "id" => 42,
                    "name" => "長崎県",
                    "slug" => "nagasaki-pref"
                ],
                [
                    "id" => 43,
                    "name" => "熊本県",
                    "slug" => "kumamoto-pref"
                ],
                [
                    "id" => 44,
                    "name" => "大分県",
                    "slug" => "oita-pref"
                ],
                [
                    "id" => 45,
                    "name" => "宮崎県",
                    "slug" => "miyazaki-pref"
                ],
                [
                    "id" => 46,
                    "name" => "鹿児島県",
                    "slug" => "kagoshima-pref"
                ],
                [
                    "id" => 47,
                    "name" => "沖縄県",
                    "slug" => "okinawa-pref"
                ]
            ];

            DB::table('prefectures')->truncate();

            DB::table('prefectures')->insert($prefectures);

        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
}
