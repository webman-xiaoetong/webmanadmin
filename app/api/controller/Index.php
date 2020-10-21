<?php

namespace app\api\controller;

use support\Request;

class Index extends ApiBase
{
    public function index(Request $request)
    {
        return json(['code' => 0, 'msg' => 'ok', 'data' => '']);
    }
}
