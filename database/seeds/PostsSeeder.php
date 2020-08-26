<?php

use Carbon\Carbon;
use App\Models\Post;
use Illuminate\Database\Seeder;

class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $now = Carbon::now();

        Post::insert([
            [
                'title'       => json_encode([ "uz"=>"O'zbekiston", "ru"=>"Узбекистан","en"=>"Uzbekistan"]),
                'detail' =>json_encode([ "uz"=>"O'zbekiston", "ru"=>"Узбекистан","en"=>"Uzbekistan"]),
                'description' =>json_encode([ "uz"=>"O'zbekiston", "ru"=>"Узбекистан","en"=>"Uzbekistan"]),
                'is_active'  => 1,
                'iso_code'   => 'uz',
                'created_at' => $now,
                'updated_at' => $now
            ]
        ]);
    }
}
