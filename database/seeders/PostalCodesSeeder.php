<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostalCodesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('postal_codes')->insert([
            'city_id' => 1,
            'code' => 'H9W6G8'
        ]);
        
        DB::table('postal_codes')->insert([
            'city_id' => 1,
            'code' => 'H9J2B1'
        ]);

        DB::table('postal_codes')->insert([
            'city_id' => 2,
            'code' => 'H9S1A4'
        ]);

        DB::table('postal_codes')->insert([
            'city_id' => 3,
            'code' => 'H9R4O4'
        ]);

        DB::table('postal_codes')->insert([
            'city_id' => 3,
            'code' => 'H9R6D1'
        ]);

        DB::table('postal_codes')->insert([
            'city_id' => 4,
            'code' => 'G1J9P2'
        ]);

        DB::table('postal_codes')->insert([
            'city_id' => 4,
            'code' => 'G1K2T5'
        ]);

        DB::table('postal_codes')->insert([
            'city_id' => 4,
            'code' => 'G1T2H6'
        ]);

        DB::table('postal_codes')->insert([
            'city_id' => 5,
            'code' => 'C1A62W'
        ]);

        DB::table('postal_codes')->insert([
            'city_id' => 5,
            'code' => 'C1C7I0'
        ]);

        DB::table('postal_codes')->insert([
            'city_id' => 6,
            'code' => 'C1N6F0'
        ]);

        DB::table('postal_codes')->insert([
            'city_id' => 7,
            'code' => 'V8T2T3'
        ]);

        DB::table('postal_codes')->insert([
            'city_id' => 7,
            'code' => 'V8T8TV'
        ]);

        DB::table('postal_codes')->insert([
            'city_id' => 7,
            'code' => 'V8T1L0'
        ]);

        DB::table('postal_codes')->insert([
            'city_id' => 8,
            'code' => 'V8J4T7'
        ]);

        DB::table('postal_codes')->insert([
            'city_id' => 8,
            'code' => 'V8J5C9'
        ]);
    }
}
