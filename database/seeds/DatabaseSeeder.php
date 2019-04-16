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
		$this->call([
			RolesTableSeeder::class,
			UsersTableSeeder::class,
			SettingsTableSeeder::class,
			BannersTableSeeder::class,
			PagesTableSeeder::class,
			QuotesTableSeeder::class,
		]);

		if (config('app.env') === 'local') {
			$this->call([
				CoursesTableSeeder::class,
			]);
		}
	}
}
