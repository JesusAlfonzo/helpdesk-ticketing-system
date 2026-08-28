<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Crear usuarios solicitantes
        User::create([
            'name' => 'Usuario Solicitante 1',
            'email' => 'solicitante@example.com',
            'password' => bcrypt('password'),
            'role' => 'Solicitante'
        ]);
        User::create([
            'name' => 'Usuario Solicitante 2',
            'email' => 'solicitante2@example.com',
            'password' => bcrypt('password'),
            'role' => 'Solicitante'
        ]);

        //Crear usuarios técnicos
        User::create([
            'name' => 'Usuario Técnico 1',
            'email' => 'tecnico1@example.com',
            'password' => bcrypt('password'),
            'role' => 'Técnico'
        ]);

        User::create([
            'name' => 'Usuario Técnico 2',
            'email' => 'tecnico2@example.com',
            'password' => bcrypt('password'),
            'role' => 'Técnico'
        ]);

        //Crear usuarios administradores
        User::create([
            'name' => 'Usuario Administrador 1',
            'email' => 'admin1@example.com',
            'password' => bcrypt('password'),
            'role' => 'Administrador'
        ]);

        User::create([
            'name' => 'Usuario Administrador 2',
            'email' => 'admin2@example.com',
            'password' => bcrypt('password'),
            'role' => 'Administrador'
        ]);
    }
}
