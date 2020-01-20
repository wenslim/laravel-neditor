# laravel-neditor

## 简介

`Neditor` 是基于 `Ueditor` 的一款现代化界面的富文本编辑器

官方演示: [demo](https://demo.neditor.notadd.com/)

此项目为 `neditor` 的扩展针对 Laravel 5.5+

## 使用

> `neditor`: [官方地址](https://github.com/notadd/neditor)

![效果](https://www.notadd.com/src/neditor-demo.webp)

### 安装

```shell
$ composer require wenslim/neditor
```

### 配置

生成配置与资源文件

```php
$ php artisan vendor:publish --provider="Wenslim\Neditor\Providers\NeditorServiceProvider"
```

### 图片上传

#### 本地上传

修改配置
`config/neditor.php`
```php
return [
    .
    .
    .
    'uploadType' => 'local',
    'imageUrlPrefix' => 'https://your-domain/',
];
```
定义存储
`config/filesystems.php`
```php
.
.
.

'disks' => [
    .
    .
    .
    'neditor' => [
        'driver' => 'local',
        'root' => public_path('images'),
    ],
],
```

#### 七牛云
修改配置
`config/neditor.php`
```php
return [
    .
    .
    .
    'uploadType' => 'qiniu',
    'imageUrlPrefix' => 'https://你的七牛加速地址/',
];
```
定义存储
`config/filesystems.php`
```php
.
.
.

'disks' => [
    .
    .
    .
    'qiniu' => [
        'access_key' => env('QINIU_ACCESS_KEY'),
        'secret_key' => env('QINIU_SECRET_KEY'),
        'bucket'     => env('QINIU_BUCKET'),
        'domain'     => env('QINIU_DOMAIN'),
    ],
],
```
```text
QINIU_ACCESS_KEY=xxxxxx
QINIU_SECRET_KEY=xxxxxx
QINIU_BUCKET=xxxxxx # 如: images
QINIU_DOMAIN=xxxxxx # 如: images.your-domian.com
```

### 模板

```php
.
.
.
<body>
    <textarea id="neditor" name="content"></textarea>
</body>

{!! neditor_assets() !!}
```

## 说明

1. 配置项可在 `config/neditor.php` 中自定义
2. 对于上传图片成功，但是无法正确显示请检查网络请求与你的配置是否正确

# License

MIT