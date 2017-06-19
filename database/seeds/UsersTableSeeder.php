<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            ['id' => 1,
                'name' => "Questionnaire User",
                'email' => 'user@example.com',
                'password' => bcrypt('password'),
                'remember_token' => str_random(10),
            ],
        ]);
    }
}
