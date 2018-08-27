<?php

namespace App\Providers;

use App\Jobs\ProcessTwitterProfileJob;
use App\SocialNetwork\Interfaces\SocialNetworkConsumerInterface;
use App\SocialNetwork\TwitterConsumer;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind("App\SocialNetwork\Interfaces\SocialNetworkConsumerInterface","App\SocialNetwork\TwitterConsumer" );
        $this->app->bind("App\SocialNetwork\Interfaces\SocialNetworkProfileInterface","App\SocialNetwork\TwitterProfile" );
    }
}
