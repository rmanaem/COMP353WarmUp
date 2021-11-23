<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RecommendationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('recommendations')->insert([            
            'text'=>'Do not go to school, work, a childcare center or any other public space.'
        ]);   
                    
        DB::table('recommendations')->insert([            
            'text'=>'Do not use public transport.'
        ]);   
                    
        DB::table('recommendations')->insert([            
            'text'=>'If the sick person lives alone and has no help to get essentials such as food or medication, use phone/online grocery and pharmacy home delivery services.'
        ]);   
                    
        DB::table('recommendations')->insert([            
            'text'=>'Do not receive visitors at home.'
        ]);   
                    
        DB::table('recommendations')->insert([            
            'text'=>'If the sick person lives with other people who are not infected by COVID-19:
        
            remain alone in one room of the house as often as possible and close to the door.
            eat and sleep alone in one room of the house.
            if possible, use a bathroom reserved for the sick person sole use. Otherwise, disinfect the bathroom after every use.
            avoid as much as possible contact with other people in the home. If this is impossible, wear a mask. If a mask is not available, stay at least two meters away from other people.
        
        '
        ]);   
                
        DB::table('recommendations')->insert([            
            'text'=>'Open a window to air out the sick person\'s room and home often \(weather permitting\).'
        ]);   
                    
        DB::table('recommendations')->insert([            
            'text'=>'Do not go to a medical clinic unless you have first obtained an appointment and have notified the clinic that you have COVID-19. If you need to go to the emergency room \(eg, if you have difficulty breathing\), contact 911 and tell the person that you are sick with COVID-19.'
        ]);   
                    
        DB::table('recommendations')->insert([            
            'text'=>'Wear a mask when someone is in the same room as you.'
        ]);   
                    
        DB::table('recommendations')->insert([            
            'text'=>'Wear a mask if you must leave your home to seek medical care, you must first notify the medical clinic \(or 911, if it is an emergency\) that you have COVID-19.'
        ]);   
                    
        DB::table('recommendations')->insert([            
            'text'=>'If you need to cough, sneeze, or blow your nose:
        
            If you have a disposable tissue use it to cough, sneeze or blow your nose then discard the tissue in the garbage, and then wash your hands with soap and water.
            If you do not have disposable tissues, cough, or sneeze in the crook of your arm.
        
        '
        ]);   
                
        DB::table('recommendations')->insert([            
            'text'=>'Wash your hands:
        
            Wash your hands often with soap under warm running water for at least 20 seconds.
            Use an alcohol- based hand rub if soap and water are not available.
            Wash your hands before eating and whenever your hands look dirty.
            After using the toilet, put the lid down before flushing and then wash your hands.
        
        '
        ]);   
                
        DB::table('recommendations')->insert([            
            'text'=>'Do not share plates, utensils, glasses, towels, bed sheets or clothes with others.'
        ]);   
                    
        DB::table('recommendations')->insert([            
            'text'=>'Watch your symptoms and take your temperature every day: 
        
            Take your temperature every day at the same hour.
            If you are taking medication for fever wait at least four hours before taking your temperature.
        
        '
        ]);   
                    
        DB::table('recommendations')->insert([            
            'text'=>'Directives in case of severe symptoms:
        
            If your symptoms worsen call 514-644-4545 or call your doctor.
            If you have difficulty breathing, or shortness of breath or chest pain call 911 and inform them you may be infected by COVID-19.
        
        '
        ]);   
                    
        DB::table('recommendations')->insert([            
            'text'=>'If someone close or caregiver helps you with your daily activities, then before helping you, the person must wash his/her hand, wear a mask and put-on disposable gloves. After helping you, the person must take off the gloves and put them in a garbage bin with a lid, wash his/her hands, take off the mask and put it in a garbage bin with a lid, and wash his/her hands again.'
        ]);   
                    
        DB::table('recommendations')->insert([            
            'text'=>'For help with psychosocial matters, contact 811.'
        ]);   
    }
}
