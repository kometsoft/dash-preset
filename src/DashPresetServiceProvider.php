<?php

namespace Kometsoft\DashPreset;

use Laravel\Ui\UiCommand;
use Illuminate\Support\ServiceProvider;

class DashPresetServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        UiCommand::macro('dash', function (UiCommand $command) {
            DashPreset::install();

            $command->info('Dash scaffolding installed successfully.');

            $command->warn('Please run [npm install && npm run dev] to compile your fresh scaffolding.');
        });
    }
}
