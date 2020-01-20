<?php

namespace Wenslim\Neditor\Libraries;

use Carbon\Carbon;
use Qiniu\Auth;
use Qiniu\Storage\UploadManager;

class Qiniu
{
    private $accessKey;
    private $secretKey;
    private $bucket;

    public function __construct($accessKey, $secretKey, $bucket)
    {
        $this->accessKey = $accessKey;
        $this->secretKey = $secretKey;
        $this->bucket = $bucket;
    }

    /**
     * 上传文件
     *
     * @param $file
     * @param $filename
     * @return mixed
     * @throws \Exception
     */
    public function upload($file, $filename)
    {
        # 鉴权
        $auth = new Auth($this->accessKey, $this->secretKey);
        $token = $auth->uploadToken($this->bucket);

        # 文件路径
        $filePath = $file->getRealPath();

        # 初始化上传类 & 上传文件
        $uploadMgr = new UploadManager();

        list($ret, $err) = $uploadMgr->putFile($token, $filename, $filePath);
        if ($err !== null) {
            return $err;
        } else {
            return $ret['key'];
        }
    }
}