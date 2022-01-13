<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Relations\Relation;
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
        //
        // Relation::morphMap([
        //     'merchants' => 'App\Models\Merchant',
        //     'admins' => 'App\Models\Admin',
        //     'drivers' => 'App\Models\Courier',
        // ]);
    }
}
