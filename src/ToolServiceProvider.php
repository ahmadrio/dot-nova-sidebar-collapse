<?php

namespace Opanegro\DotNovaSidebarCollapse;

use Laravel\Nova\Nova;
use Laravel\Nova\Events\ServingNova;
use Illuminate\Support\ServiceProvider;

class ToolServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__. '/../resources/views/nova-overrides/resources', 'dot-nova-sidebar-collapse');

        Nova::serving(function (ServingNova $event) {
            Nova::script('dot-nova-sidebar-collapse', __DIR__ . '/../dist/js/tool.js');
        });

        // publish views and config
        $this->publishes([
            __DIR__ . '/../resources/views/nova/resources' => resource_path('views/vendor/nova/resources')
        ], 'dot-nova-sidebar-collapse-views');
        $this->publishes([
            __DIR__ . '/../config/dot-nova-sidebar-collapse.php' => config_path('dot-nova-sidebar-collapse.php')
        ], 'dot-nova-sidebar-collapse-config');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
