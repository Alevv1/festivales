<?php
// database/seeders/RoleAndPermissionSeeder.php

namespace Database\Seeders;

use App\Http\Models\User;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleAndPermissionSeeder extends Seeder
{
    public function run()
    {
        // Crear permisos
        $viewRanking = Permission::firstOrCreate(['name' => 'view ranking']);
        $viewDjProfile = Permission::firstOrCreate(['name' => 'view dj profile']);
        $participateInTours = Permission::firstOrCreate(['name' => 'participate in tours']);

        // Crear roles y asignar permisos
        $djRole = Role::firstOrCreate(['name' => 'DJ']);
        $djRole->syncPermissions([$viewRanking, $viewDjProfile, $participateInTours]);

        $guestRole = Role::firstOrCreate(['name' => 'Invitado']);
        $guestRole->syncPermissions([$viewRanking, $viewDjProfile]);

        // Crear instancia de Faker
        $faker = Faker::create();
        $faker->addProvider(new \Smknstd\FakerPicsumImages\FakerPicsumImagesProvider($faker));

        // Definir DJs con generación de imágenes desde Picsum
        $djs = [
            [
                'name' => 'DJ PIRATA',
                'email' => 'djpirata@example.com',
                'password' => bcrypt('12345678'),
                'age' => $faker->numberBetween(18, 50),
                'points' => $faker->numberBetween(0, 100),
                'profile_photo_path' => $faker->image('public/storage/profiles', 640, 480, false, true), // Usar Picsum con faker
                'last_festivals' => json_encode($faker->words()), // Formato JSON
            ],
            [
                'name' => 'DJ SENSATION',
                'email' => 'djsensation@example.com',
                'password' => bcrypt('12345678'),
                'age' => $faker->numberBetween(18, 50),
                'points' => $faker->numberBetween(0, 100),
                'profile_photo_path' => $faker->image('public/storage/profiles', 640, 480, false, true), // Usar Picsum con faker
                'last_festivals' => json_encode($faker->words()), // Formato JSON
            ],
            [
                'name' => 'DJ LARAVEL',
                'email' => 'djlaravel@example.com',
                'password' => bcrypt('12345678'),
                'age' => $faker->numberBetween(18, 50),
                'points' => $faker->numberBetween(0, 100),
                'profile_photo_path' => $faker->image('public/storage/profiles', 640, 480, false, true), // Usar Picsum con faker
                'last_festivals' => json_encode($faker->words()), // Formato JSON
            ],
        ];

        // Crear los DJs en la base de datos
        foreach ($djs as $djData) {
            $dj = User::firstOrCreate(
                ['email' => $djData['email']],
                $djData
            );
            $dj->assignRole($djRole);
        }
    }
}
