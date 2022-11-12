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
        // $this->call([
        //     'Database\Seeders\PriorityTableSeeder',
        //     'Database\Seeders\StatusTableSeeder',
        //     'Database\Seeders\AccessLevelTableSeeder',
        //     'Database\Seeders\StateTableSeeder',
        //     'Database\Seeders\CityTableSeeder'
        // ]);

        $this->call([
            PrioritySeeder::class,
            StatusSeeder::class,
            AccessLevelSeeder::class,
            StateSeeder::class,
            CitySeeder::class,
            SectorSeeder::class,
            CategorySeeder::class,
            ClientSeeder::class,
            // AddressSeeder::class,
            UserSeeder::class,
            TeamSeeder::class,
            TicketSeeder::class,
            OccurrenceSeeder::class,
            ServiceOrderSeeder::class,
        ]);

        $this->command->info('All tables seeded!');
    }
}
