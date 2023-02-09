<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator; 
use App\Models\Category;
use App\Models\Cart;


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
        Paginator::useBootstrap();


        view()->composer('*', function($view){
            $view->with('categories', Category::with('subcategory')->get());
            $view->with('cartProducts', Cart::where('user_id', auth()->check() ? auth()->user()->id : '')->count());
        });
    }
}
