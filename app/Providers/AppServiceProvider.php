<?php

namespace App\Providers;

use App\Models\User;
use App\Observers\UserObserver;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Relations\Relation;
use JavaScript;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->putPHPToJavaScript();
        User::observe(UserObserver::class);
        Relation::morphMap([
            'lessons' => 'App\Models\Lesson',
            'courses' => 'App\Models\Course',
        ]);
    }

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
     * Define putPHPToJavaScript
     *
     * @return void
     */
    protected function putPHPToJavaScript()
    {
        JavaScript::put([
            'define' => config('define'),
            'trans'  => __('js'),
            'comment'  => __('js.comment'),
            'exercise'  => __('js.exercise'),
        ]);
    }
}
