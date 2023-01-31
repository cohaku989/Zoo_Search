<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Animal_orderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('animal_orders')->insert([
            [
                'id' => '1',
                'animal_class_id' => '1',
                'animal_order' => '有袋目',
            ],
            [
                'id' => '2',
                'animal_class_id' => '1',
                'animal_order' => '貧歯目',
            ],
            [
                'id' => '3',
                'animal_class_id' => '1',
                'animal_order' => '食虫目',
            ],
            [
                'id' => '4',
                'animal_class_id' => '1',
                'animal_order' => '翼手目',
            ],
            [
                'id' => '5',
                'animal_class_id' => '1',
                'animal_order' => '霊長目',
            ],
            [
                'id' => '6',
                'animal_class_id' => '1',
                'animal_order' => '食肉目',
            ],
            [
                'id' => '7',
                'animal_class_id' => '1',
                'animal_order' => 'クジラ目',
            ],
            [
                'id' => '8',
                'animal_class_id' => '1',
                'animal_order' => '長鼻目',
            ],
            [
                'id' => '9',
                'animal_class_id' => '1',
                'animal_order' => '奇蹄目',
            ],
            [
                'id' => '10',
                'animal_class_id' => '1',
                'animal_order' => ' 偶蹄目',
            ],
            [
                'id' => '11',
                'animal_class_id' => '1',
                'animal_order' => '齧歯目',
            ],
            [
                'id' => '12',
                'animal_class_id' => '1',
                'animal_order' => 'ウサギ目',
            ],
            [
                'id' => '13',
                'animal_class_id' => '2',
                'animal_order' => '古口蓋区',
            ],
            [
                'id' => '14',
                'animal_class_id' => '2',
                'animal_order' => 'キジカモ亜区',
            ],
            [
                'id' => '15',
                'animal_class_id' => '2',
                'animal_order' => 'ツル目',
            ],
            [
                'id' => '16',
                'animal_class_id' => '2',
                'animal_order' => 'チドリ目',
            ],
            [
                'id' => '17',
                'animal_class_id' => '2',
                'animal_order' => 'ツメバケイ目',
            ],
            [
                'id' => '18',
                'animal_class_id' => '2',
                'animal_order' => 'ハト・クレード',
            ],
            [
                'id' => '19',
                'animal_class_id' => '2',
                'animal_order' => 'ノガン・クレード',
            ],
            [
                'id' => '20',
                'animal_class_id' => '2',
                'animal_order' => 'ジャノメドリ・クレード',
            ],
            [
                'id' => '21',
                'animal_class_id' => '2',
                'animal_order' => 'ミランドルニテス上目',
            ],
            [
                'id' => '22',
                'animal_class_id' => '2',
                'animal_order' => 'アマツバメヨタカ上目',
            ],
            [
                'id' => '23',
                'animal_class_id' => '2',
                'animal_order' => '水鳥クレード',
            ],
            [
                'id' => '24',
                'animal_class_id' => '2',
                'animal_order' => '陸鳥クレード',
            ],
            [
                'id' => '25',
                'animal_class_id' => '3',
                'animal_order' => 'ムカシトカゲ目',
            ],
            [
                'id' => '26',
                'animal_class_id' => '3',
                'animal_order' => '有鱗目',
            ],
            [
                'id' => '27',
                'animal_class_id' => '3',
                'animal_order' => 'カメ目',
            ],
            [
                'id' => '28',
                'animal_class_id' => '3',
                'animal_order' => 'ワニ目',
            ],
            [
                'id' => '29',
                'animal_class_id' => '4',
                'animal_order' => '有尾目',
            ],
            [
                'id' => '30',
                'animal_class_id' => '4',
                'animal_order' => '無尾目',
            ],
            [
                'id' => '31',
                'animal_class_id' => '4',
                'animal_order' => '無足目',
            ],
            [
                'id' => '32',
                'animal_class_id' => '5',
                'animal_order' => 'トンボ目',
            ],
            [
                'id' => '33',
                'animal_class_id' => '5',
                'animal_order' => 'チョウ目',
            ],
            [
                'id' => '34',
                'animal_class_id' => '6',
                'animal_order' => 'スズキ目',
            ],
            [
                'id' => '35',
                'animal_class_id' => '6',
                'animal_order' => 'アンコウ目',
            ],
        ]);
    }
}
