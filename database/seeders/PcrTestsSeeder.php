<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PcrTestsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {        
        DB::table('pcr_tests')->insert([
            'date_of_test'=>'2021-1-10',
            'public_health_centre_id'=>1,
            'public_health_worker_id'=>2,
            'person_id'=>4,            
            'result'=>1,
            'date_of_result'=>'2021-1-15'
        ]);
                    
        DB::table('pcr_tests')->insert([
            'date_of_test'=>'2021-1-10',
            'public_health_centre_id'=>1,
            'public_health_worker_id'=>2,
            'person_id'=>5,
            'result'=>1,
            'date_of_result'=>'2021-1-15'
        ]);
                    
        DB::table('pcr_tests')->insert([
            'date_of_test'=>'2021-1-10',
            'public_health_centre_id'=>1,
            'public_health_worker_id'=>2,
            'person_id'=>7,
            'result'=>1,
            'date_of_result'=>'2021-1-15'
        ]);
                    
        DB::table('pcr_tests')->insert([
            'date_of_test'=>'2021-1-10',
            'public_health_centre_id'=>1,
            'public_health_worker_id'=>2,
            'person_id'=>8,
            'result'=>1,
            'date_of_result'=>'2021-1-15'
        ]);
                    
        DB::table('pcr_tests')->insert([
            'date_of_test'=>'2021-1-10',
            'public_health_centre_id'=>1,
            'public_health_worker_id'=>2,
            'person_id'=>9,
            'result'=>1,
            'date_of_result'=>'2021-1-15'
        ]);
                    
        DB::table('pcr_tests')->insert([
            'date_of_test'=>'2020-12-16',
            'public_health_centre_id'=>1,
            'public_health_worker_id'=>5,
            'person_id'=>20,
            'result'=>0,
            'date_of_result'=>'2021-1-10'
        ]);
                    
        DB::table('pcr_tests')->insert([
            'date_of_test'=>'2020-12-31',
            'public_health_centre_id'=>1,
            'public_health_worker_id'=>5,
            'person_id'=>21,
            'result'=>1,
            'date_of_result'=>'2021-1-10'
        ]);
                    
        DB::table('pcr_tests')->insert([
            'date_of_test'=>'2020-12-21',
            'public_health_centre_id'=>1,
            'public_health_worker_id'=>6,
            'person_id'=>22,
            'result'=>0,
            'date_of_result'=>'2021-1-10'
        ]);
                    
        DB::table('pcr_tests')->insert([
            'date_of_test'=>'2020-12-30',
            'public_health_centre_id'=>2,
            'public_health_worker_id'=>3,
            'person_id'=>23,
            'result'=>1,
            'date_of_result'=>'2021-1-10'
        ]);
                    
        DB::table('pcr_tests')->insert([
            'date_of_test'=>'2020-12-16',
            'public_health_centre_id'=>2,
            'public_health_worker_id'=>3,
            'person_id'=>24,
            'result'=>1,
            'date_of_result'=>'2021-1-10'
        ]);
                    
        DB::table('pcr_tests')->insert([
            'date_of_test'=>'2020-12-16',
            'public_health_centre_id'=>2,
            'public_health_worker_id'=>7,
            'person_id'=>25,
            'result'=>1,
            'date_of_result'=>'2021-1-10'
        ]);
                    
        DB::table('pcr_tests')->insert([
            'date_of_test'=>'2021-1-11',
            'public_health_centre_id'=>2,
            'public_health_worker_id'=>7,
            'person_id'=>20,
            'result'=>1,
            'date_of_result'=>'2021-1-15'
        ]);
                    
        DB::table('pcr_tests')->insert([
            'date_of_test'=>'2021-1-11',
            'public_health_centre_id'=>2,
            'public_health_worker_id'=>7,
            'person_id'=>21,
            'result'=>0,
            'date_of_result'=>'2021-1-16'
        ]);
                    
        DB::table('pcr_tests')->insert([
            'date_of_test'=>'2021-1-11',
            'public_health_centre_id'=>2,
            'public_health_worker_id'=>7,
            'person_id'=>22,
            'result'=>1,
            'date_of_result'=>'2021-1-17'
        ]);
                    
        DB::table('pcr_tests')->insert([
            'date_of_test'=>'2021-1-12',
            'public_health_centre_id'=>1,
            'public_health_worker_id'=>4,
            'person_id'=>23,
            'result'=>1,
            'date_of_result'=>'2021-1-19'
        ]);
                    
        DB::table('pcr_tests')->insert([
            'date_of_test'=>'2021-1-12',
            'public_health_centre_id'=>1,
            'public_health_worker_id'=>4,
            'person_id'=>24,
            'result'=>1,
            'date_of_result'=>'2021-1-30'
        ]);
                    
        DB::table('pcr_tests')->insert([
            'date_of_test'=>'2020-12-2',
            'public_health_centre_id'=>2,
            'public_health_worker_id'=>3,
            'person_id'=>13,
            'result'=>1,
            'date_of_result'=>'2021-1-10'
        ]);
                    
        DB::table('pcr_tests')->insert([
            'date_of_test'=>'2020-12-2',
            'public_health_centre_id'=>2,
            'public_health_worker_id'=>3,
            'person_id'=>14,
            'result'=>1,
            'date_of_result'=>'2021-1-10'
        ]);
                    
        DB::table('pcr_tests')->insert([
            'date_of_test'=>'2020-12-2',
            'public_health_centre_id'=>2,
            'public_health_worker_id'=>7,
            'person_id'=>15,
            'result'=>1,
            'date_of_result'=>'2021-1-10'
        ]);
                    
        DB::table('pcr_tests')->insert([
            'date_of_test'=>'2020-12-2',
            'public_health_centre_id'=>2,
            'public_health_worker_id'=>7,
            'person_id'=>16,
            'result'=>1,
            'date_of_result'=>'2021-1-10'
        ]);
                    
        DB::table('pcr_tests')->insert([
            'date_of_test'=>'2021-2-1',
            'public_health_centre_id'=>1,
            'public_health_worker_id'=>1,
            'person_id'=>24,
            'result'=>0,
            'date_of_result'=>'2021-2-7'
        ]);
                    
        DB::table('pcr_tests')->insert([
            'date_of_test'=>'2021-2-1',
            'public_health_centre_id'=>1,
            'public_health_worker_id'=>2,
            'person_id'=>20,
            'result'=>0,
            'date_of_result'=>'2021-2-7'
        ]);
    }
}
