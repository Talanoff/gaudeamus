<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'social' => [
                'facebook' => 'https://www.facebook.com/',
                'instagram' => 'https://www.instagram.com/',
                'youtube' => 'https://www.youtube.com/',
            ],

            'phones' => [
                'phone1' => '+380 061 277 0 772',
                'phone2' => '+380 061 277 0 772',
            ],

            'email' => [
                'email' => null,
            ],
        ];

        foreach ($data as $type => $datum) {
            foreach ($datum as $key => $item) {
                \App\Models\Common\Setting::create([
                    'type' => $type,
                    'name' => $key,
                    'value' => $item,
                ]);
            }
        }
    }
}
