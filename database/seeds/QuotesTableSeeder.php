<?php

use Illuminate\Database\Seeder;

class QuotesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $quotes = [
            'Преподаватели',
            'Контакты',
            'O нас'
        ];
        foreach ($quotes as $quote) {
            $quote = \App\Models\Common\Quote::create([
                'title' => $quote,
            ]);
        }
    }
}
