<?php

namespace app\behind\controller;

use app\core\controller\BaseController;
use support\Db;
use support\Request;

/**
 * 菜单
 * Class MenuController
 * @package app\webBase
 */
class Menu extends BehindBase
{
    public function index()
    {
        $menu = $this->getPermissionMenu();
        return json($menu);
    }
}