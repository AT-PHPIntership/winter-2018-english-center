<?php

namespace App\Providers;

use App\Models\User;
use App\Observers\UserObserver;
use App\Observers\QuestionObserver;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Relations\Relation;
use JavaScript;
use App\Models\Question;

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
        Question::observe(QuestionObserver::class);
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
            'rating' => __('js.rating'),
            'exercise'  => __('js.exercise'),
        ]);
    }
}
