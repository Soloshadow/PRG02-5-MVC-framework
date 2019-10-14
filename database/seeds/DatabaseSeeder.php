<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        // create mock data using php artisan db:seed

        // create mock user data
        factory(App\User::class,5)->create();

        // create mock role data
        factory(App\Role::class,5)->create();

        // create mock level data
        // factory(App\Level::class)->create();

        // create mock project data
        factory(App\Project::class)->create();

        // create mock task data
        factory(App\Task::class, 3)->create();
    }
}
