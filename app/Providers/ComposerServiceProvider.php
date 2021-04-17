<?php

namespace App\Providers;

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
        //
        view()->composer(['public.shared.footer', 'public.shared.header', 'public.product.index'], 'App\Http\ViewComposers\CategoryComposer');
        view()->composer(['public.shared.footer', 'public.shared.header', 'public.product.index', 'public.home.deals_featured'], 'App\Http\ViewComposers\BrandComposer');
        view()->composer(['public.shared.footer', 'public.shared.header', 'public.product.index'], 'App\Http\ViewComposers\SponsorComposer');
        view()->composer(['public.shared.header'], 'App\Http\ViewComposers\CartComposer');
    }
}
