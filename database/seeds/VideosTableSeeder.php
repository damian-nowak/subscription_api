<?php

use Infrastructure\Videos\Video;
use Illuminate\Database\Seeder;

class VideosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $videos = factory(Video::class, 5)->create();
    }
}
