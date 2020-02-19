<?php
namespace App\Foundation;

use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use App\Services\Api\Providers\ApiServiceProvider;

class ServiceProvider extends BaseServiceProvider
{
    public function register()
    {
        // Register the service providers of your Services here.
        // $this->app->register('full namespace here')
        $this->app->register(ApiServiceProvider::class);
    }
}
