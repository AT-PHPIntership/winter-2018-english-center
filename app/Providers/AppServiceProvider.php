<?php

namespace App\Providers;

use App\Models\User;
use App\Observers\UserObserver;
use Illuminate\Support\ServiceProvider;
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
        ]);
    }
}
