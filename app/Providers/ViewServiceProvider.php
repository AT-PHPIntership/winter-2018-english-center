<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Http\ViewComposers\RoleComposer;
use App\Http\ViewComposers\SystemComposer;
use App\Http\ViewComposers\LessonComposer;
use App\Http\ViewComposers\CommentComposer;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer(['backend.courses.create','backend.courses.edit', 'frontend.layouts.partials.header', 'frontend.pages.course', 'frontend.pages.detail_course'], 'App\Http\ViewComposers\CourseComposer');
        view()->composer(['backend.users.create', 'backend.users.edit'], RoleComposer::class);
        view()->composer(['frontend.layouts.partials.footer', 'frontend.home',], SystemComposer::class);
        view()->composer(['frontend.pages.detail_course'], CommentComposer::class);
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
