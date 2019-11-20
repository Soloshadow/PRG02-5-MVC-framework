<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Table seeder for user project. creating multiple data
        for($i = 0; $i < 11; $i++){
            DB::table('project_user')->insert([
                'user_id' => rand(1, 10),
                'project_id' => rand(1, 10),
            ]);
        }

    }
}
