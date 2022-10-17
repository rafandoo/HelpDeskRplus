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
            'Database\Seeders\PriorityTableSeeder',
            'Database\Seeders\StatusTableSeeder',
            'Database\Seeders\AccessLevelTableSeeder',
            'Database\Seeders\StateTableSeeder',
            'Database\Seeders\CityTableSeeder'
        ]);

        //$this->command->info('Priorities table seeded!');
    }
}
