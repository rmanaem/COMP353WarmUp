<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ParentagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('parentages')->insert([
            'parent_id' => 4,
            'child_id' => 6
        ]);

        DB::table('parentages')->insert([
            'parent_id'=>4,
            'child_id'=>7
        ]);
                        
        DB::table('parentages')->insert([
            'parent_id'=>4,
            'child_id'=>8
        ]);
                        
        DB::table('parentages')->insert([
            'parent_id'=>5,
            'child_id'=>6
        ]);
                        
        DB::table('parentages')->insert([
            'parent_id'=>5,
            'child_id'=>7
        ]);
                        
        DB::table('parentages')->insert([
            'parent_id'=>5,
            'child_id'=>8
        ]);
                        
        DB::table('parentages')->insert([
            'parent_id'=>31,
            'child_id'=>30
        ]);
                        
        DB::table('parentages')->insert([
            'parent_id'=>31,
            'child_id'=>28
        ]);
                        
        DB::table('parentages')->insert([
            'parent_id'=>28,
            'child_id'=>27
        ]);
                        
        DB::table('parentages')->insert([
            'parent_id'=>29,
            'child_id'=>27
        ]);
    }
}
