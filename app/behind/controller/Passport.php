<?php

namespace app\behind\controller;

use support\Request;

class Passport extends BehindBase
{
    private $session_key;

    public function __construct()
    {

        parent::__construct();

        $this->session_key = config('session.behind_prefix') . 'user';
    }

    public function index(Request $request)
    {
        //已经登录直接跳转
        $user = $request->session()->get($this->session_key);
        if (is_array($user) && $user['uid'] > 0) {
            return redirect('/behind');
        }

        return view('passport/index', ['name' => 'webman']);
    }

    public function login(Request $request)
    {

        //数据库查询成功 写session
        $request->session()->put($this->session_key, [
            'uid' => 1,
            'username' => 'frans',
            'login_auth' => 'zxczxc'
        ]);

        return json(['code' => 200, 'msg' => 'OK', 'data' => []]);
    }

    public function logout(Request $request)
    {
        $request->session()->delete($this->session_key);
        return redirect("/behind");
    }

}
