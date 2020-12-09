<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\ServiceProvider;
use TenantScope;

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

    public function boot() {
    }
}
