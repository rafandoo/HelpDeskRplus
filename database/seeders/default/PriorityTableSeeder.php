<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PriorityTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $priorities = [
            [
                'description' => 'Baixa',
                'active' => true
            ],
            [
                'description' => 'Média',
                'active' => true
            ],
            [
                'description' => 'Alto',
                'active' => true
            ],
            [
                'description' => 'Urgênte',
                'active' => true
            ]
        ];

        foreach ($priorities as $priority) {
            \App\Models\Priority::create($priority);
        }
    }
}