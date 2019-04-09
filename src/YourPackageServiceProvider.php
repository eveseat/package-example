<?php
/*
This file is part of SeAT

Copyright (C) 2015, 2017, 2018, 2019  Leon Jacobs

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License along
with this program; if not, write to the Free Software Foundation, Inc.,
51 Franklin Street, Fifth Floor, Boston, MA 02110-1301 USA.
*/

namespace Author\Seat\YourPackage;

use Illuminate\Routing\Router;
use Seat\Services\AbstractSeatPlugin;

/**
 * Class EveapiServiceProvider
 * @package Author\Seat\YourPackage
 */
class YourPackageServiceProvider extends AbstractSeatPlugin
{

    /**
     * Bootstrap the application services.
     *
     * @param \Illuminate\Routing\Router $router
     */
    public function boot(Router $router)
    {

        // Include the Routes
        $this->add_routes();

        // Inform Laravel how to load migrations
        $this->add_migrations();

        // Add the views for the 'web' namespace
        $this->add_views();

        // Include our translations
        $this->add_translations();

    }

    /**
     * Include the routes
     */
    public function add_routes()
    {

        if (!$this->app->routesAreCached())
            include __DIR__ . '/Http/routes.php';
    }

    /**
     * Set the path for migrations which should
     * be migrated by laravel. More informations:
     * https://laravel.com/docs/5.5/packages#migrations.
     */
    private function add_migrations()
    {

        $this->loadMigrationsFrom(__DIR__ . '/database/migrations/');
    }

    /**
     * Set the path and namespace for the vies
     */
    public function add_views()
    {

        $this->loadViewsFrom(__DIR__ . '/resources/views', 'yourpackage');
    }

    /**
     * Include the translations and set the namespace
     */
    public function add_translations()
    {

        $this->loadTranslationsFrom(__DIR__ . '/lang', 'yourpackage');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {

        // Merge the config with anything in the main app
        // Web package configurations
        $this->mergeConfigFrom(
            __DIR__ . '/Config/yourpackage.config.php', 'yourpackage.config');
        $this->mergeConfigFrom(
            __DIR__ . '/Config/yourpackage.permissions.php', 'web.permissions');
        $this->mergeConfigFrom(
            __DIR__ . '/Config/yourpackage.locale.php', 'web.locale');

        // Menu Configurations
        $this->mergeConfigFrom(
            __DIR__ . '/Config/yourpackage.sidebar.php', 'package.sidebar');

    }

    /**
     * Return the plugin public name as it should be displayed into settings.
     *
     * @example SeAT Web
     *
     * @return string
     */
    public function getName(): string
    {
        // TODO: Implement getName() method.
    }

    /**
     * Return the plugin repository address.
     *
     * @example https://github.com/eveseat/web
     *
     * @return string
     */
    public function getPackageRepositoryUrl(): string
    {
        // TODO: Implement getPackageRepositoryUrl() method.
    }

    /**
     * Return the plugin technical name as published on package manager.
     *
     * @example web
     *
     * @return string
     */
    public function getPackagistPackageName(): string
    {
        // TODO: Implement getPackagistPackageName() method.
    }

    /**
     * Return the plugin vendor tag as published on package manager.
     *
     * @example eveseat
     *
     * @return string
     */
    public function getPackagistVendorName(): string
    {
        // TODO: Implement getPackagistVendorName() method.
    }

    /**
     * Return the plugin installed version.
     *
     * @return string
     */
    public function getVersion(): string
    {
        // TODO: Implement getVersion() method.
    }
}
