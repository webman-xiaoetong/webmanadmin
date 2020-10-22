<?php

namespace app\core\controller;

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
}
