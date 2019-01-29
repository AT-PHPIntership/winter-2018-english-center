<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Http\ViewComposers\RoleComposer;
use App\Http\ViewComposers\LevelComposer;
<<<<<<< HEAD
use App\Http\ViewComposers\VocabularyComposer;
=======
>>>>>>> b564c48bb291512eebfece13bf8adccd58716190
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
        view()->composer(['backend.courses.create','backend.courses.edit', 'backend.lessons.create'], 'App\Http\ViewComposers\CourseComposer');
        view()->composer(['backend.users.create', 'backend.users.edit'], RoleComposer::class);
        view()->composer(['backend.lessons.create'], LevelComposer::class);
<<<<<<< HEAD
        view()->composer(['backend.lessons.create'], VocabularyComposer::class);
=======
>>>>>>> b564c48bb291512eebfece13bf8adccd58716190
        view()->composer(['frontend.layouts.partials.footer', 'frontend.home',], SystemComposer::class);
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
