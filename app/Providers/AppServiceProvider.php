<?php
/**
 * ProBIND v3 - Professional DNS management made easy.
 *
 * Copyright (c) 2016 by Paco Orozco <paco@pacoorozco.info>
 *
 * This file is part of some open source application.
 *
 * Licensed under GNU General Public License 3.0.
 * Some rights reserved. See LICENSE, AUTHORS.
 *
 * @author      Paco Orozco <paco@pacoorozco.info>
 * @copyright   2016 Paco Orozco
 * @license     GPL-3.0 <http://spdx.org/licenses/GPL-3.0>
 * @link        https://github.com/pacoorozco/probind
 */

namespace App\Providers;

use App\Models\ResourceRecord;
use App\Models\Zone;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Touch Zone when save/delete a ResourceRecord
        ResourceRecord::saving(function (ResourceRecord $record) {
            /** @var Zone $zone */
            $zone = $record->zone()->first();
            $zone->has_modifications = true;
        });
        ResourceRecord::deleting(function (ResourceRecord $record) {
            /** @var Zone $zone */
            $zone = $record->zone()->first();
            $zone->has_modifications = true;
        });
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
