<?php

namespace app\behind\controller;

use support\Request;

class Login extends BehindBase
{
    public function index(Request $request)
    {
        return view('login/index', ['name' => 'webman']);
    }
}
