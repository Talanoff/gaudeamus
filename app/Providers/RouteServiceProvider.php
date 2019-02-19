<?php

namespace App\Providers;


use App\Models\User\User;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        View::composer(['app.*', 'auth.*'], function () {
            View::share('nav', [

            ]);
        });

        View::composer(['admin.*'], function () {
            View::share('nav', [
                [
                    'name' => 'Панель управления',
                    'route' => 'admin.index',
                    'compare' => 'admin.index',
                    'icon' => 'dashboard',
                    'submenu' => [
                        'banner' => [
                            'name' => 'Баннеры',
                            'route' => 'admin.banners.index',
                        ],
                    ]
                ],
                [
                    'name' => 'Курсы',
                    'route' => 'admin.courses.index',
                    'compare' => 'admin.courses.*',
                    'icon' => 'products',
                ],
                [
                    'name' => 'Материалы',
                    'route' => 'admin.materials.index',
                    'compare' => 'admin.materials.*',
                    'icon' => 'pages',
                ],
                [

                    'name' => 'Статьи',
                    'icon' => 'news',
                    'route' => 'admin.articles.index',
                    'compare' => ['articles', 'tags',],
                    'submenu' => [
                        'articles' => [
                            'name' => 'Все статьи',
                            'route' => 'admin.articles.index',
                        ],
                        'tags' => [
                            'name' => 'Тэги',
                            'route' => 'admin.tags.index',
                        ],
                    ],


                ],
                [
                    'name' => 'Отзывы',
                    'route' => 'admin.reviews.index',
                    'compare' => 'admin.reviews.*',
                    'icon' => 'comments',
                ],
                [

                    'name' => 'Слайдер',
                    'route' => 'admin.slides.index',
                    'compare' => 'admin.slides.*',
                    'icon' => 'image',
                ],
                [
                    'name' => 'Страницы',
                    'route' => 'admin.pages.index',
                    'compare' => 'admin.pages.*',
                    'icon' => 'products',
                ],
                [
                    'name' => 'FAQ',
                    'route' => 'admin.faq.index',
                    'compare' => 'admin.faq.*',
                    'icon' => 'clipboard',
                ],
                [
                    'name' => 'Вакансии',
                    'route' => 'admin.vacancies.index',
                    'compare' => 'admin.vacancies.*',
                    'icon' => 'envelope',
                ],
                [
                    'name' => 'Вопросы',
                    'route' => 'admin.questions.index',
                    'compare' => 'admin.questions.*',
                    'icon' => 'clipboard',
                ],
                [
                    'name' => 'Пользователи',
                    'route' => 'admin.users.index',
                    'compare' => ['users', 'teachers', 'students'],
                    'icon' => 'users',
                    'submenu' => [
                        'users' => [
                            'name' => 'Все пользователи',
                            'route' => 'admin.users.index',
                        ],
                        'teachers' => [
                            'name' => 'Преподаватели',
                            'route' => 'admin.teachers.index',
                        ],
                        'students' => [
                            'name' => 'Студенты',
                            'route' => 'admin.students.index',
                            'unread' => User::whereIsConfirmed(false)->count(),
                        ],
                    ],

                ],
                [
                    'name' => 'Настройки',
                    'route' => 'admin.settings.index',
                    'compare' => 'admin.settings.*',
                    'icon' => 'settings',
                ],
            ]);
        });
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/api.php'));
    }
}
