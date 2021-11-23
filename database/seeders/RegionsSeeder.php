<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RegionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('regions')->insert([
            'name' => 'Island of Montréal',
            'province' => 'QC'
        ]);

        DB::table('regions')->insert([
            'name' => 'Capitale-Nationale',
            'province' => 'QC'
        ]);

        DB::table('regions')->insert([
            'name' => 'Prince Edward Island',
            'province' => 'PE'
        ]);

        DB::table('regions')->insert([
            'name' => 'Vancouver Island',
            'province' => 'BC'
        ]);
    }
}
