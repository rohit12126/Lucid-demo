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
        $faker = Faker\Factory::create();

        for($i = 0; $i < 20; $i++) {
            Framework\User::create([
                'name' => $faker->userName,
                'role' => 'user',
                'email' => $faker->email,
                'password' => bcrypt('test1234'),
            ]);
        }
    }
}
