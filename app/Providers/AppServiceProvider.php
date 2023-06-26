<?php

namespace App\Providers;

use App\Models\Concert;
use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;


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
        Carbon::setlocale('ru_RU');
        View::share('date', date('Y'));
        for ($i = 1; $i <= Concert::count(); $i++){
            View::share('date' . $i, Carbon::now()->addDay($i)->translatedFormat('d F, 20:00'));
        }
    }
}
