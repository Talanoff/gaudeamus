<?php

namespace App\Providers;


use App\Models\Article\Review;
use App\Models\Page\Feedback;
use App\Models\Page\Respond;
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

        View::composer(['admin.*'], function () {
            View::share('nav', [
                [
                    'name' => 'Записи на курс',
                    'route' => 'admin.feedback.index',
                    'compare' => 'admin.feedback.*',
                    'icon' => 'orders',
                    'unread' => Feedback::where('status', 'processing')->count(),
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
                    'compare' => ['admin.articles.*', 'admin.tags.*',],
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
                    'name' => 'Пользователи',
                    'route' => 'admin.users.index',
                    'compare' => ['admin.users.*', 'admin.teachers.*', 'admin.students.*'],
                    'icon' => 'users',
                    'submenu' => [
                        'users' => [
                            'name' => 'Все пользователи',
                            'route' => 'admin.users.index',
                        ],
                        'teachers' => [
                            'name' => __('Our team'),
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
                    'name' => 'Вакансии',
                    'route' => 'admin.vacancies.index',
                    'compare' => ['admin.vacancies.*', 'admin.responds.*'],
                    'icon' => 'envelope',
                    'unread' => Respond::where('status', 'processing')->count(),
                    'submenu' => [
                        'vacancy' => [
                            'name' => 'Все вакансии',
                            'route' => 'admin.vacancies.index',
                        ],
                        'responds' => [
                            'name' => 'Отклики на вакансии',
                            'route' => 'admin.responds.index',
                        ],
                    ],
                ],
                [
                    'name' => 'Отзывы',
                    'route' => 'admin.reviews.index',
                    'compare' => 'admin.reviews.*',
                    'icon' => 'comments',
                    'unread' => Review::where('status', 'processing')->count(),
                ],
                [
                    'name' => 'Аспекты',
                    'route' => 'admin.aspects.index',
                    'compare' => 'admin.aspects.*',
                    'icon' => 'refresh',
                ],
                [
                    'name' => 'Баннеры',
                    'route' => 'admin.banners.index',
                    'compare' => 'admin.banners.*',
                    'icon' => 'dashboard',
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
                    'compare' => ['admin.pages.*', 'admin.quotes.*',],
                    'icon' => 'products',
                    'submenu' => [
                        'page' => [
                            'name' => 'Все страницы',
                            'route' => 'admin.pages.index',
                        ],
                        'quotes' => [
                            'name' => 'Цитаты для страниц',
                            'route' => 'admin.quotes.index',
                        ],
                    ],
                ],
                [
                    'name' => 'FAQ',
                    'route' => 'admin.faq.index',
                    'compare' => 'admin.faq.*',
                    'icon' => 'clipboard',
                ],

                [
                    'name' => 'Фотогалерея',
                    'route' => 'admin.galleries.index',
                    'compare' => 'admin.galleries.*',
                    'icon' => 'monitor',
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
