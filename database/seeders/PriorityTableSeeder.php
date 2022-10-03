<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PriorityTableSeeder extends Seeder {

    public function run() {
        $priorities = [
            [
                'description' => 'Baixo',
                'active' => true
            ],
            [
                'description' => 'Médio',
                'active' => true
            ],
            [
                'description' => 'Alto',
                'active' => true
            ],
            [
                'description' => 'Urgente',
                'active' => true
            ]
        ];

        foreach ($priorities as $priority) {
            \App\Models\Priority::create($priority);
        }
    }
}