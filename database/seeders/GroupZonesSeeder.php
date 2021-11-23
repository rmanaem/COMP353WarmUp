<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GroupZonesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('group_zones')->insert([
            'name' => 'School_Concordia_University'
        ]);

        DB::table('group_zones')->insert([
            'name' => 'Workplace_Ubisoft'
        ]);

        DB::table('group_zones')->insert([
            'name' => 'Business_Golden_Golfers_Club'
        ]);

        DB::table('group_zones')->insert([
            'name' => 'Business_YMCA'
        ]);

        DB::table('group_zones')->insert([
            'name' => 'Household_Teakley'
        ]);

        DB::table('group_zones')->insert([
            'name' => 'Household_Parker'
        ]);

        DB::table('group_zones')->insert([
            'name' => 'Household_Macdonald'
        ]);

        DB::table('group_zones')->insert([
            'name' => 'Household_95RobertSt_Montreal'
        ]);

        DB::table('group_zones')->insert([
            'name' => 'Workplace_Stormbreakers'
        ]);

        DB::table('group_zones')->insert([
            'name' => 'Business_Delosars_Inn'
        ]);
    }
}
