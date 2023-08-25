<?php

namespace Kometsoft\VoltPreset;

use Laravel\Ui\UiCommand;
use Illuminate\Support\ServiceProvider;

class VoltPresetServiceProvider extends ServiceProvider
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
        UiCommand::macro('volt', function (UiCommand $command) {
            VoltPreset::install();

            $command->info('Volt scaffolding installed successfully. 🔥');

            $command->warn('Please run [npm install && npm run build] to compile your fresh scaffolding.');
        });
    }
}
