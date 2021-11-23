<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PublicHealthCentresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('public_health_centres')->insert([
            'name'=>'Viau Public Health Center',
            'address'=>'1234 Av du Parc suite 206, Montréal, QC H2G 4H2',
            'phone_number'=>'5142341789',
            'website'=>'https://viaupublic.org/',
            'type'=>'h',
            'drive_through'=>TRUE,
            'appointment_type'=>0
        ]);
                    
        DB::table('public_health_centres')->insert([
            'name'=>'Montréal General Hospital',
            'address'=>'1650 Cedar Ave, Montreal, Montreal, QC H3G 1A4',
            'phone_number'=>'5149341934',
            'website'=>'https://muhc.ca/',
            'type'=>'h',
            'drive_through'=>TRUE,
            'appointment_type'=>2
        ]);
                    
        DB::table('public_health_centres')->insert([
            'name'=>'Temple of Qut',
            'address'=>'999 Temple Road, Waterdeep, BC C4T 9E3',
            'phone_number'=>'4385559999',
            'website'=>'https://inchqut.ca/',
            'type'=>'s',
            'drive_through'=>FALSE,
            'appointment_type'=>1
        ]);
                    
        DB::table('public_health_centres')->insert([
            'name'=>'Statcare Super Clinic',
            'address'=>'175 Av Stillview Suite 104, Pointe-Claire, QC H9R 4S3',
            'phone_number'=>'5146949282',
            'website'=>'https://statcare.ca/',
            'type'=>'c',
            'drive_through'=>FALSE,
            'appointment_type'=>1
        ]);
                    
        DB::table('public_health_centres')->insert([
            'name'=>'Lakeshore General Hospital',
            'address'=>'160 Av Stillview Suite 1297, Pointe-Claire, QC H9R 2Y2',
            'phone_number'=>'5146302225',
            'website'=>'https://lakeshore.ca/',
            'type'=>'h',
            'drive_through'=>FALSE,
            'appointment_type'=>2
        ]);
                    
        DB::table('public_health_centres')->insert([
            'name'=>'Vancouver General Hospital',
            'address'=>'Jim Pattison Pavilion, 899 W 12th Ave, Vancouver, BC V5Z 1M9',
            'phone_number'=>'6048754111',
            'website'=>'https://vancouvergeneralhospital.ca/',
            'type'=>'h',
            'drive_through'=>TRUE,
            'appointment_type'=>0
        ]);
                    
        DB::table('public_health_centres')->insert([
            'name'=>'Summit Hall',
            'address'=>'12 Dessarin Road, Sumber Hills, SK T5A 2H7',
            'phone_number'=>'5146949282',
            'website'=>'https://stormhammer.com/',
            'type'=>'s',
            'drive_through'=>FALSE,
            'appointment_type'=>0
        ]);
                    
        DB::table('public_health_centres')->insert([
            'name'=>'Manitoba Clinic',
            'address'=>'790 Sherbrook St, Winnipeg, MB R3A 1M3',
            'phone_number'=>'2047746541',
            'website'=>'https://manitobaclinicwinnipeg.ca/',
            'type'=>'c',
            'drive_through'=>TRUE,
            'appointment_type'=>2
        ]);
                    
        DB::table('public_health_centres')->insert([
            'name'=>'The Family Focus Medical Clinics',
            'address'=>'5991 Spring Garden Rd, Halifax, NS B3H 1Y4',
            'phone_number'=>'9024206060',
            'website'=>'https://halifaxprofessionalcenter.ca/',
            'type'=>'c',
            'drive_through'=>TRUE,
            'appointment_type'=>0
        ]);
                    
        DB::table('public_health_centres')->insert([
            'name'=>'Gander Medical Clinic/Iridium Holdings LTD',
            'address'=>'177 Elizabeth Dr, Gander, NL A1V 1H6',
            'phone_number'=>'7092567101',
            'website'=>'https://gandercanada.com/',
            'type'=>'c',
            'drive_through'=>TRUE,
            'appointment_type'=>1
        ]);
    }
}
