<?php

namespace App\Providers;

use App\Repositories\TransitionalRepository;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::if('admin', function () {
            return auth()->check() && auth()->user()->admin;
        });
/*        if (request ()->server ("SCRIPT_NAME") !== 'artisan') {
            view ()->share ('transitions', resolve(TransitionalRepository::class)->getAll());
        }*/
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment() == 'local') {
            $this->app->register('Kurt\Repoist\RepoistServiceProvider');
        }
    }
}
