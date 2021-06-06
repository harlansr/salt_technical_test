<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;

use Illuminate\Http\Request;
use App\Http\View\Composers\OrderComposer;
use App\Models\Order;


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
        Paginator::useBootstrap();

        // Using class based composers...
        View::composer(['prepaid-balance',
             'product',
             'success',
             'payment',
             'order',
            ], OrderComposer::class);

        // Using closure based composers...
        // View::composer('dashboard', function ($view) {
        //     //
        // });

        // dd(\Auth::user());
        // View::share('unpaid', Order::where('status', '=', 0)
        // ->where('user_id', '=', \Auth::user()->id)
        // ->count());
    }
}
