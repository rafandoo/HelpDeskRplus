<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $statuses = [
            [
                'description' => 'Aguardando atendimento',
                'active' => true
            ],
            [
                'description' => 'Pendente',
                'active' => true
            ],
            [
                'description' => 'Em andamento',
                'active' => true
            ],
            [
                'description' => 'Finalizado',
                'active' => true
            ]
        ];

        foreach ($statuses as $status) {
            \App\Models\Status::create($status);
        }
    }
}