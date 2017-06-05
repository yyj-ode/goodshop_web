<?php

namespace App\Providers;

use Form;
use Html;
use View;
use Illuminate\Support\ServiceProvider;

/**
 * Class Form
 * @package App\Utils
 * Form 扩展
 */

class FormServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishResources();
        $this->publishMigrations();
        $this->setLocale();
        $this->registerProvider();
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerCommands();
        $this->registerAlias();
        $this->registerMiddleware();
    }

    private function registerCommands()
    {

    }

    private function registerProvider()
    {
        $this->app->register(FormService::class);
    }

    private function registerAlias()
    {

    }

    /**
     * Publish configuration file.
     */
    private function publishResources()
    {

    }

    /**
     * Publish migration file.
     */
    private function publishMigrations()
    {

    }

    /**
     * Sets the locale if it exists in the session and also exists in the locales option
     *
     * @return void
     */
    public function setLocale()
    {

    }

    private function registerMiddleware()
    {

    }
}


