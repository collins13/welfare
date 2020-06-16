<?php

use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
            'image1'=>'bg_7.jpg',
            'image2'=>'bg_7.jpg',
            'image3'=>'bg_7.jpg',
            'image4'=>'bg_7.jpg',
            'image5'=>'bg_7.jpg',
            'image6'=>'bg_7.jpg',
            'image7'=>'bg_7.jpg',
            'image8'=>'bg_7.jpg',
            'video'=>'bg_7.jpg'
        ]);
    }
}
