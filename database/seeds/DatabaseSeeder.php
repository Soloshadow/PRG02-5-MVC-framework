<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
        factory(App\User::class,10)->create();

        // create mock role data
        $this->call(RolesTableSeeder::class);

        // factory(App\Role::class,5)->create();
        // Using the below seed method to insert roles in specific order using array instead of randomizing it and making sure it only appearts once.
        // $roles = ['project owner', 'project leader', 'junior developer', 'medior developer', 'senior developer'];
        // for($i=0; $i < count($roles); $i++){
        //     DB::table('roles')->insert([
        //         'role' => $roles[$i]
        //     ]);
        // }


        // create mock level data
        // factory(App\Level::class)->create();

        // create mock user_projects data
        $this->call(UsersProjectsTableSeeder::class);

        // create mock project data
        factory(App\Project::class,10)->create();

        // create mock task data
        factory(App\Task::class,20)->create();
    }
}
