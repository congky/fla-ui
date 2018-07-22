<?php
namespace FLA\UI;

use Illuminate\Support\ServiceProvider;

class UiServiceProvider extends ServiceProvider
{
    public function register()
    {

        // Register all services
        $this->services();
    }

    public function boot()
    {
        // Load routes
        require __DIR__ . '/Routes/api.php';
        require __DIR__ . '/Routes/web.php';

        // Load views
        $this->loadViewsFrom(__DIR__.'/Views', 'flaCommonUI');

        // Publish assets
        $this->publishes([
            __DIR__.'/Assets' => public_path('app/fla-ui')
        ], 'fla-ui');
    }

    private function services() {
        $this->registerService("callService", CallService::class);

    }

    private function registerService($className, $serviceName = "") {
        $this->app->singleton($serviceName, function() use ($className) {
            return new $className;
        });
    }
}