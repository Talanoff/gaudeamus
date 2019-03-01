<?php

use Illuminate\Database\Seeder;

class PagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pages = [
            'Программы и стоимость обучения',
            'Новая методика',
            'O нас',
            'Контакты'
        ];
        foreach ($pages as $item) {
            $page = \App\Models\Page\Page::create([
                'title' => $item,
            ]);
        }
    }
}
