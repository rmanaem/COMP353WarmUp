<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AlertLevelsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('alert_levels')->insert([       
            'name'=>'Green',
            'description'=>'Vigilance, basic measures'
        ]);
                    
        DB::table('alert_levels')->insert([       
            'name'=>'Yellow',
            'description'=>'Early warning, strengthened basic measures'
        ]);
                    
        DB::table('alert_levels')->insert([       
            'name'=>'Orange',
            'description'=>'Moderate alert, intermediate measures'
        ]);
                    
        DB::table('alert_levels')->insert([       
            'name'=>'Red',
            'description'=>'Maximum alert, maximum measures'
        ]);
    }
}
