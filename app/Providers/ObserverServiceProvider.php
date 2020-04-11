<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Company;
use App\Observers\CompanyObserver;

use App\Item;
use App\Observers\ItemObserver;

use App\Challan;
use App\Observers\ChallanObserver;

class ObserverServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    { }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Company::observe(CompanyObserver::class);
        Item::observe(ItemObserver::class);
        Challan::observe(ChallanObserver::class);
    }
}