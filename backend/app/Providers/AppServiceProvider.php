<?php

namespace App\Providers;


use Illuminate\Http\Request;
use Illuminate\Cache\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Queue\Middleware\RateLimited;
use Illuminate\Support\Facades\RateLimiter as RateLimiterFacade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        RateLimiterFacade::for('userLogin', function (Request $request) {
            // return Limit::perMinute(5)->by(optional($request->user())->id ?: $request->ip());
            return $request->user() ?
                Limit::perMinute(10)->by($request->ip()) :
                Limit::perMinute(5)->by($request->ip());
        });
        
    }
}
