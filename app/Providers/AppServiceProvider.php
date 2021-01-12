<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\FormFields\LinkFormField;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        \Voyager::addFormField(LinkFormField::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
