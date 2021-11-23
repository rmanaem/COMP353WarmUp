<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MessagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('messages')->insert([      
            'person_id'=>16,
            'text'=>'Steven Crowder, Please note that the alert level in Vancouver Island has changed to level 2 (Yellow) - Early warning, strengthened basic measures. Please consult local sources for details on new policies and recommendations.',
            'template_id'=>5,
            'message_read'=>TRUE,
            'date_time'=>'2021-01-26',
            'old_alert_id'=>1,
            'new_alert_id'=>2
        ]);
                    
        DB::table('messages')->insert([      
            'person_id'=>17,
            'text'=>'Sarah Miller, Please note that the alert level in Vancouver Island has changed to level 2 (Yellow) - Early warning, strengthened basic measures. Please consult local sources for details on new policies and recommendations.',
            'template_id'=>5,
            'message_read'=>TRUE,
            'date_time'=>'2021-01-26',
            'old_alert_id'=>1,
            'new_alert_id'=>2
        ]);
                    
        DB::table('messages')->insert([      
            'person_id'=>27,
            'text'=>'Eirelon Teakley, Please note that the alert level in Vancouver Island has changed to level 2 (Yellow) - Early warning, strengthened basic measures. Please consult local sources for details on new policies and recommendations.',
            'template_id'=>5,
            'message_read'=>FALSE,
            'date_time'=>'2021-01-26',
            'old_alert_id'=>1,
            'new_alert_id'=>2
        ]);
                    
        DB::table('messages')->insert([      
            'person_id'=>31,
            'text'=>'Jimmit Teakley, Please note that the alert level in Vancouver Island has changed to level 2 (Yellow) - Early warning, strengthened basic measures. Please consult local sources for details on new policies and recommendations.',
            'template_id'=>5,
            'message_read'=>FALSE,
            'date_time'=>'2021-01-26',
            'old_alert_id'=>1,
            'new_alert_id'=>2
        ]);
                    
        DB::table('messages')->insert([      
            'person_id'=>12,
            'text'=>'Donald Pacerino, Please note that the alert level in Vancouver Island has changed to level 2 (Yellow) - Early warning, strengthened basic measures. Please consult local sources for details on new policies and recommendations.',
            'template_id'=>5,
            'message_read'=>TRUE,
            'date_time'=>'2021-01-26',
            'old_alert_id'=>1,
            'new_alert_id'=>2
        ]);
                    
        DB::table('messages')->insert([      
            'person_id'=>13,
            'text'=>'Joe Wilson, Please note that the alert level in Vancouver Island has changed to level 2 (Yellow) - Early warning, strengthened basic measures. Please consult local sources for details on new policies and recommendations.',
            'template_id'=>5,
            'message_read'=>FALSE,
            'date_time'=>'2021-01-26',
            'old_alert_id'=>1,
            'new_alert_id'=>2
        ]); 
    }
}
