<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Http\ViewComposers\RoleComposer;
use App\Http\ViewComposers\LevelComposer;
use App\Http\ViewComposers\VocabularyComposer;
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
        view()->composer(['backend.courses.create','backend.courses.edit', 'backend.lessons.create', 'backend.lessons.edit'], 'App\Http\ViewComposers\CourseComposer');
        view()->composer(['backend.users.create', 'backend.users.edit'], RoleComposer::class);
        view()->composer(['frontend.layouts.partials.footer', 'frontend.home', 'frontend.contact', 'frontend.about'], SystemComposer::class);
        view()->composer(['frontend.layouts.partials.header', 'frontend.levels.index'], LevelComposer::class);
        view()->composer(['backend.lessons.create', 'backend.lessons.edit'], LevelComposer::class);
        view()->composer(['backend.lessons.create', 'backend.lessons.edit'], VocabularyComposer::class);
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
