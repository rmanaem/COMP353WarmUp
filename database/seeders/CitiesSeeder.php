<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cities')->insert([
            'region_id' => 1,
            'name' => 'Montréal'
        ]);
        
        DB::table('cities')->insert([
            'region_id' => 1,
            'name' => 'Dorval'
        ]);

        DB::table('cities')->insert([
            'region_id' => 1,
            'name' => 'Pointe-Claire'
        ]);

        DB::table('cities')->insert([
            'region_id' => 2,
            'name' => 'Québec City'
        ]);
        
        DB::table('cities')->insert([
            'region_id' => 3,
            'name' => 'Charlottetown'
        ]);

        DB::table('cities')->insert([
            'region_id' => 3,
            'name' => 'Summerside'
        ]);

        DB::table('cities')->insert([
            'region_id' => 4,
            'name' => 'Victoria'
        ]);

        DB::table('cities')->insert([
            'region_id' => 4,
            'name' => 'Fort Rupert'
        ]);
    }
}
