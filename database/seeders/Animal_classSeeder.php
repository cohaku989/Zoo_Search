<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Animal_classSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('animal_classes')->insert([
            [
                'id' => '1',
                'animal_class' => '哺乳類',
            ],
            [
                'id' => '2',
                'animal_class' => '鳥類',
            ],
            [
                'id' => '3',
                'animal_class' => '爬虫類',
            ],
            [
                'id' => '4',
                'animal_class' => '両生類',
            ],
            [
                'id' => '5',
                'animal_class' => '昆虫類',
            ],
            [
                'id' => '6',
                'animal_class' => '魚類',
            ],
            [
                'id' => '7',
                'animal_class' => '水棲無脊椎動物',
            ],
        ]);
    }
}
