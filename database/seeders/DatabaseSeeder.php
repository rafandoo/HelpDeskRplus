<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
            'Database\Seeders\default\PriorityTableSeeder',
            'Database\Seeders\default\StatusTableSeeder',
            'Database\Seeders\default\AccessLevelTableSeeder',
            'Database\Seeders\default\AdmUserTableSeeder',
            'Database\Seeders\default\StateTableSeeder',
            'Database\Seeders\default\CityTableSeeder'
        ]);

        // $this->call([
        //     PrioritySeeder::class,
        //     StatusSeeder::class,
        //     AccessLevelSeeder::class,
        //     StateSeeder::class,
        //     CitySeeder::class,
        //     SectorSeeder::class,
        //     CategorySeeder::class,
        //     ClientSeeder::class,
        //     // AddressSeeder::class,
        //     UserSeeder::class,
        //     TicketSeeder::class,
        //     OccurrenceSeeder::class,
        //     ServiceOrderSeeder::class,
        //     AdmUserTableSeeder::class,
        //     TeamSeeder::class,
        // ]);

        $this->command->info('All tables seeded!');
    }
}
