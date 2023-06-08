<?php

namespace Database\Seeders;

use App\Models\City;
use GuzzleHttp\Client;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    public function run()
    {
        $client = new Client();
        DB::table('cities')->truncate();

        try {
            echo 'Getting data from opendata API and insert into database...' . PHP_EOL;
            $apiKey = env('OPEN_DATA_API_KEY');
            // loop through 47 prefectures of Japan and insert all cities into database
            for ($i = 1; $i <= 47; $i++) {
                $url = 'https://opendata.resas-portal.go.jp/api/v1/cities?prefCode=' . $i;
                $response = $client->get($url, [
                    'headers' => [
                        'X-API-KEY' => $apiKey,
                        'Accept' => 'application/json',
                    ],
                ]);
                $data = json_decode($response->getBody(), true);

                foreach ($data['result'] as $city) {
                    DB::table('cities')->insert([
                        'prefecture_id' => $city['prefCode'],
                        'code' => $city['cityCode'],
                        'name' => $city['cityName'],
                        'big_city_flag' => $city['bigCityFlag']
                    ]);
                }
            }

            // Update slug and is_display for city (is_display = true means that city will be displayed on benkyo website)
            // List all city slugs in WordPress Benkyo website
            $benkyoCities = [
                [
                    'city_name' => '千代田区',
                    'city_slug' => 'tokyo_23_chiyoda-ward'
                ],
                [
                    'city_name' => '都島区',
                    'city_slug' => 'osaka_osaka_miyakojima-ward'
                ],
                [
                    'city_name' => '千種区',
                    'city_slug' => 'aichi_nagoya_chikusa-ward'
                ],
                [
                    'city_name' => '八王子市',
                    'city_slug' => 'tokyo_other_hachioji-city'
                ],
                [
                    'city_name' => '札幌市',
                    'city_slug' => 'hokkaido_sapporo-city'
                ],
                [
                    'city_name' => '中央区',
                    'city_slug' => 'hyogo_kobe_chuo-ward'
                ],
                [
                    'city_name' => '港区',
                    'city_slug' => 'aichi_nagoya_minato-ward'
                ],
                [
                    'city_name' => '新宿区',
                    'city_slug' => 'tokyo_23_shinjuku-ward'
                ],
                [
                    'city_name' => '文京区',
                    'city_slug' => 'tokyo_23_bunkyo-ward'
                ],
                [
                    'city_name' => '台東区',
                    'city_slug' => 'tokyo_23_taito-ward'
                ],
                [
                    'city_name' => '墨田区',
                    'city_slug' => 'tokyo_23_sumida-ward'
                ],
                [
                    'city_name' => '江東区',
                    'city_slug' => 'tokyo_23_koto-ward'
                ],
                [
                    'city_name' => '品川区',
                    'city_slug' => 'tokyo_23_shinagawa-ward'
                ],
                [
                    'city_name' => '目黒区',
                    'city_slug' => 'tokyo_23_meguro-ward'
                ],
                [
                    'city_name' => '大田区',
                    'city_slug' => 'tokyo_23_ota-ward'
                ],
                [
                    'city_name' => '世田谷区',
                    'city_slug' => 'tokyo_23_setagaya-ward'
                ],
                [
                    'city_name' => '渋谷区',
                    'city_slug' => 'tokyo_23_shibuya-ward'
                ],
                [
                    'city_name' => '中野区',
                    'city_slug' => 'tokyo_23_nakano-ward'
                ],
                [
                    'city_name' => '杉並区',
                    'city_slug' => 'tokyo_23_suginami-ward'
                ],
                [
                    'city_name' => '豊島区',
                    'city_slug' => 'tokyo_23_toshima-ward'
                ],
                [
                    'city_name' => '北区',
                    'city_slug' => 'aichi_nagoya_kita-ward'
                ],
                [
                    'city_name' => '荒川区',
                    'city_slug' => 'tokyo_23_arakawa-ward'
                ],
                [
                    'city_name' => '板橋区',
                    'city_slug' => 'tokyo_23_itabashi-ward'
                ],
                [
                    'city_name' => '練馬区',
                    'city_slug' => 'tokyo_23_nerima-ward'
                ],
                [
                    'city_name' => '足立区',
                    'city_slug' => 'tokyo_23_adachi-ward'
                ],
                [
                    'city_name' => '葛飾区',
                    'city_slug' => 'tokyo_23_katsushika-ward'
                ],
                [
                    'city_name' => '江戸川区',
                    'city_slug' => 'tokyo_23_edogawa-ward'
                ],
                [
                    'city_name' => '立川市',
                    'city_slug' => 'tokyo_other_tachikawa-city'
                ],
                [
                    'city_name' => '武蔵野市',
                    'city_slug' => 'tokyo_other_musashino-city'
                ],
                [
                    'city_name' => '三鷹市',
                    'city_slug' => 'tokyo_other_mitaka-city'
                ],
                [
                    'city_name' => '青梅市',
                    'city_slug' => 'tokyo_other_oume-city'
                ],
                [
                    'city_name' => '府中市',
                    'city_slug' => 'tokyo_other_fuchu-city'
                ],
                [
                    'city_name' => '昭島市',
                    'city_slug' => 'tokyo_other_akishima-city'
                ],
                [
                    'city_name' => '調布市',
                    'city_slug' => 'tokyo_other_chofu-city'
                ],
                [
                    'city_name' => '町田市',
                    'city_slug' => 'tokyo_other_machida-city'
                ],
                [
                    'city_name' => '小金井市',
                    'city_slug' => 'tokyo_other_koganei-city'
                ],
                [
                    'city_name' => '小平市',
                    'city_slug' => 'tokyo_other_kodaira-city'
                ],
                [
                    'city_name' => '日野市',
                    'city_slug' => 'tokyo_other_hino-city'
                ],
                [
                    'city_name' => '東村山市',
                    'city_slug' => 'tokyo_other_higashimurayama-city'
                ],
                [
                    'city_name' => '国分寺市',
                    'city_slug' => 'tokyo_other_kokubunji-city'
                ],
                [
                    'city_name' => '国立市',
                    'city_slug' => 'tokyo_other_kunitachi-city'
                ],
                [
                    'city_name' => '福生市',
                    'city_slug' => 'tokyo_other_fussa-city'
                ],
                [
                    'city_name' => '狛江市',
                    'city_slug' => 'tokyo_other_komae-city'
                ],
                [
                    'city_name' => '東大和市',
                    'city_slug' => 'tokyo_other_higashiyamato-city'
                ],
                [
                    'city_name' => '清瀬市',
                    'city_slug' => 'tokyo_other_kiyose-city'
                ],
                [
                    'city_name' => '東久留米市',
                    'city_slug' => 'tokyo_other_higashikurume-city'
                ],
                [
                    'city_name' => '武蔵村山市',
                    'city_slug' => 'tokyo_other_musashimurayama-city'
                ],
                [
                    'city_name' => '多摩市',
                    'city_slug' => 'tokyo_other_tama-city'
                ],
                [
                    'city_name' => '稲城市',
                    'city_slug' => 'tokyo_other_inagi-city'
                ],
                [
                    'city_name' => '羽村市',
                    'city_slug' => 'tokyo_other_hamura-city'
                ],
                [
                    'city_name' => 'あきる野市',
                    'city_slug' => 'tokyo_other_okiruno-city'
                ],
                [
                    'city_name' => '西東京市',
                    'city_slug' => 'tokyo_other_nishitokyo-city'
                ],
                [
                    'city_name' => '西多摩郡瑞穂町',
                    'city_slug' => 'tokyo_other_nishitama-country_mizuho-town'
                ],
                [
                    'city_name' => '西多摩郡日の出町',
                    'city_slug' => 'tokyo_other_nishitama-country_hinode-town'
                ],
                [
                    'city_name' => '鶴見区',
                    'city_slug' => 'osaka_osaka_tsurumi-ward'
                ],
                [
                    'city_name' => '神奈川区',
                    'city_slug' => 'kanagawa_yokohama_kanagawa-ward'
                ],
                [
                    'city_name' => '西区',
                    'city_slug' => 'aichi_nagoya_nishi-ward'
                ],
                [
                    'city_name' => '中区',
                    'city_slug' => 'aichi_nagoya_naka-ward'
                ],
                [
                    'city_name' => '南区',
                    'city_slug' => 'aichi_nagoya_minami-ward'
                ],
                [
                    'city_name' => '保土ケ谷区',
                    'city_slug' => 'kanagawa_yokohama_hodogaya-ward'
                ],
                [
                    'city_name' => '磯子区',
                    'city_slug' => 'kanagawa_yokohama_isogo-ward'
                ],
                [
                    'city_name' => '金沢区',
                    'city_slug' => 'kanagawa_yokohama_kanazawa-ward'
                ],
                [
                    'city_name' => '港北区',
                    'city_slug' => 'kanagawa_yokohama_kohoku-ward'
                ],
                [
                    'city_name' => '戸塚区',
                    'city_slug' => 'kanagawa_yokohama_totsuka-ward'
                ],
                [
                    'city_name' => '港南区',
                    'city_slug' => 'kanagawa_yokohama_konan-ward'
                ],
                [
                    'city_name' => '旭区',
                    'city_slug' => 'osaka_osaka_asahi-ward'
                ],
                [
                    'city_name' => '緑区',
                    'city_slug' => 'aichi_nagoya_midori-ward'
                ],
                [
                    'city_name' => '瀬谷区',
                    'city_slug' => 'kanagawa_yokohama_seya-ward'
                ],
                [
                    'city_name' => '栄区',
                    'city_slug' => 'kanagawa_yokohama_sakae-ward'
                ],
                [
                    'city_name' => '泉区',
                    'city_slug' => 'kanagawa_yokohama_izumi-ward'
                ],
                [
                    'city_name' => '青葉区',
                    'city_slug' => 'kanagawa_yokohama_aoba-ward'
                ],
                [
                    'city_name' => '都筑区',
                    'city_slug' => 'kanagawa_yokohama_tsuduki-ward'
                ],
                [
                    'city_name' => '川崎区',
                    'city_slug' => 'kanagawa_kawasaki_kawasaki-ward'
                ],
                [
                    'city_name' => '幸区',
                    'city_slug' => 'kanagawa_kawasaki_saiwai-ward'
                ],
                [
                    'city_name' => '中原区',
                    'city_slug' => 'kanagawa_kawasaki_nakahara-ward'
                ],
                [
                    'city_name' => '高津区',
                    'city_slug' => 'kanagawa_kawasaki_takatsu-ward'
                ],
                [
                    'city_name' => '宮前区',
                    'city_slug' => 'kanagawa_kawasaki_miyamae-ward'
                ],
                [
                    'city_name' => '多摩区',
                    'city_slug' => 'kanagawa_kawasaki_tama-ward'
                ],
                [
                    'city_name' => '麻生区',
                    'city_slug' => 'kanagawa_kawasaki_asao-ward'
                ],
                [
                    'city_name' => '平塚市',
                    'city_slug' => 'kanagawa_other_hiratsuka-city'
                ],
                [
                    'city_name' => '鎌倉市',
                    'city_slug' => 'kanagawa_other_kamakura-city'
                ],
                [
                    'city_name' => '藤沢市',
                    'city_slug' => 'kanagawa_other_fujisawa-city'
                ],
                [
                    'city_name' => '茅ヶ崎市',
                    'city_slug' => 'kanagawa_other_chigasaki-city'
                ],
                [
                    'city_name' => '逗子市',
                    'city_slug' => 'kanagawa_other_zushi-city'
                ],
                [
                    'city_name' => '秦野市',
                    'city_slug' => 'kanagawa_other_hadano-city'
                ],
                [
                    'city_name' => '厚木市',
                    'city_slug' => 'kanagawa_other_atsugi-city'
                ],
                [
                    'city_name' => '大和市',
                    'city_slug' => 'kanagawa_other_yamato-city'
                ],
                [
                    'city_name' => '伊勢原市',
                    'city_slug' => 'kanagawa_other_isehara-city'
                ],
                [
                    'city_name' => '海老名市',
                    'city_slug' => 'kanagawa_other_ebina-city'
                ],
                [
                    'city_name' => '座間市',
                    'city_slug' => 'kanagawa_other_zama-city'
                ],
                [
                    'city_name' => '綾瀬市',
                    'city_slug' => 'kanagawa_other_ayase-city'
                ],
                [
                    'city_name' => '花見川区',
                    'city_slug' => 'chiba_chiba_hanamigawa-ward'
                ],
                [
                    'city_name' => '稲毛区',
                    'city_slug' => 'chiba_chiba_inage-ward'
                ],
                [
                    'city_name' => '若葉区',
                    'city_slug' => 'chiba_chiba_wakaba-ward'
                ],
                [
                    'city_name' => '美浜区',
                    'city_slug' => 'chiba_chiba_mihama-ward'
                ],
                [
                    'city_name' => '市川市',
                    'city_slug' => 'chiba_other_ichikawa-city'
                ],
                [
                    'city_name' => '船橋市',
                    'city_slug' => 'chiba_other_funabashi-city'
                ],
                [
                    'city_name' => '松戸市',
                    'city_slug' => 'chiba_other_matsudo-city'
                ],
                [
                    'city_name' => '野田市',
                    'city_slug' => 'chiba_other_noda-city'
                ],
                [
                    'city_name' => '習志野市',
                    'city_slug' => 'chiba_other_narashino-city'
                ],
                [
                    'city_name' => '柏市',
                    'city_slug' => 'chiba_other_kashiwa-city'
                ],
                [
                    'city_name' => '流山市',
                    'city_slug' => 'chiba_other_nagareyama-city'
                ],
                [
                    'city_name' => '我孫子市',
                    'city_slug' => 'chiba_other_abiko-city'
                ],
                [
                    'city_name' => '鎌ケ谷市',
                    'city_slug' => 'chiba_other_kamagaya-city'
                ],
                [
                    'city_name' => '浦安市',
                    'city_slug' => 'chiba_other_urayasu-city'
                ],
                [
                    'city_name' => '大宮区',
                    'city_slug' => 'saitama_saitama_omiya-ward'
                ],
                [
                    'city_name' => '見沼区',
                    'city_slug' => 'saitama_saitama_minuma-ward'
                ],
                [
                    'city_name' => '桜区',
                    'city_slug' => 'saitama_saitama_sakura-ward'
                ],
                [
                    'city_name' => '浦和区',
                    'city_slug' => 'saitama_saitama_urawa-ward'
                ],
                [
                    'city_name' => '岩槻区',
                    'city_slug' => 'saitama_saitama_iwatsuki-ward'
                ],
                [
                    'city_name' => '川越市',
                    'city_slug' => 'saitama_other_kawagoe-city'
                ],
                [
                    'city_name' => '川口市',
                    'city_slug' => 'saitama_other_kawaguchi-city'
                ],
                [
                    'city_name' => '所沢市',
                    'city_slug' => 'saitama_other_tokorozawa-city'
                ],
                [
                    'city_name' => '春日部市',
                    'city_slug' => 'saitama_other_kasukabe-city'
                ],
                [
                    'city_name' => '狭山市',
                    'city_slug' => 'saitama_other_sayama-city'
                ],
                [
                    'city_name' => '上尾市',
                    'city_slug' => 'saitama_other_ageo-city'
                ],
                [
                    'city_name' => '草加市',
                    'city_slug' => 'saitama_other_soka-city'
                ],
                [
                    'city_name' => '越谷市',
                    'city_slug' => 'saitama_other_koshigaya-city'
                ],
                [
                    'city_name' => '蕨市',
                    'city_slug' => 'saitama_other_warabi-city'
                ],
                [
                    'city_name' => '戸田市',
                    'city_slug' => 'saitama_other_toda-city'
                ],
                [
                    'city_name' => '入間市',
                    'city_slug' => 'saitama_other_iruma-city'
                ],
                [
                    'city_name' => '朝霞市',
                    'city_slug' => 'saitama_other_asaka-city'
                ],
                [
                    'city_name' => '志木市',
                    'city_slug' => 'saitama_other_siki-city'
                ],
                [
                    'city_name' => '和光市',
                    'city_slug' => 'saitama_other_wako-city'
                ],
                [
                    'city_name' => '新座市',
                    'city_slug' => 'saitama_other_niiza-city'
                ],
                [
                    'city_name' => '久喜市',
                    'city_slug' => 'saitama_other_kuki-city'
                ],
                [
                    'city_name' => '北本市',
                    'city_slug' => 'saitama_other_kitamoto-city'
                ],
                [
                    'city_name' => '八潮市',
                    'city_slug' => 'saitama_other_yashio-city'
                ],
                [
                    'city_name' => '富士見市',
                    'city_slug' => 'saitama_other_fujimi-city'
                ],
                [
                    'city_name' => '三郷市',
                    'city_slug' => 'saitama_other_misato-city'
                ],
                [
                    'city_name' => '蓮田市',
                    'city_slug' => 'saitama_other_hasuda-city'
                ],
                [
                    'city_name' => '坂戸市',
                    'city_slug' => 'saitama_other_sakado-city'
                ],
                [
                    'city_name' => '鶴ヶ島市',
                    'city_slug' => 'saitama_other_tsurugashima-city'
                ],
                [
                    'city_name' => '吉川市',
                    'city_slug' => 'saitama_other_yoshikawa-city'
                ],
                [
                    'city_name' => 'ふじみ野市',
                    'city_slug' => 'saitama_other_fujimino-city'
                ],
                [
                    'city_name' => '福島区',
                    'city_slug' => 'osaka_osaka_fukushima-ward'
                ],
                [
                    'city_name' => '此花区',
                    'city_slug' => 'osaka_osaka_konohana-ward'
                ],
                [
                    'city_name' => '大正区',
                    'city_slug' => 'osaka_osaka_taisho-ward'
                ],
                [
                    'city_name' => '天王寺区',
                    'city_slug' => 'osaka_osaka_tennoji-ward'
                ],
                [
                    'city_name' => '浪速区',
                    'city_slug' => 'osaka_osaka_naniwa-ward'
                ],
                [
                    'city_name' => '西淀川区',
                    'city_slug' => 'osaka_osaka_nishiyodogawa-ward'
                ],
                [
                    'city_name' => '東淀川区',
                    'city_slug' => 'osaka_osaka_higashiyodogawa-ward'
                ],
                [
                    'city_name' => '東成区',
                    'city_slug' => 'osaka_osaka_higashinari-ward'
                ],
                [
                    'city_name' => '生野区',
                    'city_slug' => 'osaka_osaka_ikuno-ward'
                ],
                [
                    'city_name' => '城東区',
                    'city_slug' => 'osaka_osaka_joto-ward'
                ],
                [
                    'city_name' => '阿倍野区',
                    'city_slug' => 'osaka_osaka_abeno-ward'
                ],
                [
                    'city_name' => '住吉区',
                    'city_slug' => 'osaka_osaka_sumiyoshi-ward'
                ],
                [
                    'city_name' => '東住吉区',
                    'city_slug' => 'osaka_osaka_higashisumiyoshi-ward'
                ],
                [
                    'city_name' => '西成区',
                    'city_slug' => 'osaka_osaka_nishinari-ward'
                ],
                [
                    'city_name' => '淀川区',
                    'city_slug' => 'osaka_osaka_yodogawa-ward'
                ],
                [
                    'city_name' => '住之江区',
                    'city_slug' => 'osaka_osaka_suminoe-ward'
                ],
                [
                    'city_name' => '平野区',
                    'city_slug' => 'osaka_osaka_hirano-ward'
                ],
                [
                    'city_name' => '堺区',
                    'city_slug' => 'osaka_sakai_sakai-ward'
                ],
                [
                    'city_name' => '東区',
                    'city_slug' => 'aichi_nagoya_higashi-ward'
                ],
                [
                    'city_name' => '美原区',
                    'city_slug' => 'osaka_sakai_mihara-ward'
                ],
                [
                    'city_name' => '岸和田市',
                    'city_slug' => 'osaka_other_kishiwada-city'
                ],
                [
                    'city_name' => '豊中市',
                    'city_slug' => 'osaka_other_toyonaka-city'
                ],
                [
                    'city_name' => '池田市',
                    'city_slug' => 'osaka_other_ikeda-city'
                ],
                [
                    'city_name' => '吹田市',
                    'city_slug' => 'osaka_other_suita-city'
                ],
                [
                    'city_name' => '泉大津市',
                    'city_slug' => 'osaka_other_izumiotsu-city'
                ],
                [
                    'city_name' => '高槻市',
                    'city_slug' => 'osaka_other_takatsuki-city'
                ],
                [
                    'city_name' => '守口市',
                    'city_slug' => 'osaka_other_moriguchi-city'
                ],
                [
                    'city_name' => '枚方市',
                    'city_slug' => 'osaka_other_hirakata-city'
                ],
                [
                    'city_name' => '茨木市',
                    'city_slug' => 'osaka_other_ibaraki-city'
                ],
                [
                    'city_name' => '八尾市',
                    'city_slug' => 'osaka_other_yao-city'
                ],
                [
                    'city_name' => '富田林市',
                    'city_slug' => 'osaka_other_tondabayashi-city'
                ],
                [
                    'city_name' => '寝屋川市',
                    'city_slug' => 'osaka_other_neyagawa-city'
                ],
                [
                    'city_name' => '河内長野市',
                    'city_slug' => 'osaka_other_kawachinagano-city'
                ],
                [
                    'city_name' => '松原市',
                    'city_slug' => 'osaka_other_matsubara-city'
                ],
                [
                    'city_name' => '大東市',
                    'city_slug' => 'osaka_other_daito-city'
                ],
                [
                    'city_name' => '和泉市',
                    'city_slug' => 'osaka_other_izumi-city'
                ],
                [
                    'city_name' => '箕面市',
                    'city_slug' => 'osaka_other_minoh-city'
                ],
                [
                    'city_name' => '柏原市',
                    'city_slug' => 'osaka_other_kashiwara-city'
                ],
                [
                    'city_name' => '羽曳野市',
                    'city_slug' => 'osaka_other_habikino-city'
                ],
                [
                    'city_name' => '門真市',
                    'city_slug' => 'osaka_other_kadoma-city'
                ],
                [
                    'city_name' => '摂津市',
                    'city_slug' => 'osaka_other_settsu-city'
                ],
                [
                    'city_name' => '高石市',
                    'city_slug' => 'osaka_other_takaishi-city'
                ],
                [
                    'city_name' => '藤井寺市',
                    'city_slug' => 'osaka_other_fujiidera-city'
                ],
                [
                    'city_name' => '東大阪市',
                    'city_slug' => 'osaka_other_higashiosaka-city'
                ],
                [
                    'city_name' => '四條畷市',
                    'city_slug' => 'osaka_other_shijonawate-city'
                ],
                [
                    'city_name' => '交野市',
                    'city_slug' => 'osaka_other_katano-city'
                ],
                [
                    'city_name' => '大阪狭山市',
                    'city_slug' => 'osaka_other_osakasayama-city'
                ],
                [
                    'city_name' => '泉北郡忠岡町',
                    'city_slug' => 'osaka_other_senboku-country_tadaoka-town'
                ],
                [
                    'city_name' => '三島郡島本町',
                    'city_slug' => 'osaka_other_mishima-country_shimamoto-town'
                ],
                [
                    'city_name' => '東灘区',
                    'city_slug' => 'hyogo_kobe_higashinada-ward'
                ],
                [
                    'city_name' => '灘区',
                    'city_slug' => 'hyogo_kobe_nada-ward'
                ],
                [
                    'city_name' => '兵庫区',
                    'city_slug' => 'hyogo_kobe_hyogo-ward'
                ],
                [
                    'city_name' => '長田区',
                    'city_slug' => 'hyogo_kobe_nagata-ward'
                ],
                [
                    'city_name' => '須磨区',
                    'city_slug' => 'hyogo_kobe_suma-ward'
                ],
                [
                    'city_name' => '垂水区',
                    'city_slug' => 'hyogo_kobe_tarumi-ward'
                ],
                [
                    'city_name' => '尼崎市',
                    'city_slug' => 'hyogo_other_amagasaki-city'
                ],
                [
                    'city_name' => '明石市',
                    'city_slug' => 'hyogo_other_akashi-city'
                ],
                [
                    'city_name' => '西宮市',
                    'city_slug' => 'hyogo_other_nishinomiya-city'
                ],
                [
                    'city_name' => '芦屋市',
                    'city_slug' => 'hyogo_other_ashiya-city'
                ],
                [
                    'city_name' => '伊丹市',
                    'city_slug' => 'hyogo_other_itami-city'
                ],
                [
                    'city_name' => '宝塚市',
                    'city_slug' => 'hyogo_other_takaraduka-city'
                ],
                [
                    'city_name' => '川西市',
                    'city_slug' => 'hyogo_other_kawanishi-city'
                ],
                [
                    'city_name' => '三田市',
                    'city_slug' => 'hyogo_other_sanda-city'
                ],
                [
                    'city_name' => '加古川市',
                    'city_slug' => 'hyogo_other_kakogawa-city'
                ],
                [
                    'city_name' => '高砂市',
                    'city_slug' => 'hyogo_other_takasago-city'
                ],
                [
                    'city_name' => '姫路市',
                    'city_slug' => 'hyogo_other_himeji-city'
                ],
                [
                    'city_name' => '川辺郡猪名川町',
                    'city_slug' => 'hyogo_other_kawabe-country_inagawa-town'
                ],
                [
                    'city_name' => '上京区',
                    'city_slug' => 'kyoto_kyoto_kamigyo-ward'
                ],
                [
                    'city_name' => '左京区',
                    'city_slug' => 'kyoto_kyoto_sakyo-ward'
                ],
                [
                    'city_name' => '中京区',
                    'city_slug' => 'kyoto_kyoto_nakagyo-ward'
                ],
                [
                    'city_name' => '東山区',
                    'city_slug' => 'kyoto_kyoto_higashiyama-ward'
                ],
                [
                    'city_name' => '下京区',
                    'city_slug' => 'kyoto_kyoto_shimogyoku-ward'
                ],
                [
                    'city_name' => '右京区',
                    'city_slug' => 'kyoto_kyoto_ukyoku-ward'
                ],
                [
                    'city_name' => '伏見区',
                    'city_slug' => 'kyoto_kyoto_fushimi-ward'
                ],
                [
                    'city_name' => '山科区',
                    'city_slug' => 'kyoto_kyoto_yamashina-ward'
                ],
                [
                    'city_name' => '西京区',
                    'city_slug' => 'kyoto_kyoto_nishikyo-ward'
                ],
                [
                    'city_name' => '宇治市',
                    'city_slug' => 'kyoto_other_uji-city'
                ],
                [
                    'city_name' => '城陽市',
                    'city_slug' => 'kyoto_other_joyo-city'
                ],
                [
                    'city_name' => '向日市',
                    'city_slug' => 'kyoto_other_muko-city'
                ],
                [
                    'city_name' => '長岡京市',
                    'city_slug' => 'kyoto_other_nagaokakyo-city'
                ],
                [
                    'city_name' => '八幡市',
                    'city_slug' => 'kyoto_other_yawata-city'
                ],
                [
                    'city_name' => '京田辺市',
                    'city_slug' => 'kyoto_other_kyotanabe-city'
                ],
                [
                    'city_name' => '木津川市',
                    'city_slug' => 'kyoto_other_kidugawa-city'
                ],
                [
                    'city_name' => '乙訓郡大山崎町',
                    'city_slug' => 'kyoto_other_otokuni-country_oyamazaki-town'
                ],
                [
                    'city_name' => '久世郡久御山町',
                    'city_slug' => 'kyoto_other_kuse-country_kumiyama-town'
                ],
                [
                    'city_name' => '守山区',
                    'city_slug' => 'aichi_nagoya_moriyama-ward'
                ],
                [
                    'city_name' => '名東区',
                    'city_slug' => 'aichi_nagoya_meito-ward'
                ],
                [
                    'city_name' => '瑞穂区',
                    'city_slug' => 'aichi_nagoya_mizuho-ward'
                ],
                [
                    'city_name' => '中村区',
                    'city_slug' => 'aichi_nagoya_nakamura-ward'
                ],
                [
                    'city_name' => '中川区',
                    'city_slug' => 'aichi_nagoya_nakagawa-ward'
                ],
                [
                    'city_name' => '天白区',
                    'city_slug' => 'aichi_nagoya_tenpaku-ward'
                ],
                [
                    'city_name' => '昭和区',
                    'city_slug' => 'aichi_nagoya_showa-ward'
                ],
                [
                    'city_name' => '熱田区',
                    'city_slug' => 'aichi_nagoya_atsuta-ward'
                ],
                [
                    'city_name' => '豊橋市',
                    'city_slug' => 'aichi_other_toyohashi-city'
                ],
                [
                    'city_name' => '岡崎市',
                    'city_slug' => 'aichi_other_okazaki-city'
                ],
                [
                    'city_name' => '一宮市',
                    'city_slug' => 'aichi_other_ichinomiya-city'
                ],
                [
                    'city_name' => '瀬戸市',
                    'city_slug' => 'aichi_other_seto-city'
                ],
                [
                    'city_name' => '半田市',
                    'city_slug' => 'aichi_other_handa-city'
                ],
                [
                    'city_name' => '春日井市',
                    'city_slug' => 'aichi_other_kasugai-city'
                ],
                [
                    'city_name' => '津島市',
                    'city_slug' => 'aichi_other_tsushima-city'
                ],
                [
                    'city_name' => '刈谷市',
                    'city_slug' => 'aichi_other_kariya-city'
                ],
                [
                    'city_name' => '豊田市',
                    'city_slug' => 'aichi_other_toyota-city'
                ],
                [
                    'city_name' => '安城市',
                    'city_slug' => 'aichi_other_anjo-city'
                ],
                [
                    'city_name' => '蒲郡市',
                    'city_slug' => 'aichi_other_gamagori-city'
                ],
                [
                    'city_name' => '犬山市',
                    'city_slug' => 'aichi_other_inuyama-city'
                ],
                [
                    'city_name' => '江南市',
                    'city_slug' => 'aichi_other_konan-city'
                ],
                [
                    'city_name' => '小牧市',
                    'city_slug' => 'aichi_other_komaki-city'
                ],
                [
                    'city_name' => '稲沢市',
                    'city_slug' => 'aichi_other_inazawa-city'
                ],
                [
                    'city_name' => '東海市',
                    'city_slug' => 'aichi_other_tokai-city'
                ],
                [
                    'city_name' => '大府市',
                    'city_slug' => 'aichi_other_obu-city'
                ],
                [
                    'city_name' => '知多市',
                    'city_slug' => 'aichi_other_chita-city'
                ],
                [
                    'city_name' => '知立市',
                    'city_slug' => 'aichi_other_chiryu-city'
                ],
                [
                    'city_name' => '尾張旭市',
                    'city_slug' => 'aichi_other_owariasahi-city'
                ],
                [
                    'city_name' => '高浜市',
                    'city_slug' => 'aichi_other_takahama-city'
                ],
                [
                    'city_name' => '岩倉市',
                    'city_slug' => 'aichi_other_iwakura-city'
                ],
                [
                    'city_name' => '豊明市',
                    'city_slug' => 'aichi_other_toyoake-city'
                ],
                [
                    'city_name' => '日進市',
                    'city_slug' => 'aichi_other_nisshin-city'
                ],
                [
                    'city_name' => '愛西市',
                    'city_slug' => 'aichi_other_aisai-city'
                ],
                [
                    'city_name' => '清須市',
                    'city_slug' => 'aichi_other_kiyosu-city'
                ],
                [
                    'city_name' => '北名古屋市',
                    'city_slug' => 'aichi_other_kitanagoya-city'
                ],
                [
                    'city_name' => '弥富市',
                    'city_slug' => 'aichi_other_yatomi-city'
                ],
                [
                    'city_name' => 'あま市',
                    'city_slug' => 'aichi_other_ama-city'
                ],
                [
                    'city_name' => '長久手市',
                    'city_slug' => 'aichi_other_nagakute-city'
                ],
                [
                    'city_name' => '丹羽郡大口町',
                    'city_slug' => 'aichi_other_niwa-country_oguchi-town'
                ],
                [
                    'city_name' => '丹羽郡扶桑町',
                    'city_slug' => 'aichi_other_niwa-country_fuso-town'
                ],
                [
                    'city_name' => '海部郡蟹江町',
                    'city_slug' => 'aichi_other_ama-country_kanie-town'
                ],
                [
                    'city_name' => '下関市',
                    'city_slug' => 'yamaguchi_shimonoseki-city'
                ],
                [
                    'city_name' => '山口県内 - 他',
                    'city_slug' => 'yamaguchi_other'
                ],
                [
                    'city_name' => '岡山市',
                    'city_slug' => 'okayama_okayama-city'
                ],
                [
                    'city_name' => '岡山県内 - 他',
                    'city_slug' => 'okayama_other'
                ],
                [
                    'city_name' => '松江市',
                    'city_slug' => 'shimane_matsue-city'
                ],
                [
                    'city_name' => '島根県内 - 他',
                    'city_slug' => 'shimane_other'
                ],
                [
                    'city_name' => '広島市',
                    'city_slug' => 'hiroshima_hiroshima-city'
                ],
                [
                    'city_name' => '広島県内 - 他',
                    'city_slug' => 'hiroshima_other'
                ],
                [
                    'city_name' => '鳥取市',
                    'city_slug' => 'tottori_tottori-city'
                ],
                [
                    'city_name' => '鳥取県内 - 他',
                    'city_slug' => 'tottori_other'
                ],
                [
                    'city_name' => '新潟市',
                    'city_slug' => 'niigata_niigata-city'
                ],
                [
                    'city_name' => '新潟県内 - 他',
                    'city_slug' => 'niigata_other'
                ],
                [
                    'city_name' => '金沢市',
                    'city_slug' => 'ishikawa_kanazawa-city'
                ],
                [
                    'city_name' => '石川県内 - 他',
                    'city_slug' => 'ishikawa_other'
                ],
                [
                    'city_name' => '福井市',
                    'city_slug' => 'fukui_fukui-city'
                ],
                [
                    'city_name' => '福井県内 - 他',
                    'city_slug' => 'fukui_other'
                ],
                [
                    'city_name' => '長野市',
                    'city_slug' => 'nagano_nagano-city'
                ],
                [
                    'city_name' => '長野県内 - 他',
                    'city_slug' => 'nagano_other'
                ],
                [
                    'city_name' => '静岡市',
                    'city_slug' => 'shizuoka_shizuoka-city'
                ],
                [
                    'city_name' => '静岡県内 - 他',
                    'city_slug' => 'shizuoka_other'
                ],
                [
                    'city_name' => '佐賀市',
                    'city_slug' => 'saga_saga-city'
                ],
                [
                    'city_name' => '佐賀県内 - 他',
                    'city_slug' => 'saga_other'
                ],
                [
                    'city_name' => '大分市',
                    'city_slug' => 'oita_oita-city'
                ],
                [
                    'city_name' => '大分県内 - 他',
                    'city_slug' => 'oita_other'
                ],
                [
                    'city_name' => '宮崎市',
                    'city_slug' => 'miyazaki_miyazaki-city'
                ],
                [
                    'city_name' => '宮崎県内 - 他',
                    'city_slug' => 'miyazaki_other'
                ],
                [
                    'city_name' => '那覇市',
                    'city_slug' => 'okinawa_naha-city'
                ],
                [
                    'city_name' => '沖縄県内 - 他',
                    'city_slug' => 'okinawa_other'
                ],
                [
                    'city_name' => '熊本市',
                    'city_slug' => 'kumamoto_kumamoto-city'
                ],
                [
                    'city_name' => '熊本県内 - 他',
                    'city_slug' => 'kumamoto_other'
                ],
                [
                    'city_name' => '福岡市',
                    'city_slug' => 'fukuoka_fukuoka-city'
                ],
                [
                    'city_name' => '福岡県内 - 他',
                    'city_slug' => 'fukuoka_other'
                ],
                [
                    'city_name' => '長崎市',
                    'city_slug' => 'magasakinagasaki-city'
                ],
                [
                    'city_name' => '長崎県内 - 他',
                    'city_slug' => 'magasakiother'
                ],
                [
                    'city_name' => '鹿児島市',
                    'city_slug' => 'kagoshima_kagoshima-city'
                ],
                [
                    'city_name' => '鹿児島県内 - 他',
                    'city_slug' => 'kagoshima_other'
                ],
                [
                    'city_name' => '北海道内 - 他',
                    'city_slug' => 'hokkaido_other'
                ],
                [
                    'city_name' => '徳島市',
                    'city_slug' => 'tokushima_tokushima-city'
                ],
                [
                    'city_name' => '徳島県内 - 他',
                    'city_slug' => 'tokushima_other'
                ],
                [
                    'city_name' => '松山市',
                    'city_slug' => 'ehime_matsuyama-city'
                ],
                [
                    'city_name' => '愛媛県内 - 他',
                    'city_slug' => 'ehime_other'
                ],
                [
                    'city_name' => '高松市',
                    'city_slug' => 'kagawa_takamatsu-city'
                ],
                [
                    'city_name' => '香川県内 - 他',
                    'city_slug' => 'kagawa_other'
                ],
                [
                    'city_name' => '高知市',
                    'city_slug' => 'kochi_kochi-city'
                ],
                [
                    'city_name' => '高知県内 - 他',
                    'city_slug' => 'kochi_other'
                ],
                [
                    'city_name' => '仙台市',
                    'city_slug' => 'miyagi_sendai-city'
                ],
                [
                    'city_name' => '宮城県内 - 他',
                    'city_slug' => 'miyagi_other'
                ],
                [
                    'city_name' => '山形市',
                    'city_slug' => 'yamagata_yamagata-city'
                ],
                [
                    'city_name' => '山形県内 - 他',
                    'city_slug' => 'yamagata_other'
                ],
                [
                    'city_name' => '盛岡市',
                    'city_slug' => 'iwate_morioka-city'
                ],
                [
                    'city_name' => '岩手県内 - 他',
                    'city_slug' => 'iwate_other'
                ],
                [
                    'city_name' => '郡山市',
                    'city_slug' => 'fukushima_koriyama-city'
                ],
                [
                    'city_name' => '福島県内 - 他',
                    'city_slug' => 'fukushima_other'
                ],
                [
                    'city_name' => '秋田市',
                    'city_slug' => 'akita_akita-city'
                ],
                [
                    'city_name' => '秋田県内 - 他',
                    'city_slug' => 'akita_other'
                ],
                [
                    'city_name' => '青森市',
                    'city_slug' => 'aomori_aomori-city'
                ],
                [
                    'city_name' => '青森県内 - 他',
                    'city_slug' => 'aomori_other'
                ],
                [
                    'city_name' => '四日市市',
                    'city_slug' => 'mie_yokkaichi-city'
                ],
                [
                    'city_name' => '三重県内 - 他',
                    'city_slug' => 'mie_other'
                ],
                [
                    'city_name' => '和歌山市',
                    'city_slug' => 'wakayama_wakayama-city'
                ],
                [
                    'city_name' => '和歌山県内 - 他',
                    'city_slug' => 'wakayama_other'
                ],
                [
                    'city_name' => '奈良市',
                    'city_slug' => 'nara_nara-city'
                ],
                [
                    'city_name' => '奈良県内 - 他',
                    'city_slug' => 'nara_other'
                ],
                [
                    'city_name' => '大津市',
                    'city_slug' => 'shiga_otsu-city'
                ],
                [
                    'city_name' => '滋賀県内 - 他',
                    'city_slug' => 'shiga_other'
                ],
                [
                    'city_name' => '宇都宮市',
                    'city_slug' => 'tochigi_utsunomiya-city'
                ],
                [
                    'city_name' => '栃木県内 - 他',
                    'city_slug' => 'tochigi_other'
                ],
                [
                    'city_name' => '前橋市',
                    'city_slug' => 'gunma_maebashi-city'
                ],
                [
                    'city_name' => '群馬県内 - 他',
                    'city_slug' => 'gunma_other'
                ],
                [
                    'city_name' => '水戸市',
                    'city_slug' => 'ibaraki_mito-city'
                ],
                [
                    'city_name' => '茨城県内 - 他',
                    'city_slug' => 'ibaraki_other'
                ],
                [
                    'city_name' => '東京都内 - 他',
                    'city_slug' => 'tokyo_other_other'
                ],
                [
                    'city_name' => '神奈川県内 - 他',
                    'city_slug' => 'kanagawa_other_other'
                ],
                [
                    'city_name' => '千葉県内 - 他',
                    'city_slug' => 'chiba_other_other'
                ],
                [
                    'city_name' => '埼玉県内 - 他',
                    'city_slug' => 'saitama_other_other'
                ],
                [
                    'city_name' => '大阪府内 - 他',
                    'city_slug' => 'osaka_other_other'
                ],
                [
                    'city_name' => '兵庫県内 - 他',
                    'city_slug' => 'hyogo_other_other'
                ],
                [
                    'city_name' => '京都府内 - 他',
                    'city_slug' => 'kyoto_other_other'
                ],
                [
                    'city_name' => '愛知県内 - 他',
                    'city_slug' => 'aichi_other_other'
                ],
                [
                    'city_name' => '大和高田市',
                    'city_slug' => 'nara_yamatotakada-city'
                ],
                [
                    'city_name' => '大和郡山市',
                    'city_slug' => 'nara_yamatokoriyama-city'
                ],
                [
                    'city_name' => '橿原市',
                    'city_slug' => 'nara_kashihara-city'
                ],
                [
                    'city_name' => '生駒市',
                    'city_slug' => 'nara_ikoma-city'
                ],
                [
                    'city_name' => '香芝市',
                    'city_slug' => 'nara_kashiba-city'
                ],
                [
                    'city_name' => '生駒郡斑鳩町',
                    'city_slug' => 'nara_ikoma-country_ikaruga-town'
                ],
                [
                    'city_name' => '磯城郡田原本町',
                    'city_slug' => 'nara_shiki-country_tawaramoto-town'
                ],
                [
                    'city_name' => '北葛城郡王寺町',
                    'city_slug' => 'nara_kitakatsuragi-country_oji-town'
                ],
                [
                    'city_name' => '北葛城郡広陵町',
                    'city_slug' => 'nara_kitakatsuragi-country_koryo-town'
                ],
                [
                    'city_name' => '彦根市',
                    'city_slug' => 'shiga_hikone-city'
                ],
                [
                    'city_name' => '近江八幡市',
                    'city_slug' => 'shiga_omihachiman-city'
                ],
                [
                    'city_name' => '草津市',
                    'city_slug' => 'shiga_kusatsu-city'
                ],
                [
                    'city_name' => '守山市',
                    'city_slug' => 'shiga_moriyama-city'
                ],
                [
                    'city_name' => '栗東市',
                    'city_slug' => 'shiga_ritto-city'
                ],
                [
                    'city_name' => '野洲市',
                    'city_slug' => 'shiga_yasu-city'
                ],
                [
                    'city_name' => '東近江市',
                    'city_slug' => 'shiga_higashiomi-city'
                ],
                [
                    'city_name' => '米原市',
                    'city_slug' => 'shiga_maibara-city'
                ],
                [
                    'city_name' => '岐阜市',
                    'city_slug' => 'gifu_gifu-city'
                ],
                [
                    'city_name' => '大垣市',
                    'city_slug' => 'gifu_ogaki-city'
                ],
                [
                    'city_name' => '各務原市',
                    'city_slug' => 'gifu_kakamigahara-city'
                ],
                [
                    'city_name' => '多治見市',
                    'city_slug' => 'gifu_tajimi-city'
                ],
                [
                    'city_name' => '羽島市',
                    'city_slug' => 'gifu_hashima-city'
                ],
                [
                    'city_name' => '瑞穂市',
                    'city_slug' => 'gifu_mizuho-city'
                ],
                [
                    'city_name' => '羽島郡笠松町',
                    'city_slug' => 'gifu_hashima-country_kasamatsu-town'
                ],
                [
                    'city_name' => '羽島郡岐南町',
                    'city_slug' => 'gifu_hashima-country_ginan-town'
                ],
                [
                    'city_name' => '不破郡垂井町',
                    'city_slug' => 'gifu_fuwa-country_tarui-town'
                ],
                [
                    'city_name' => '岐阜県内 - 他',
                    'city_slug' => 'gifu_other'
                ],
                [
                    'city_name' => '津市',
                    'city_slug' => 'mie_tsu-city'
                ],
                [
                    'city_name' => '桑名市',
                    'city_slug' => 'mie_kuwana-city'
                ],
                [
                    'city_name' => '三重郡朝日町',
                    'city_slug' => 'mie_mie-country_asahi-town'
                ],
                [
                    'city_name' => '三重郡川越町',
                    'city_slug' => 'mie_mie-country_kawagoe-town'
                ],
                [
                    'city_name' => '中央区',
                    'city_slug' => 'tokyo_23_chuo-ward'
                ],
                [
                    'city_name' => '港区',
                    'city_slug' => 'tokyo_23_minato-ward'
                ],
                [
                    'city_name' => '北区',
                    'city_slug' => 'tokyo_23_kita-ward'
                ],
                [
                    'city_name' => '鶴見区',
                    'city_slug' => 'kanagawa_yokohama_tsurumi-ward'
                ],
                [
                    'city_name' => '西区',
                    'city_slug' => 'kanagawa_yokohama_nishi-ward'
                ],
                [
                    'city_name' => '中区',
                    'city_slug' => 'kanagawa_yokohama_naka-ward'
                ],
                [
                    'city_name' => '南区',
                    'city_slug' => 'kanagawa_yokohama_minami-ward'
                ],
                [
                    'city_name' => '旭区',
                    'city_slug' => 'kanagawa_yokohama_asahi-ward'
                ],
                [
                    'city_name' => '緑区',
                    'city_slug' => 'kanagawa_yokohama_midori-ward'
                ],
                [
                    'city_name' => '中央区',
                    'city_slug' => 'kanagawa_sagamihara_chuo-ward'
                ],
                [
                    'city_name' => '南区',
                    'city_slug' => 'kanagawa_sagamihara_minami-ward'
                ],
                [
                    'city_name' => '緑区',
                    'city_slug' => 'kanagawa_sagamihara_midori-ward'
                ],
                [
                    'city_name' => '中央区',
                    'city_slug' => 'chiba_chiba_chuo-ward'
                ],
                [
                    'city_name' => '緑区',
                    'city_slug' => 'chiba_chiba_midori-ward'
                ],
                [
                    'city_name' => '中央区',
                    'city_slug' => 'saitama_saitama_chuo-ward'
                ],
                [
                    'city_name' => '北区',
                    'city_slug' => 'saitama_saitama_kita-ward'
                ],
                [
                    'city_name' => '西区',
                    'city_slug' => 'saitama_saitama_nishi-ward'
                ],
                [
                    'city_name' => '南区',
                    'city_slug' => 'saitama_saitama_minami-ward'
                ],
                [
                    'city_name' => '緑区',
                    'city_slug' => 'saitama_saitama_midori-ward'
                ],
                [
                    'city_name' => '中央区',
                    'city_slug' => 'osaka_osaka_chuo-ward'
                ],
                [
                    'city_name' => '港区',
                    'city_slug' => 'osaka_osaka_minato-ward'
                ],
                [
                    'city_name' => '北区',
                    'city_slug' => 'osaka_osaka_kita-ward'
                ],
                [
                    'city_name' => '西区',
                    'city_slug' => 'osaka_osaka_nishi-ward'
                ],
                [
                    'city_name' => '北区',
                    'city_slug' => 'osaka_sakai_kita-ward'
                ],
                [
                    'city_name' => '西区',
                    'city_slug' => 'osaka_sakai_nishi-ward'
                ],
                [
                    'city_name' => '中区',
                    'city_slug' => 'osaka_sakai_naka-ward'
                ],
                [
                    'city_name' => '南区',
                    'city_slug' => 'osaka_sakai_minami-ward'
                ],
                [
                    'city_name' => '東区',
                    'city_slug' => 'osaka_sakai_higashi-ward'
                ],
                [
                    'city_name' => '北区',
                    'city_slug' => 'kyoto_kyoto_kita-ward'
                ],
                [
                    'city_name' => '南区',
                    'city_slug' => 'kyoto_kyoto_minami-ward'
                ],
                [
                    'city_name' => '北区',
                    'city_slug' => 'hyogo_kobe_kita-ward'
                ],
                [
                    'city_name' => '西区',
                    'city_slug' => 'hyogo_kobe_nishi-ward'
                ],
                [
                    'city_name' => '富山市',
                    'city_slug' => 'toyama_toyama-city'
                ],
                [
                    'city_name' => '富山県内 - 他',
                    'city_slug' => 'toyama_other'
                ],
                [
                    'city_name' => '甲府市',
                    'city_slug' => 'yamanashi_kofu-city'
                ],
                [
                    'city_name' => '山梨県内 - 他',
                    'city_slug' => 'yamanashi_other'
                ],
                [
                    'city_name' => '飯能市',
                    'city_slug' => 'tokyo_other_hanno-city'
                ],
                [
                    'city_name' => '八千代市',
                    'city_slug' => 'chiba_other_yachiyo-city'
                ],
                [
                    'city_name' => '四街道市',
                    'city_slug' => 'chiba_other_yotsukaido-city'
                ],
                [
                    'city_name' => '市原市',
                    'city_slug' => 'chiba_other_ichihara-city'
                ],
                [
                    'city_name' => '印西市',
                    'city_slug' => 'chiba_other_inzai-city'
                ],
                [
                    'city_name' => '成田市',
                    'city_slug' => 'chiba_other_narita-city'
                ],
                [
                    'city_name' => '佐倉市',
                    'city_slug' => 'chiba_other_sakura-city'
                ],
                [
                    'city_name' => '白井市',
                    'city_slug' => 'chiba_other_shiroi-city'
                ],
                [
                    'city_name' => '香取市',
                    'city_slug' => 'chiba_other_katori-city'
                ],
                [
                    'city_name' => '茂原市',
                    'city_slug' => 'chiba_other_mobara-city'
                ],
                [
                    'city_name' => '八街市',
                    'city_slug' => 'chiba_other_yachimata-city'
                ],
                [
                    'city_name' => '愛甲郡愛川町',
                    'city_slug' => 'kanagawa_other_aiko-country_aikawa-town'
                ],
                [
                    'city_name' => '足柄上郡開成町',
                    'city_slug' => 'kanagawa_other_ashigarakami-country_kaisei-town'
                ],
                [
                    'city_name' => '足柄上郡松田町',
                    'city_slug' => 'kanagawa_other_ashigarakami-country_matsuda-town'
                ],
                [
                    'city_name' => '足柄上郡中井町',
                    'city_slug' => 'kanagawa_other_ashigarakami-country_nakai-town'
                ],
                [
                    'city_name' => '南足柄市',
                    'city_slug' => 'kanagawa_other_minamiashigara-city'
                ],
                [
                    'city_name' => '三浦郡葉山町',
                    'city_slug' => 'kanagawa_other_miura-country_hayama-town'
                ],
                [
                    'city_name' => '中郡二宮町',
                    'city_slug' => 'kanagawa_other_naka-country_ninomiya-town'
                ],
                [
                    'city_name' => '中郡大磯町',
                    'city_slug' => 'kanagawa_other_naka-country_oiso-town'
                ],
                [
                    'city_name' => '小田原市',
                    'city_slug' => 'kanagawa_other_odawara-city'
                ],
                [
                    'city_name' => '横須賀市',
                    'city_slug' => 'kanagawa_other_yokosuka-city'
                ],
                [
                    'city_name' => '深谷市',
                    'city_slug' => 'saitama_other_fukaya-city'
                ],
                [
                    'city_name' => '行田市',
                    'city_slug' => 'saitama_other_gyoda-city'
                ],
                [
                    'city_name' => '日高市',
                    'city_slug' => 'saitama_other_hidaka-city'
                ],
                [
                    'city_name' => '東松山市',
                    'city_slug' => 'saitama_other_higashimatsuyama-city'
                ],
                [
                    'city_name' => '加須市',
                    'city_slug' => 'saitama_other_kazo-city'
                ],
                [
                    'city_name' => '北葛飾郡杉戸町',
                    'city_slug' => 'saitama_other_kitakatsushika-country_sugito-town'
                ],
                [
                    'city_name' => '鴻巣市',
                    'city_slug' => 'saitama_other_konosu-city'
                ],
                [
                    'city_name' => '熊谷市',
                    'city_slug' => 'saitama_other_kumagaya-city'
                ],
                [
                    'city_name' => '桶川市',
                    'city_slug' => 'saitama_other_okegawa-city'
                ],
                [
                    'city_name' => '幸手市',
                    'city_slug' => 'saitama_other_satte-city'
                ]
            ];

            echo 'Updating slug for cities...' . PHP_EOL;

            foreach ($benkyoCities as $benkyoCity) {
                $city = City::where('name', $benkyoCity['city_name'])->first();
                if ($city) {
                    $city->slug = $benkyoCity['city_slug'];
                    $city->is_display = true;
                    $city->save();
                }
            }

        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
}
