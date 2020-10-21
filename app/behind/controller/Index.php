<?php

namespace app\behind\controller;

use support\Request;
use app\core\controller\BaseController;

class Index extends BaseController
{
    public function index(Request $request)
    {
        return view('index/index', ['name' => 'webman']);
    }

    public function file(Request $request)
    {
        $file = $request->file('upload');
        if ($file && $file->isValid()) {
            $file->move(public_path() . '/files/myfile.' . $file->getUploadExtension());
            return json(['code' => 0, 'msg' => 'upload success']);
        }
        return json(['code' => 1, 'msg' => 'file not found']);
    }

}
