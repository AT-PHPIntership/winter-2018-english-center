<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Http\ViewComposers\RoleComposer;
use App\Http\ViewComposers\SystemComposer;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer(['backend.courses.create','backend.courses.edit'], 'App\Http\ViewComposers\CourseComposer');
        view()->composer(['backend.users.create', 'backend.users.edit'], RoleComposer::class);
        view()->composer(['frontend.layouts.partials.footer', 'frontend.home', 'frontend.about'], SystemComposer::class);
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
