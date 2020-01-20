<?php

namespace Wenslim\Neditor\Providers;

use Illuminate\Support\ServiceProvider;
use Wenslim\Neditor\Libraries\Qiniu;

class NeditorServiceProvider extends ServiceProvider
{
    public function boot()
    {
        # 配置文件 & 发布资源文件
        $this->publishes([
            __DIR__ . '/../../config/neditor.php' => config_path('neditor.php'),
            __DIR__ . '/../../assets/'            => public_path('vendor/neditor'),
        ], 'publish');

        # 发布路由
        $this->loadRoutesFrom(__DIR__ . '/../../bootstrap/routes.php');
    }

    public function register()
    {
        $this->app->singleton(Qiniu::class, function () {
            return new Qiniu(
                config('filesystems.disks.qiniu.access_key'),
                config('filesystems.disks.qiniu.secret_key'),
                config('filesystems.disks.qiniu.bucket')
            );
        });
    }
}