<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PeopleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('people')->insert([
            'first_name'=>'John',
            'last_name'=>'Doe',
            'date_of_birth'=>'1990-10-10',
            'medicare_id'=>'1EG4TE6MK612',
            'phone_number'=>'5141232345',
            'address'=>'95 Robert St',
            'postal_code_id'=>3,
            'citizenship'=>'Canadian',
            'email_address'=>'johndoe@gmail.com'
        ]);              
            
        DB::table('people')->insert([
            'first_name'=>'Jane',
            'last_name'=>'Doe',
            'date_of_birth'=>'1988-1-12',
            'medicare_id'=>'1ES1TE6OK612',
            'phone_number'=>'5141121735',
            'address'=>'95 Robert St',
            'postal_code_id'=>3,
            'citizenship'=>'Canadian',
            'email_address'=>'janedoe@gmail.com'
        ]);           
            
        DB::table('people')->insert([
            'first_name'=>'Ali',
            'last_name'=>'Naseri',
            'date_of_birth'=>'1990-7-21',
            'medicare_id'=>'1FR4TG6MK611',
            'phone_number'=>'5141286234',
            'address'=>'35 Guy St',
            'postal_code_id'=>2,
            'citizenship'=>'Canadian',
            'email_address'=>'alinaser@yahoo.com'
        ]);      
            
        DB::table('people')->insert([
            'first_name'=>'Roger',
            'last_name'=>'Macdonald',
            'date_of_birth'=>'1960-9-01',
            'medicare_id'=>'1FR5TG6JU711',
            'phone_number'=>'5143764284',
            'address'=>'123 Monkland St',
            'postal_code_id'=>5,
            'citizenship'=>'Canadian',
            'email_address'=>'rogermac@gmail.com'
        ]);       
            
        DB::table('people')->insert([
            'first_name'=>'Lily',
            'last_name'=>'Smith',
            'date_of_birth'=>'1965-9-16',
            'medicare_id'=>'1HE5TG6JG712',
            'phone_number'=>'5142357284',
            'address'=>'123 Monkland St',
            'postal_code_id'=>5,
            'citizenship'=>'Canadian',
            'email_address'=>'lilysm@gmail.com'
        ]);        
            
        DB::table('people')->insert([
            'first_name'=>'Bill',
            'last_name'=>'Macdonald',
            'date_of_birth'=>'1997-2-06',
            'medicare_id'=>'1RY5TG8JU711',
            'phone_number'=>'5141764282',
            'address'=>'123 Monkland St',
            'postal_code_id'=>5,
            'citizenship'=>'Canadian',
            'email_address'=>'coolbilly@gmail.com'
        ]);
            
        DB::table('people')->insert([
            'first_name'=>'Nora',
            'last_name'=>'Macdonald',
            'date_of_birth'=>'1995-5-23',
            'medicare_id'=>'1RP5TH7JU712',
            'phone_number'=>'5143364584',
            'address'=>'123 Monkland St',
            'postal_code_id'=>5,
            'citizenship'=>'Canadian',
            'email_address'=>'noramd@gmail.com'
        ]);
            
        DB::table('people')->insert([
            'first_name'=>'Carl',
            'last_name'=>'Macdonald',
            'date_of_birth'=>'1990-8-17',
            'medicare_id'=>'1RY5TW8PT798',
            'phone_number'=>'5141376426',
            'address'=>'123 Monkland St',
            'postal_code_id'=>5,
            'citizenship'=>'Canadian',
            'email_address'=>'chadcarl@gmail.com'
        ]);
            
        DB::table('people')->insert([
            'first_name'=>'Alex',
            'last_name'=>'Jones',
            'date_of_birth'=>'1970-12-21',
            'medicare_id'=>'1FW4JG6RY711',
            'phone_number'=>'5141286423',
            'address'=>'361 Maisonneuve St',
            'postal_code_id'=>1,
            'citizenship'=>'Canadian',
            'email_address'=>'alexjones@hotmail.com'
        ]);
            
        DB::table('people')->insert([
            'first_name'=>'Lang',
            'last_name'=>'Buddha',
            'date_of_birth'=>'1968-9-14',
            'medicare_id'=>'1TS4XW7RY715',
            'phone_number'=>'5141281234',
            'address'=>'1012 Saint-Catherine St',
            'postal_code_id'=>1,
            'citizenship'=>'Canadian',
            'email_address'=>'buddhalang@gmail.com'
        ]);
            
        DB::table('people')->insert([
            'first_name'=>'Anthony',
            'last_name'=>'Zipa',
            'date_of_birth'=>'1972-10-18',
            'medicare_id'=>'1UG7XW7RY853',
            'phone_number'=>'5147819434',
            'address'=>'421 Mackay St',
            'postal_code_id'=>1,
            'citizenship'=>'Canadian',
            'email_address'=>'tonyz@gmail.com'
        ]);
            
        DB::table('people')->insert([
            'first_name'=>'Donald',
            'last_name'=>'Pacerino',
            'date_of_birth'=>'1973-11-28',
            'medicare_id'=>'1UG6IT9RP876',
            'phone_number'=>'5146201438',
            'address'=>'234 Bishop St',
            'postal_code_id'=>16,
            'citizenship'=>'Canadian',
            'email_address'=>'donpec@gmail.com'
        ]);
            
        DB::table('people')->insert([
            'first_name'=>'Joe',
            'last_name'=>'Wilson',
            'date_of_birth'=>'2012-4-19',
            'medicare_id'=>'4UG7WV1JS736',
            'phone_number'=>'5143469734',
            'address'=>'1234 Bishop St',
            'postal_code_id'=>16,
            'citizenship'=>'Canadian',
            'email_address'=>'jwilson@gmail.com'
        ]);
            
        DB::table('people')->insert([
            'first_name'=>'Alison',
            'last_name'=>'Parker',
            'date_of_birth'=>'2012-6-09',
            'medicare_id'=>'1UH7RV2JO784',
            'phone_number'=>'5143389733',
            'address'=>'24 Monkland St',
            'postal_code_id'=>5,
            'citizenship'=>'Canadian',
            'email_address'=>'alipark@gmail.com'
        ]);
            
        DB::table('people')->insert([
            'first_name'=>'Peter',
            'last_name'=>'Parker',
            'date_of_birth'=>'2012-6-09',
            'medicare_id'=>'5UH7RV2JO785',
            'phone_number'=>'5143763135',
            'address'=>'24 Monkland St',
            'postal_code_id'=>5,
            'citizenship'=>'Canadian',
            'email_address'=>'ppeter@gmail.com'
        ]);
            
        DB::table('people')->insert([
            'first_name'=>'Steven',
            'last_name'=>'Crowder',
            'date_of_birth'=>'2012-4-13',
            'medicare_id'=>'3GT3RV2IY869',
            'phone_number'=>'5142138753',
            'address'=>'24 Guy St',
            'postal_code_id'=>12,
            'citizenship'=>'Canadian',
            'email_address'=>'crowdsteve@gmail.com'
        ]);
            
        DB::table('people')->insert([
            'first_name'=>'Sarah',
            'last_name'=>'Miller',
            'date_of_birth'=>'2012-10-22',
            'medicare_id'=>'2UG6XC1BW380',
            'phone_number'=>'5143084283',
            'address'=>'42 Guy St',
            'postal_code_id'=>12,
            'citizenship'=>'Canadian',
            'email_address'=>'msarah@yahoo.com'
        ]);
            
        DB::table('people')->insert([
            'first_name'=>'Austin',
            'last_name'=>'Piker',
            'date_of_birth'=>'1980-7-11',
            'medicare_id'=>'8OP4TG6MK685',
            'phone_number'=>'5141283788',
            'address'=>'95 Robert St',
            'postal_code_id'=>8,
            'citizenship'=>'Canadian',
            'email_address'=>'auspik@yahoo.com'
        ]);
            
        DB::table('people')->insert([
            'first_name'=>'Matilda',
            'last_name'=>'Pearson',
            'date_of_birth'=>'1993-6-15',
            'medicare_id'=>'8PV4TR8MK923',
            'phone_number'=>'5141343654',
            'address'=>'95 Robert St',
            'postal_code_id'=>8,
            'citizenship'=>'Canadian',
            'email_address'=>'matilpears@yahoo.com'
        ]);
            
        DB::table('people')->insert([
            'first_name'=>'Harvey',
            'last_name'=>'Specter',
            'date_of_birth'=>'1983-8-15',
            'medicare_id'=>'8TV4TR9IK923',
            'phone_number'=>'5141314652',
            'address'=>'95 Robert St',
            'postal_code_id'=>8,
            'citizenship'=>'Canadian',
            'email_address'=>'harvspec@gmail.com'
        ]);
            
        DB::table('people')->insert([
            'first_name'=>'Louis',
            'last_name'=>'Litt',
            'date_of_birth'=>'1990-10-2',
            'medicare_id'=>'8TY6TR9MO971',
            'phone_number'=>'5141782432',
            'address'=>'95 Robert St',
            'postal_code_id'=>8,
            'citizenship'=>'Canadian',
            'email_address'=>'littlo@gmail.com'
        ]);
            
        DB::table('people')->insert([
            'first_name'=>'Michael',
            'last_name'=>'Morningstar',
            'date_of_birth'=>'1985-12-7',
            'medicare_id'=>'7NW6TR9MO312',
            'phone_number'=>'51417920218',
            'address'=>'95 Robert St',
            'postal_code_id'=>8,
            'citizenship'=>'Canadian',
            'email_address'=>'morningmike@gmail.com'
        ]);
            
        DB::table('people')->insert([
            'first_name'=>'Chloe',
            'last_name'=>'Sterling',
            'date_of_birth'=>'1979-2-17',
            'medicare_id'=>'4NM6JR9IO894',
            'phone_number'=>'51410174212',
            'address'=>'95 Robert St',
            'postal_code_id'=>8,
            'citizenship'=>'Canadian',
            'email_address'=>'strlch@gmail.com'
        ]);
            
        DB::table('people')->insert([
            'first_name'=>'Betty',
            'last_name'=>'Cooper',
            'date_of_birth'=>'1997-7-7',
            'medicare_id'=>'3NM4JE9FC872',
            'phone_number'=>'51412394786',
            'address'=>'95 Robert St',
            'postal_code_id'=>8,
            'citizenship'=>'Canadian',
            'email_address'=>'coopb@gmail.com'
        ]);
            
        DB::table('people')->insert([
            'first_name'=>'Jennifer',
            'last_name'=>'Stanely',
            'date_of_birth'=>'1988-8-8',
            'medicare_id'=>'3IT1PE9FC890',
            'phone_number'=>'51416334130',
            'address'=>'95 Robert St',
            'postal_code_id'=>8,
            'citizenship'=>'Canadian',
            'email_address'=>'jstan@gmail.com'
        ]);
            
        DB::table('people')->insert([
            'first_name'=>'Sayarat',
            'last_name'=>'Ajruh',
            'date_of_birth'=>'1983-05-10',
            'medicare_id'=>'AJRS01239543',
            'phone_number'=>'5145559123',
            'address'=>'25 Lamp Alley',
            'postal_code_id'=>9,
            'citizenship'=>'Egyptian',
            'email_address'=>'inchqut@yahoo.ca'
        ]);         
            
        DB::table('people')->insert([
            'first_name'=>'Eirelon',
            'last_name'=>'Teakley',
            'date_of_birth'=>'1989-7-20',
            'medicare_id'=>'TEAE28282828',
            'phone_number'=>'5145552828',
            'address'=>'Dragon\'s Bounty',
            'postal_code_id'=>14,
            'citizenship'=>'Irish',
            'email_address'=>'eteakley@castergale.co.uk'
        ]);       
            
        DB::table('people')->insert([
            'first_name'=>'Bavdin',
            'last_name'=>'Teakley',
            'date_of_birth'=>'1921-6-21',
            'medicare_id'=>'TEAB82492819',
            'phone_number'=>'5145555192',
            'address'=>'28 Cobbler Ave',
            'postal_code_id'=>5,
            'citizenship'=>'Irish',
            'email_address'=>'webmaster@badvinshoes.com'
        ]);      
            
        DB::table('people')->insert([
            'first_name'=>'Catian',
            'last_name'=>'Behan',
            'date_of_birth'=>'1922-12-15',
            'medicare_id'=>'BEHC58293883',
            'phone_number'=>'5145555192',
            'address'=>'28 Cobbler Ave',
            'postal_code_id'=>5,
            'citizenship'=>'Irish',
            'email_address'=>'cbehanherbology@gmail.com'
        ]);
                        
        DB::table('people')->insert([
            'first_name'=>'Pattid',
            'last_name'=>'Teakley',
            'date_of_birth'=>'1919-9-16',
            'medicare_id'=>'TEAP01235234',
            'phone_number'=>'4505550012',
            'address'=>'5221 High Road',
            'postal_code_id'=>7,
            'citizenship'=>'Irish',
            'email_address'=>'pattid.t@gmail.com'
        ]);
            
        DB::table('people')->insert([
            'first_name'=>'Jimmit',
            'last_name'=>'Teakley',
            'date_of_birth'=>'1872-11-5',
            'medicare_id'=>'TEAJ48928421',
            'phone_number'=>NULL,
            'address'=>'4 Maple Ave',
            'postal_code_id'=>15,
            'citizenship'=>'Irish',
            'email_address'=>NULL
        ]);
    }
}
