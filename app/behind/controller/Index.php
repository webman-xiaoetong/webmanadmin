<?php

namespace app\behind\controller;

use support\Request;

class Index extends BehindBase
{

    public function index()
    {
        return view('index/index');
    }

    public function welcome()
    {
        return view('index/welcome');
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
