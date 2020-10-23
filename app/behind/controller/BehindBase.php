<?php

namespace app\behind\controller;

use app\behind\model\PermissionModel;
use support\DB;
use app\core\controller\BaseController;

/**
 * 控制器基类
 * Class BehindBase
 * @package app\behind\webBase
 */
class BehindBase extends BaseController
{
    protected $session_key;

    protected function initialize()
    {
        $this->session_key = config('session.behind_prefix') . 'user';
    }

    // 获取初始化数据
    protected function getPermissionMenu()
    {
        $homeInfo = [
            'title' => '首页',
            'href' => '/behind/welcome?t=1',
        ];
        $logoInfo = [
            'title' => config('app.name'),
            'image' => '/images/logo.png',
            'href' => '/behind'
        ];

        $menuInfo = $this->getMenuList();

        $systemInit = [
            'homeInfo' => $homeInfo,
            'logoInfo' => $logoInfo,
            'menuInfo' => $menuInfo,
        ];

        //TODO: 缓存下 menu 菜单：

        return $systemInit;

        //return json($systemInit);
    }

    // 获取菜单列表
    private function getMenuList()
    {

        $menuList = PermissionModel::query()
            ->select(['id', 'pid', 'title', 'icon', 'href', 'target'])
            ->where('status', 1)
            ->orderBy('sort', 'desc')
            ->get()->toArray();

        $menuList = $this->buildMenuChild(0, $menuList);
        return $menuList;
    }

    //递归获取子菜单
    private function buildMenuChild($pid, $menuList)
    {
        $treeList = [];
        foreach ($menuList as $v) {
            if ($pid == $v['pid']) {
                $node = (array)$v;
                $child = $this->buildMenuChild($v['id'], $menuList);
                if (!empty($child)) {
                    $node['child'] = $child;
                }
                // todo 后续此处加上用户的权限判断


                $treeList[] = $node;
            }
        }
        return $treeList;
    }

    public function clear()
    {
        return json([
            "code" => 1,
            "msg" => "服务端清理缓存成功"
        ]);
    }
}
