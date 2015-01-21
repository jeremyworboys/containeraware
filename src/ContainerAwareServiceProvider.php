<?php

namespace JeremyWorboys\ContainerAware;

use Illuminate\Support\ServiceProvider;

class ContainerAwareServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application events.
     */
    public function boot()
    {
        $this->app->resolvingAny(function ($object, $container) {
            if ($object instanceof ContainerAware) {
                $object->setContainer($container);
            }
        });
    }

    /**
     * Register the service provider.
     */
    public function register() { }
}
