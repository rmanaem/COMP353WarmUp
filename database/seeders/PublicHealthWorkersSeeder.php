<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PublicHealthWorkersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('public_health_workers')->insert([
            'person_id'=>1
        ]);
                    
        DB::table('public_health_workers')->insert([
            'person_id'=>3
        ]);
                    
        DB::table('public_health_workers')->insert([
            'person_id'=>2
        ]);
                    
        DB::table('public_health_workers')->insert([
            'person_id'=>19
        ]);
                    
        DB::table('public_health_workers')->insert([
            'person_id'=>11
        ]);
                    
        DB::table('public_health_workers')->insert([
            'person_id'=>12
        ]);
                    
        DB::table('public_health_workers')->insert([
            'person_id'=>18
        ]);
                    
        DB::table('public_health_workers')->insert([
            'person_id'=>27
        ]);
                    
        DB::table('public_health_workers')->insert([
            'person_id'=>26
        ]);
                    
        DB::table('public_health_workers')->insert([
            'person_id'=>31
        ]);
    }
}
