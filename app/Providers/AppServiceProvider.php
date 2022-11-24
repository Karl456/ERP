<?php

namespace App\Providers;

use App\Models\Collection;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('layouts.app', function (\Illuminate\View\View $view) {
            $collections = Collection::query()->get();

            $view->with(compact('collections'));
        });
    }
}
