<?php

namespace Kometsoft\DashPreset;

// use Illuminate\Support\Arr;
use Laravel\Ui\Presets\Preset;
use Illuminate\Support\Facades\File;

class DashPreset extends Preset
{
    public static function install()
    {
        static::cleanDirectory();
        static::updatePackages();
        static::updateViteConfigurations();
        static::updateCss();
        static::updateJs();
        static::removeNodeModules();
    }

    public static function cleanDirectory()
    {
        File::cleanDirectory(resource_path('css'));
        File::cleanDirectory(resource_path('js'));
    }

    public static function updatePackageArray($packages)
    {
        return array_merge(
            [
                'laravel-vite-plugin' => '^0.7.5',
                'vite' => '^4.0.0',
                'vue' => '3.0.0',
            ],
            // Arr::except($packages, [])
        );
    }

    public static function updateViteConfigurations()
    {
        copy(__DIR__ . '/stubs/vite.config.js', base_path('vite.config.js'));
    }

    public static function updateCss()
    {
        copy(__DIR__ . '/stubs/css', resource_path('css'));
    }

    public static function updateJs()
    {
        copy(__DIR__ . '/stubs/js', resource_path('js'));
    }
}
