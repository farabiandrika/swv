<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;

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
        $configs=DB::table('configs')->first();
        if ($configs) {
            config(['company.configs' => $configs]);
        } else {
            config(['company.configs' => null]);
        }
    }
}
