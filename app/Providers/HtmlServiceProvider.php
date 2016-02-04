<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\HtmlBuilderCollective;
use App\Services\FormBuilderCollective;

class HtmlServiceProvider extends ServiceProvider {

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides() {
        return ['html', 'form'];
    }

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot() {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register() {
        $this->registerHtmlBuilder();
        $this->registerFormBuilder();
        $this->app->alias('html', 'App\Services\HtmlBuilder');
        $this->app->alias('form', 'App\Services\FormBuilder');
    }

    /**
     * Register the HTML builder instance.
     *
     * @return void
     */
    protected function registerHtmlBuilder() {
        $this->app->bindShared('html', function ($app) {
            return new HtmlBuilderCollective($app['url']);
        });
    }

    /**
     * Register the form builder instance.
     *
     * @return void
     */
    protected function registerFormBuilder() {
        $this->app->bindShared('form', function ($app) {
            $form = new FormBuilderCollective($app['html'], $app['url'], $app['session.store']->getToken());
            return $form->setSessionStore($app['session.store']);
        });
    }

}
