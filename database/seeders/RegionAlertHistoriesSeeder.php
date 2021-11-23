<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RegionAlertHistoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('region_alert_histories')->insert([
            'region_id'=>1,
            'alert_level_id'=>2,
            'end_date'=>'2020-02-13'
        ]);
                    
        DB::table('region_alert_histories')->insert([
            'region_id'=>2,
            'alert_level_id'=>2,
            'end_date'=>'2020-02-13'
        ]);
                    
        DB::table('region_alert_histories')->insert([
            'region_id'=>4,
            'alert_level_id'=>2,
            'end_date'=>'2020-02-13'
        ]);
                    
        DB::table('region_alert_histories')->insert([
            'region_id'=>1,
            'alert_level_id'=>3,
            'end_date'=>'2020-09-08'
        ]);
                    
        DB::table('region_alert_histories')->insert([
            'region_id'=>1,
            'alert_level_id'=>4,
            'end_date'=>'2020-11-23'
        ]);
                    
        DB::table('region_alert_histories')->insert([
            'region_id'=>2,
            'alert_level_id'=>3,
            'end_date'=>'2020-12-19'
        ]);
                    
        DB::table('region_alert_histories')->insert([
            'region_id'=>4,
            'alert_level_id'=>1,
            'end_date'=>'2021-01-26'
        ]);
                    
        DB::table('region_alert_histories')->insert([
            'region_id'=>2,
            'alert_level_id'=>2,
            'end_date'=>'2021-02-21'
        ]);
                    
        DB::table('region_alert_histories')->insert([
            'region_id'=>1,
            'alert_level_id'=>3,
            'end_date'=>null
        ]);
                    
        DB::table('region_alert_histories')->insert([
            'region_id'=>2,
            'alert_level_id'=>3,
            'end_date'=>null
        ]);
                    
        DB::table('region_alert_histories')->insert([
            'region_id'=>4,
            'alert_level_id'=>2,
            'end_date'=>null
        ]);
    }
}
