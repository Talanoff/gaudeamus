<?php

use Illuminate\Database\Seeder;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $t = App\Models\User\User::where('role_id', 3)->pluck('id')->toArray();
        $s = App\Models\User\User::where('role_id', 4)->pluck('id')->toArray();

        for ($i = 0; $i <= 5; $i++) {
            $d = implode('</p><p>', $faker->sentences(rand(6, 10)));

            /** @var \App\Models\Education\Course $c */
            $c = \App\Models\Education\Course::create([
                'title' => ucfirst($faker->words(rand(1,3), true)),
                'description' => "<p>{$d}</p>",
                'lessons' => rand(16, 20),
                'price' => rand(450, 550),
                'starts_at' => Carbon\Carbon::now()->addMonth(1),
                'ends_at' => Carbon\Carbon::now()->addMonths(3)
            ]);

            $c->teachers()->attach($faker->randomElements($t, rand(3, 5)));
            $c->students()->attach($faker->randomElements($s, rand(12, 16)));
        }
    }
}
