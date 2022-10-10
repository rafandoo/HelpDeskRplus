<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AccessLevelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $accessLevels = [
            [
                'id' => 1,
                'description' => 'Cliente'
            ],
            [
                'id' => 2,
                'description' => 'Usuário'
            ],
            [
                'id' => 3,
                'description' => 'Administrador'
            ]
        ];

        foreach ($accessLevels as $accessLevel) {
            \App\Models\AccessLevel::create($accessLevel);
        }
    }
}
