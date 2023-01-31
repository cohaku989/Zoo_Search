<?php

namespace Database\Seeders;

use App\Models\Zoo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ZooSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Zoo::factory()->count(50)->create();
    }
}
