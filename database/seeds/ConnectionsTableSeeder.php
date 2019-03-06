<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ConnectionsTableSeeder extends Seeder
{
    public function run()
    {
        $buildTestStructure = env('BUILD_TEST_STRUCTURE');

        if(!$buildTestStructure)
            return;

        for ($seedCount = 0; $seedCount < 9; $seedCount++)
        {
            DB::table('connections')->insert([
                'name' => Str::random(10),
                'on' => true,
                'creation_time' => null,
                'ip' => '192.168.0' . rand(1, 9)
            ]);
        }
    }
}
