<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::factory()->count(10)->create();
        // DB::table('posts')->insert([
        //     'user_id' => 1,
        //     'zoo_id' => 1,
        //     'animal_family_id' => 1,
        //     'body' => 'This is a sample.',
        // ]);
        // DB::table('posts')->insert([
        //     'user_id' => 2,
        //     'zoo_id' => 2,
        //     'animal_family_id' => 2,
        //     'body' => 'This is a sample2.',
        // ]);
        // DB::table('posts')->insert([
        //     'user_id' => 3,
        //     'zoo_id' => 3,
        //     'animal_family_id' => 3,
        //     'body' => 'This is a sample3.',
        // ]);
        // DB::table('posts')->insert([
        //     'user_id' => 4,
        //     'zoo_id' => 4,
        //     'animal_family_id' =>4,
        //     'body' => 'This is a sample4.',
        // ]);
        // DB::table('posts')->insert([
        //     'user_id' => 5,
        //     'zoo_id' => 5,
        //     'animal_family_id' => 5,
        //     'body' => 'This is a sample5.',
        // ]);
    }
}
