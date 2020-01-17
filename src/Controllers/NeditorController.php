<?php

namespace Wenslim\Neditor\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;

class NeditorController extends Controller
{
    public function server(Request $request)
    {
        $file = $request->file;
        $extension = $file->extension();
        $filename = Carbon::now()->format('Ymd') . str_random(10) . '.' . $extension;
        $url = $request->file->storeAs('neditor', $filename, 'neditor');

        return [
            'code' => 200,
            'url' => $url,
        ];
    }
}