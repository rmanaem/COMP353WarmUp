<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MessageTemplatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('message_templates')->insert([
            'subject'=>'Important information regarding your PCR Test',
            'template'=>'{PersonName},<br>We regret to inform you that your PCR test taken at {PublicHealthCentreName} on {PCRTestDateOfTest} has returned positive for COVID-19. For the next 14 days, we ask that you fill out a daily symptom tracker on <a href="{url}">the PCR tracker website</a> at {url}. In the meantime, please read and observe the following recommendations:<br>{Recommendations}'
        ]);
        
        DB::table('message_templates')->insert([
            'subject'=>'Important information regarding your PCR Test',
            'template'=>'{PersonName}, We are pleased to inform you that your PCR test taken at {PublicHealthCentreName} on {PCRTestDateOfTest} has returned negative for COVID-19. Please remain vigilant of the pandemic, follow local guidelines, and return for a new test if you believe you have been exposed to the virus.'
        ]);

        DB::table('message_templates')->insert([
            'subject'=>'Important information regarding your health',
            'template'=>'{PersonName},<br>Recent testing indicates that you have been recently exposed to the COVID-19 virus. Please travel to a nearby hospital or clinic for a PCR test as soon as possible.'
        ]);

        DB::table('message_templates')->insert([
            'subject'=>'Your next symptom report must be filled',
            'template'=>'{PersonName},<br>Please navigate to <a href="{url}">the PCR tracker website</a> at {url} to fill out today\'s symptom tracker, and continue to observe the following recommendations. We suggest regular review of these recommendations as they are always subject to change.<br>{Recommendations}'
        ]);

        DB::table('message_templates')->insert([
            'subject'=>'Your region alert level has changed',
            'template'=>'{PersonName},<br>Please note that the alert level in {RegionName} has changed to level {AlertLevelID} ({AlertLevelName}) - {AlertLevelDescription}. Please consult local sources for details on new policies and recommendations.'
        ]);
    }
}
