<?php

namespace Kometsoft\VoltPreset;

// use Illuminate\Support\Arr;
use Laravel\Ui\Presets\Preset;
use Illuminate\Support\Facades\File;

class VoltPreset extends Preset
{
    public static function install()
    {
        static::cleanDirectory();
        static::updatePackages();
        static::updateViteConfigurations();
        static::updateSass();
        static::updateJs();
        static::updateVueComponent();
        static::removeNodeModules();
    }

    public static function cleanDirectory()
    {
        File::deleteDirectory(resource_path('css'));
        File::cleanDirectory(resource_path('sass'));
        File::cleanDirectory(resource_path('js'));
    }

    public static function updatePackageArray($packages)
    {
        return array_merge(
            [
                '@popperjs/core' => '^2.11.8',
                '@tabler/core' => '^1.0.0-beta20',
                '@vitejs/plugin-vue' => '^4.0.0',
                'axios' => '^1.1.2',
                'bootstrap' => '^5.3.1',
                'laravel-vite-plugin' => '^0.8.0',
                'litepicker' => '^2.0.12',
                'sass' => '^1.56.1',
                'tom-select' => '^2.2.2',
                'vite' => '^4.0.0',
                'vue' => '^3.2.37',
            ],
            // Arr::except($packages, [])
        );
    }

    public static function updateViteConfigurations()
    {
        copy(__DIR__ . '/stubs/vite.config.js', base_path('vite.config.js'));
    }

    public static function updateSass()
    {
        File::copyDirectory(__DIR__ . '/stubs/sass', resource_path('sass'));
    }

    public static function updateJs()
    {
        File::copyDirectory(__DIR__ . '/stubs/js', resource_path('js'));
    }

    public static function updateVueComponent()
    {
        File::copyDirectory(__DIR__ . '/stubs/components', resource_path('components'));
    }
}
