<?php

namespace app\controller\front;

use support\Request;

class User
{
    public function hello(Request $request)
    {
        $default_name = 'webman';
        // 从get请求里获得name参数，如果没有传递name参数则返回$default_name
        $name = $request->get('name', $default_name);
        $t = $request->get('t', 'txt');

        if ($t == 'txt') {
            // 向浏览器返回字符串
            return response('hello ' . $name);
        } else if ($t == 'html') {
            return view('user/hello', ['name' => $name]);
        }else if ($t='file'){
//            return response()->file(public_path() . '/favicon.ico');
            return response()->download(public_path() . '/favicon.ico', '可选的文件名.ico');
        }
        return json([
            'code' => 0,
            'msg' => 'ok',
            'data' => $name
        ]);

    }

    public function file(request $request)
    {
        $file = $request->file('upload');
        if ($file && $file->isValid()) {
            $file->move(public_path() . '/files/myfile.' . $file->getUploadExtension());
            return json(['code' => 0, 'msg' => 'upload success']);
        }

        return json(['code' => 1, 'msg' => 'file not found']);
    }


}