<?php

namespace app\core\controller;

use support\Request;

/**
 * 控制器基类
 * Class webBase
 * @package app\webBase
 */
class BaseController
{
    public function __construct()
    {
        // 控制器初始化
        $this->initialize();
    }

    // 初始化
    protected function initialize()
    {
    }


    protected function validate(Request $request, $rule = [], $msg = [])
    {

    }
}
