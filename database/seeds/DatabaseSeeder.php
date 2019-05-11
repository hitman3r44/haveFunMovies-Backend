<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $userSuperAdmin = factory(App\User::class)->create([
            'name' => 'SuperAdmin',
            'email' => 'superadmin@havefunmovies.com',
            'password' => '$2y$10$Mush1is5LbCNUtBfSd1N6OY1kY5DgcjnZfM6uEJEDYKQXc4qivOhG',
        ]);

        $userAdmin = factory(App\User::class)->create([
            'name' => 'Admin',
            'email' => 'admin@havefunmovies.com',
            'password' => '$2y$10$Mush1is5LbCNUtBfSd1N6OY1kY5DgcjnZfM6uEJEDYKQXc4qivOhG',
        ]);

        $moderator = factory(App\User::class)->create([
            'name' => 'Moderator',
            'email' => 'moderator@havefunmovies.com',
            'password' => '$2y$10$Mush1is5LbCNUtBfSd1N6OY1kY5DgcjnZfM6uEJEDYKQXc4qivOhG',
        ]);

        $director = factory(App\User::class)->create([
            'name' => 'Director',
            'email' => 'director@havefunmovies.com',
            'password' => '$2y$10$Mush1is5LbCNUtBfSd1N6OY1kY5DgcjnZfM6uEJEDYKQXc4qivOhG',
        ]);

        $publisher = factory(App\User::class)->create([
            'name' => 'Publisher',
            'email' => 'publisher@havefunmovies.com',
            'password' => '$2y$10$Mush1is5LbCNUtBfSd1N6OY1kY5DgcjnZfM6uEJEDYKQXc4qivOhG',
        ]);

        $this->call([
            SettingsTableSeeder::class,
            RolesAndPermissionsSeeder::class,
        ]);

        $userSuperAdmin->assignRole(Role::findByName('super-admin'));
        $userAdmin->assignRole(Role::findByName('admin'));
        $moderator->assignRole(Role::findByName('moderator'));
        $director->assignRole(Role::findByName('director'));
        $publisher->assignRole(Role::findByName('publisher'));
    }
}
