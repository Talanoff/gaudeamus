<?php

use Illuminate\Database\Seeder;

class BannersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        $banners =[
            'Отзывы',
            'Статьи',
            'Контакты',
            'Галерея',
            'FAQ',
            'Вакансии',
            'Преподаватели',
            'Учебные материалы',
            'Программа и стоимость',
            'О нас',
            'Войти',
            'Регистрация',
            'Спасибо',
            'Откликнуться на вакансию',
            'Правила пользования сайтом',
        ];

        foreach ($banners as $item){
            $banner = \App\Models\Common\Banner::create([
                'title' => $item,
            ])->addMediaFromUrl('https://picsum.photos/800/600')
                ->toMediaCollection('banner');
        }

    }
}
