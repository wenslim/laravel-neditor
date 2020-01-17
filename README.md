# laravel-neditor

neditor for Laravel 5.5+

# 使用

> `neditor`: [官方地址](https://github.com/notadd/neditor)

## 安装

```shell
$ composer require wenslim/neditor
```

## 配置

生成配置与资源文件

```php
$ php artisan vendor:publish --provider="Wenslim\Neditor\NeditorServiceProvider"
```

## 图片上传

配置图片上传至本地

`config/filesystems.php`
```php
.
.
.

'disks' => [
    'neditor' => [
        'driver' => 'local',
        'root' => public_path('images'),
    ],
],
```

## 模板

```php
.
.
.
<body>
    <div id="neditor"></div>
</body>

{!! neditor_assets() !!}
```

# 说明

1. 配置项可在 `config/neditor.php` 中自定义
2. 请在 `.env` 中正确配置 `APP_URL` 为你的当前域名，否则可能上传成功了，但是无法正确显示。

# License

MIT