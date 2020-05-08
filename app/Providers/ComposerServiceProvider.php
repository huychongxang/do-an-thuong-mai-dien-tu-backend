<?php

namespace App\Providers;

use App\Views\Composers\Admin\SideBarAndNavBarComposer;
use App\Views\Composers\Web\CartHeaderComposer;
use App\Views\Composers\Web\NewBlogComposer;
use App\Views\Composers\Web\ProductsComposer;
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
        view()->composer(['web.includes.home.new-blog'], NewBlogComposer::class);
        view()->composer(['web.includes.home.product-most-popular-start'], ProductsComposer::class);
        view()->composer(['web.includes.header-cart'], CartHeaderComposer::class);
    }
}
