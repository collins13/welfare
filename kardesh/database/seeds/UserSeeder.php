<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'=>'Kardesh Bernea',
            'email'=>'kardesh@gmail.com',
            'password'=>bcrypt('123456')
        ]);
    }
}
