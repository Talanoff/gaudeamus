<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;

class Navigation
{
    public function main()
    {
        $routes = [
            [
                'route' => route('app.about'),
                'name' => __('About us')
            ],
            [
                'route' => route('app.programs.index'),
                'name' => __('Programme and prices')
            ],
            [
                'route' => route('app.materials.index'),
                'name' => __('Our team')
            ],
            [
                'route' => route('app.vacancies.index'),
                'name' => __('Vacancies')
            ],
            [
                'route' => route('app.reviews.index'),
                'name' => __('Reviews')
            ],
            [
                'route' => route('app.faqs'),
                'name' => __('FAQ')
            ],
            [
                'route' => route('app.galleries'),
                'name' => __('Gallery')
            ],
            [
                'route' => route('app.articles.index'),
                'name' => __('Articles')
            ],
            [
                'route' => route('app.contacts'),
                'name' => __('Contacts')
            ]
        ];

        if (Auth::check()) {
            $routes[] = [
                'route' => route('app.cabinet.index'),
                'name' => __('Personal area')
            ];
        }

        return $routes;
    }
}
