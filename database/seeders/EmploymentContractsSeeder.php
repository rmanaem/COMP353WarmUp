<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmploymentContractsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employment_contracts')->insert([
            'public_health_worker_id'=>1,
            'public_health_centre_id'=>1,
            'start_date'=>'2014-04-20',
            'end_date'=>'2017-01-16',
            'schedule'=>'Monday-Friday, 9am-5pm'
        ]);
                    
        DB::table('employment_contracts')->insert([
            'public_health_worker_id'=>2,
            'public_health_centre_id'=>1,
            'start_date'=>'2014-09-11',
            'end_date'=>'2017-01-29',
            'schedule'=>'Monday-Friday 8am-8pm'
        ]);
                    
        DB::table('employment_contracts')->insert([
            'public_health_worker_id'=>2,
            'public_health_centre_id'=>4,
            'start_date'=>'2021-01-07',
            'end_date'=>'2021-12-31',
            'schedule'=>'Monday-Friday 8am-8pm'
        ]);
                    
        DB::table('employment_contracts')->insert([
            'public_health_worker_id'=>2,
            'public_health_centre_id'=>5,
            'start_date'=>'2021-12-31',
            'end_date'=>null,
            'schedule'=>'Monday-Friday 8am-5pm'
        ]);
                    
        DB::table('employment_contracts')->insert([
            'public_health_worker_id'=>3,
            'public_health_centre_id'=>2,
            'start_date'=>'2015-11-05',
            'end_date'=>'2020-01-06',
            'schedule'=>'Monday-Friday 7am-4pm'
        ]);
                    
        DB::table('employment_contracts')->insert([
            'public_health_worker_id'=>4,
            'public_health_centre_id'=>1,
            'start_date'=>'2017-05-14',
            'end_date'=>'2019-05-19',
            'schedule'=>'Monday-Friday 8am-10pm'
        ]);
                    
        DB::table('employment_contracts')->insert([
            'public_health_worker_id'=>5,
            'public_health_centre_id'=>1,
            'start_date'=>'2017-11-14',
            'end_date'=>'2020-02-06',
            'schedule'=>'Monday-Friday 4am-6pm'
        ]);
                    
        DB::table('employment_contracts')->insert([
            'public_health_worker_id'=>6,
            'public_health_centre_id'=>1,
            'start_date'=>'2020-04-24',
            'end_date'=>null,
            'schedule'=>'Monday-Friday 7am-5pm'
        ]);
                    
        DB::table('employment_contracts')->insert([
            'public_health_worker_id'=>7,
            'public_health_centre_id'=>2,
            'start_date'=>'2020-12-07',
            'end_date'=>null,
            'schedule'=>'Monday-Friday 7am-11pm'
        ]);
                    
        DB::table('employment_contracts')->insert([
            'public_health_worker_id'=>8,
            'public_health_centre_id'=>7,
            'start_date'=>'2010-05-06',
            'end_date'=>'2020-01-01',
            'schedule'=>'Monday-Wednesday 12pm-5pm'
        ]);
                    
        DB::table('employment_contracts')->insert([
            'public_health_worker_id'=>8,
            'public_health_centre_id'=>7,
            'start_date'=>'2020-01-16',
            'end_date'=>'2020-12-04',
            'schedule'=>'Monday-Wednesday 9am-12pm'
        ]);
                    
        DB::table('employment_contracts')->insert([
            'public_health_worker_id'=>9,
            'public_health_centre_id'=>3,
            'start_date'=>'2018-02-20',
            'end_date'=>null,
            'schedule'=>'Sunday-Thursday 4pm-12am'
        ]);
                    
        DB::table('employment_contracts')->insert([
            'public_health_worker_id'=>10,
            'public_health_centre_id'=>10,
            'start_date'=>'1956-02-05',
            'end_date'=>'1984-03-12',
            'schedule'=>'Saturday-Sunday 10am-6pm'
        ]);
    }
}
