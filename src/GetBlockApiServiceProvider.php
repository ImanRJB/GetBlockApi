<?php

namespace GetBlockApi;

use Illuminate\Support\ServiceProvider;

class GetBlockApiServiceProvider extends ServiceProvider
{
    public function register()
    {
        // For load config files
        if (file_exists(__DIR__ . '/../src/config/getblock.php')) {
            $this->mergeConfigFrom(__DIR__ . '/../src/config/getblock.php', 'getblock');
        }
    }
}
