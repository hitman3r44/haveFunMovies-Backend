<?php

use App\Model\AdminVideo;
use App\Model\Country;
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

        $customer = factory(App\User::class)->create([
            'name' => 'Customer',
            'email' => 'customer@havefunmovies.com',
            'password' => '$2y$10$Mush1is5LbCNUtBfSd1N6OY1kY5DgcjnZfM6uEJEDYKQXc4qivOhG',
        ]);

        $retailer = factory(App\User::class)->create([
            'name' => 'Retailer',
            'email' => 'retailer@havefunmovies.com',
            'password' => '$2y$10$Mush1is5LbCNUtBfSd1N6OY1kY5DgcjnZfM6uEJEDYKQXc4qivOhG',
        ]);

        $this->call([
            SettingsTableSeeder::class,
            RolesAndPermissionsSeeder::class,
            CountriesTableSeeder::class,
            TmdbGenersSeeder::class,
            CategoriesTableSeeder::class,
            SubscriptionsTableSeeder::class,
            CouponsTableSeeder::class,
            AdminVideosTableSeeder::class,
            GiftCardsTableSeeder::class,
            PrepaidCodesTableSeeder::class
        ]);

        $userSuperAdmin->assignRole(Role::findByName('super-admin'));
        $userAdmin->assignRole(Role::findByName('admin'));
        $moderator->assignRole(Role::findByName('moderator'));
        $director->assignRole(Role::findByName('director'));
        $publisher->assignRole(Role::findByName('publisher'));
        $customer->assignRole(Role::findByName('customer'));
        $retailer->assignRole(Role::findByName('retailer'));

        factory(App\Model\Advertisement::class, 4)->create()->each(function ($advertisement)  {
            $advertisement->countries()->attach(Country::whereIn('id', [1,2,3])->get());
            $advertisement->movies()->attach(AdminVideo::whereIn('id', [1,2,3])->get());

        });

//        $customers = factory(App\User::class, 4)->create()->each(function ($advertisement){
//
//        });
    }
}
