<?php

namespace app\controller\admin;

use support\Request;

class Foo
{
    public function index(Request $request)
    {
        return response('hello index');
    }

    public function hello(Request $request)
    {
        return response('hello webman');
    }
}

