<?php

use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i <= 100; $i++) {
            \Illuminate\Support\Facades\DB::table('post')->insert([
                'post_title' => Str::random(10),
                'post_description' => Str::random(50),
                'post_content' => Str::random(500),
                'post_status' => 1,
                'category_id' => 1,
            ]);
        }
    }
}
