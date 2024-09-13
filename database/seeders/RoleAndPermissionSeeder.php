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
        $viewRanking = Permission::firstOrCreate(['name' => 'view ranking']);
        $viewDjProfile = Permission::firstOrCreate(['name' => 'view dj profile']);
        $participateInTours = Permission::firstOrCreate(['name' => 'participate in tours']);

        $djRole = Role::firstOrCreate(['name' => 'DJ']);
        $djRole->syncPermissions([$viewRanking, $viewDjProfile, $participateInTours]);

        $guestRole = Role::firstOrCreate(['name' => 'Invitado']);
        $guestRole->syncPermissions([$viewRanking, $viewDjProfile]);

        $faker = Faker::create();

        $storagePath = 'public/storage/profiles';
        if (!is_dir($storagePath)) {
            mkdir($storagePath, 0777, true);
        }

        $djs = [
            [
                'name' => 'DJ PIRATA',
                'email' => 'djpirata@example.com',
                'password' => bcrypt('12345678'),
                'age' => $faker->numberBetween(18, 50),
                'points' => $faker->numberBetween(0, 100),
                'profile_photo_path' => $this->generateProfileImage($faker, $storagePath),
                'last_festivals' => json_encode($faker->words()),
            ],
            [
                'name' => 'DJ SENSATION',
                'email' => 'djsensation@example.com',
                'password' => bcrypt('12345678'),
                'age' => $faker->numberBetween(18, 50),
                'points' => $faker->numberBetween(0, 100),
                'profile_photo_path' => $this->generateProfileImage($faker, $storagePath),
                'last_festivals' => json_encode($faker->words()),
            ],
            [
                'name' => 'DJ LARAVEL',
                'email' => 'djlaravel@example.com',
                'password' => bcrypt('12345678'),
                'age' => $faker->numberBetween(18, 50),
                'points' => $faker->numberBetween(0, 100),
                'profile_photo_path' => $this->generateProfileImage($faker, $storagePath),
                'last_festivals' => json_encode($faker->words()),
            ],
        ];

        foreach ($djs as $djData) {
            $dj = User::firstOrCreate(
                ['email' => $djData['email']],
                $djData
            );
            $dj->assignRole($djRole);
        }
    }

    //a veces faker no puede generar una imagen, por lo que se usa un valor default
    private function generateProfileImage($faker, $storagePath)
    {
        $profileImagePath = $faker->image($storagePath, 400, 300, null, false);

        if ($profileImagePath == 0) {
            return 'default.png';
        }

        return $profileImagePath;
    }
}
