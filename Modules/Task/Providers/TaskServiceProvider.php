<?php

namespace Modules\Task\Providers;

use Illuminate\Support\ServiceProvider;

class TaskServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {       
       
        $this->app->make('Modules\Task\Http\Controllers\TaskController');
        $this->loadViewsFrom(__DIR__.'/../Views', 'task');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

}
