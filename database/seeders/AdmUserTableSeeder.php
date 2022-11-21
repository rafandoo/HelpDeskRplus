<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdmUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admUser = [
            'name' => 'Administrador',
            'email' => 'rplus@techie.com',
            'username' => 'rplus',
            'password' => bcrypt('admR+2022'),
            'access_level' => 3,
            'active' => true,
        ];
        \App\Models\User::create($admUser);
    }
}
