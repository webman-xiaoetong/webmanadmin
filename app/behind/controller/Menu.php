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
    public function clear()
    {

        return json([
            "code" => 1,
            "msg" => "服务端清理缓存成功"
        ]);
    }

// 获取初始化数据
    public function getSystemInit()
    {
        $homeInfo = [
            'title' => '首页',
            'href' => 'page/welcome-1.html?t=1',
        ];
        $logoInfo = [
            'title' => 'LAYUI MINI',
            'image' => 'images/logo.png',
            'href' => ''
        ];

        $menuInfo = $this->getMenuList();

        $systemInit = [
            'homeInfo' => $homeInfo,
            'logoInfo' => $logoInfo,
            'menuInfo' => $menuInfo,
        ];
        return json($systemInit);
    }

// 获取菜单列表
    private function getMenuList()
    {
        $menuList = DB::table('system_menu')
            ->select(['id', 'pid', 'title', 'icon', 'href', 'target'])
            ->where('status', 1)
            ->orderBy('sort', 'desc')
            ->get();
        $menuList = $this->buildMenuChild(0, $menuList);
        return $menuList;
    }

//递归获取子菜单
    private function buildMenuChild($pid, $menuList)
    {
        $treeList = [];
        foreach ($menuList as $v) {
            if ($pid == $v->pid) {
                $node = (array)$v;
                $child = $this->buildMenuChild($v->id, $menuList);
                if (!empty($child)) {
                    $node['child'] = $child;
                }
                // todo 后续此处加上用户的权限判断
                $treeList[] = $node;
            }
        }
        return $treeList;
    }
}