<?php

namespace App\Providers;

use App\Recipe;
use App\Categorie;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Cache;

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
        Schema::defaultStringLength(191);

      Recipe::saved(function($recipe) {
            Cache::forget('all-recipes');
        });

        Categorie::saved(function($categorie) {
            Cache::forget('all-categories');
        });

        Recipe::deleted(function($recipe) {
            Cache::forget('all-recipes');
        });

        Categorie::deleted(function($categorie) {
            Cache::forget('all-categories');
        });



    }
}
