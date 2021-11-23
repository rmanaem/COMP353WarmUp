<?php

namespace Database\Seeders;

use App\Models\PostalCode;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            AlertLevelsSeeder::class,
            RegionsSeeder::class,
            CitiesSeeder::class,
            PostalCodesSeeder::class,
            PeopleSeeder::class,
            ParentagesSeeder::class,
            GroupZonesSeeder::class,
            GroupZoneMembershipsSeeder::class,
            PublicHealthWorkersSeeder::class,
            PublicHealthCentresSeeder::class,
            EmploymentContractsSeeder::class,
            PcrTestsSeeder::class,
            SymptomHistoriesSeeder::class,
            RegionAlertHistoriesSeeder::class,
            MessageTemplatesSeeder::class,
            MessagesSeeder::class,
            RecommendationsSeeder::class
        ]);
    }
}
