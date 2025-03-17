<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if($this->app->environment('production')) {

            // Force https, but not in localhost
            try {
                if (!is_localhost()) {
                    \URL::forceScheme('https');
                }
            } catch (\Throwable $th) {
            }
            
        }

        if ($this->app->isLocal()) {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        try {
            Schema::disableForeignKeyConstraints();
        } catch (\Throwable $th) {}

        Blade::withoutDoubleEncoding();
    }
}
