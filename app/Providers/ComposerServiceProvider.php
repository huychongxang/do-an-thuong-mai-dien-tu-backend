<?php

namespace App\Providers;

use App\Views\SideBarAndNavBarComposer;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer(['admin.includes.sidebar', 'admin.includes.navbar'], SideBarAndNavBarComposer::class);
    }
}
