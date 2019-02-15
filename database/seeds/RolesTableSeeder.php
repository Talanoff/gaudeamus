<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (\App\Models\User\Role::$ROLES as $key => $name) {
            \App\Models\User\Role::create([
                'name' => $key,
                'display' => $name,
            ]);
        }
    }
}
