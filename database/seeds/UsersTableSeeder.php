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

        \App\Models\User\User::create([
            'name' => 'Администратор',
            'email' => 'admin@app.com',
            'password' => bcrypt('password'),
            'remember_token' => str_random(10),
            'phone' => $faker->e164PhoneNumber,
            'birthday' => $faker->date('Y-m-d'),
            'role_id' => 1,
            'is_confirmed' => 1
        ]);

        if (config('app.env') === 'local') {
			\App\Models\User\User::create([
				'name' => 'Менеджер',
				'email' => 'manager@app.com',
				'password' => bcrypt('password'),
				'remember_token' => str_random(10),
				'phone' => $faker->e164PhoneNumber,
				'birthday' => $faker->date('Y-m-d'),
				'role_id' => 2,
				'is_confirmed' => 1
			]);

			for ($i = 1; $i <= 10; $i++) {
				\App\Models\User\User::create([
					'name' => $faker->name(),
					'email' => "teacher.{$i}@app.com",
					'password' => bcrypt('password'),
					'remember_token' => str_random(10),
					'phone' => $faker->e164PhoneNumber,
					'birthday' => $faker->date('Y-m-d'),
					'role_id' => 3,
					'is_confirmed' => 1
				]);
			}

			for ($i = 1; $i <= 20; $i++) {
				\App\Models\User\User::create([
					'name' => $faker->name(),
					'email' => "student.{$i}@app.com",
					'password' => bcrypt('password'),
					'remember_token' => str_random(10),
					'phone' => $faker->e164PhoneNumber,
					'birthday' => $faker->date('Y-m-d'),
					'role_id' => 4,
				]);
			}
		}
    }
}
