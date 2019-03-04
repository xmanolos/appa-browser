<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $buildTestStructure = env('BUILD_TEST_STRUCTURE');

        if(!$buildTestStructure)
            return;

        for ($seedCount = 0; $seedCount < 180; $seedCount++)
        {
            DB::table('users')->insert([
                'name' => Str::random(10),
                'email' => Str::random(10).'@gmail.com',
                'password' => bcrypt('secret'),
                'age' => rand(1, 99),
                'active' => true,
            ]);
        }
    }
}
