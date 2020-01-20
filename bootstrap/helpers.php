<?php

# 资源文件
if (! function_exists("neditor_assets")) {
    function neditor_assets()
    {
        # 上传配置
        $server = route('neditor.server');
        $imageUrlPrefix = config('neditor.imageUrlPrefix');

        # 用户配置
        $width = config('neditor.width');
        $height = config('neditor.height');
        $toolbars = json_encode(config('neditor.toolbars'));
        $initialContent = config('neditor.initialContent');
        $imageMaxSize = config('neditor.imageMaxSize');

        return <<<assets
        <script src="/vendor/neditor/neditor.config.js"></script>
        <script src="/vendor/neditor/neditor.all.min.js"></script>
        <script src="/vendor/neditor/neditor.service.js"></script>
        <script src="/vendor/neditor/third-party/browser-md5-file.min.js"></script>
        <script src="/vendor/neditor/third-party/jquery-1.10.2.min.js"></script>
        
<script>
    let toolbars = '{$toolbars}'.split(",");
    let toolbarsArr = JSON.parse(toolbars);
    let neditor = UE.getEditor('neditor', {
        serverUrl: '{$server}',
        imageUrlPrefix: '{$imageUrlPrefix}',
        initialFrameWidth: '{$width}',
        initialFrameHeight: '{$height}',
        toolbars: [toolbarsArr],
        initialContent: '{$initialContent}',
        imageMaxSize: '{$imageMaxSize}',
    });
</script>
assets;
    }
}