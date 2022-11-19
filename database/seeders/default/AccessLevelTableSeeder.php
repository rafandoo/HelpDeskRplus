<?php

namespace Database\Seeders\default;

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
                'name' => 'Cliente'
            ],
            [
                'id' => 2,
                'name' => 'Usuário'
            ],
            [
                'id' => 3,
                'name' => 'Administrador'
            ]
        ];

        foreach ($accessLevels as $accessLevel) {
            \App\Models\AccessLevel::create($accessLevel);
        }
    }
}
