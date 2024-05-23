<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\Hash;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create();

        // Lista de departamentos ficticios
        $departamentos = [
            'Antioquia', 'Atlántico', 'Bogotá', 'Bolívar', 'Boyacá',
            'Caldas', 'Caquetá', 'Cauca', 'Cesar', 'Córdoba',
            'Cundinamarca', 'Chocó', 'Huila', 'La Guajira', 'Magdalena',
            'Meta', 'Nariño', 'Norte de Santander', 'Quindío', 'Risaralda',
            'Santander', 'Sucre', 'Tolima', 'Valle del Cauca', 'Arauca',
            'Casanare', 'Putumayo', 'San Andrés y Providencia', 'Amazonas', 'Guainía'
        ];

        for ($i = 0; $i < 50; $i++) {
            User::create([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'password' => Hash::make('password'),
                'departamento' => $faker->randomElement($departamentos),
            ]);
        }
    }
}
