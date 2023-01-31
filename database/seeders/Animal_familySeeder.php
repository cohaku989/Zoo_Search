<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Animal_familySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('animal_families')->insert([
            [
                'id' => '1',
                'animal_order_id' => '1',
                'animal_family' => 'カンガルー科',
            ],
            [
                'id' => '2',
                'animal_order_id' => '1',
                'animal_family' => 'コアラ科',
            ],
            [
                'id' => '3',
                'animal_order_id' => '2',
                'animal_family' => 'アリクイ科',
            ],
            [
                'id' => '4',
                'animal_order_id' => '2',
                'animal_family' => 'アルマジロ科',
            ],
            [
                'id' => '5',
                'animal_order_id' => '3',
                'animal_family' => 'テンレック科',
            ],
            [
                'id' => '6',
                'animal_order_id' => '3',
                'animal_family' => 'ハリネズミ科',
            ],
            [
                'id' => '7',
                'animal_order_id' => '4',
                'animal_family' => 'オオコウモリ',
            ],
            [
                'id' => '8',
                'animal_order_id' => '5',
                'animal_family' => 'オマキザル科',
            ],
            [
                'id' => '9',
                'animal_order_id' => '5',
                'animal_family' => 'オナガザル科',
            ],
            [
                'id' => '10',
                'animal_order_id' => '6',
                'animal_family' => 'クマ科',
            ],
            [
                'id' => '11',
                'animal_order_id' => '6',
                'animal_family' => 'ネコ科',
            ],
            [
                'id' => '12',
                'animal_order_id' => '7',
                'animal_family' => 'マイルカ科',
            ],
            [
                'id' => '13',
                'animal_order_id' => '8',
                'animal_family' => 'ゾウ科',
            ],
            [
                'id' => '14',
                'animal_order_id' => '9',
                'animal_family' => 'ウマ科',
            ],
            [
                'id' => '15',
                'animal_order_id' => '9',
                'animal_family' => 'バク科',
            ],
            [
                'id' => '16',
                'animal_order_id' => '10',
                'animal_family' => 'シカ科',
            ],
            [
                'id' => '17',
                'animal_order_id' => '10',
                'animal_family' => 'キリン科',
            ],
            [
                'id' => '18',
                'animal_order_id' => '11',
                'animal_family' => 'カピバラ科',
            ],
            [
                'id' => '19',
                'animal_order_id' => '11',
                'animal_family' => 'チンチラ科',
            ],
            [
                'id' => '20',
                'animal_order_id' => '12',
                'animal_family' => 'ウサギ科',
            ],
            [
                'id' => '21',
                'animal_order_id' => '13',
                'animal_family' => 'ダチョウ科',
            ],
            [
                'id' => '22',
                'animal_order_id' => '13',
                'animal_family' => 'キーウィ科',
            ],
            [
                'id' => '23',
                'animal_order_id' => '14',
                'animal_family' => 'キジ科',
            ],
            [
                'id' => '24',
                'animal_order_id' => '14',
                'animal_family' => 'カモ科',
            ],
            [
                'id' => '25',
                'animal_order_id' => '15',
                'animal_family' => 'ツル科',
            ],
            [
                'id' => '26',
                'animal_order_id' => '15',
                'animal_family' => 'クイナ科',
            ],
            [
                'id' => '27',
                'animal_order_id' => '16',
                'animal_family' => 'チドリ科',
            ],
            [
                'id' => '28',
                'animal_order_id' => '16',
                'animal_family' => 'カモメ科',
            ],
            [
                'id' => '29',
                'animal_order_id' => '17',
                'animal_family' => 'ツメバケイ科',
            ],
            [
                'id' => '30',
                'animal_order_id' => '18',
                'animal_family' => 'ハト科',
            ],
            [
                'id' => '31',
                'animal_order_id' => '18',
                'animal_family' => 'クイナモドキ科',
            ],
            [
                'id' => '32',
                'animal_order_id' => '19',
                'animal_family' => 'エボシドリ科',
            ],
            [
                'id' => '33',
                'animal_order_id' => '19',
                'animal_family' => 'カッコウ科',
            ],
            [
                'id' => '34',
                'animal_order_id' => '20',
                'animal_family' => 'ネッタイチョウ科',
            ],
            [
                'id' => '35',
                'animal_order_id' => '20',
                'animal_family' => 'ジャノメドリ科',
            ],
            [
                'id' => '36',
                'animal_order_id' => '21',
                'animal_family' => 'カイツブリ科',
            ],
            [
                'id' => '37',
                'animal_order_id' => '21',
                'animal_family' => 'フラミンゴ科',
            ],
            [
                'id' => '38',
                'animal_order_id' => '22',
                'animal_family' => 'アマツバメ科',
            ],
            [
                'id' => '39',
                'animal_order_id' => '22',
                'animal_family' => 'ハチドリ科',
            ],
            [
                'id' => '40',
                'animal_order_id' => '23',
                'animal_family' => 'ペンギン科',
            ],
            [
                'id' => '41',
                'animal_order_id' => '23',
                'animal_family' => 'サギ科',
            ],
            [
                'id' => '42',
                'animal_order_id' => '24',
                'animal_family' => 'タカ科',
            ],
            [
                'id' => '43',
                'animal_order_id' => '24',
                'animal_family' => 'フクロウ科',
            ],
            [
                'id' => '44',
                'animal_order_id' => '25',
                'animal_family' => 'ムカシトカゲ科',
            ],
            [
                'id' => '45',
                'animal_order_id' => '26',
                'animal_family' => 'ヤモリ科',
            ],
            [
                'id' => '46',
                'animal_order_id' => '26',
                'animal_family' => 'ナミヘビ科',
            ],
            [
                'id' => '47',
                'animal_order_id' => '27',
                'animal_family' => 'ウミガメ科',
            ],
            [
                'id' => '48',
                'animal_order_id' => '27',
                'animal_family' => 'リクガメ科',
            ],
            [
                'id' => '49',
                'animal_order_id' => '28',
                'animal_family' => 'クロコダイル科',
            ],
            [
                'id' => '50',
                'animal_order_id' => '28',
                'animal_family' => 'アリゲーター科',
            ],
            [
                'id' => '51',
                'animal_order_id' => '29',
                'animal_family' => 'サンショウウオ科',
            ],
            [
                'id' => '52',
                'animal_order_id' => '29',
                'animal_family' => 'イモリ科',
            ],
            [
                'id' => '53',
                'animal_order_id' => '30',
                'animal_family' => 'アマガエル科',
            ],
            [
                'id' => '54',
                'animal_order_id' => '30',
                'animal_family' => 'アオガエル科',
            ],
            [
                'id' => '55',
                'animal_order_id' => '32',
                'animal_family' => 'オニヤンマ科',
            ],
            [
                'id' => '56',
                'animal_order_id' => '32',
                'animal_family' => 'イトトンボ科',
            ],
            [
                'id' => '57',
                'animal_order_id' => '33',
                'animal_family' => 'アゲハチョウ科',
            ],
            [
                'id' => '58',
                'animal_order_id' => '33',
                'animal_family' => 'シロチョウ科',
            ],
            [
                'id' => '59',
                'animal_order_id' => '34',
                'animal_family' => 'オニオコゼ科',
            ],
            [
                'id' => '60',
                'animal_order_id' => '34',
                'animal_family' => 'サバ科',
            ],
            [
                'id' => '61',
                'animal_order_id' => '35',
                'animal_family' => 'アンコウ科',
            ],
            [
                'id' => '62',
                'animal_order_id' => '35',
                'animal_family' => 'カエルアンコウ科',
            ],
            
        ]);
    }
}
