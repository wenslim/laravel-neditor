<?php

namespace Wenslim\Neditor;

use Illuminate\Support\ServiceProvider;

class NeditorServiceProvider extends ServiceProvider
{
    public function boot()
    {
        # 配置文件 & 发布资源文件
        $this->publishes([
            __DIR__ . '/../config/neditor.php' => config_path('neditor.php'),
            __DIR__ . '/../assets/'            => public_path('vendor/neditor'),
        ], 'publish');

        # 发布路由
        $this->loadRoutesFrom(__DIR__ . '/../bootstrap/routes.php');
    }
}