<?php

namespace Wenslim\Neditor\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Wenslim\Neditor\Libraries\Qiniu;

class NeditorController extends Controller
{
    public function server(Request $request, Qiniu $qiniu)
    {
        $file = $request->file;
        $extension = $file->extension();
        $filename = Carbon::now()->format('Ymd') . str_random(10) . '.' . $extension;

        # 上传方式
        $uploadType = config('neditor.uploadType');
        switch ($uploadType) {
            case 'local':
                $url = $request->file->storeAs('neditor', $filename, 'neditor');
                break;
            case 'qiniu':
                $url = $qiniu->upload($file, $filename);
                break;
        }

        return [
            'code' => 200,
            'url' => $url,
        ];
    }
}