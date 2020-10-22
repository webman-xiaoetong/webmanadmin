<?php

namespace app\behind\controller;

use app\behind\model\RoleModel;
use support\Request;

class Role extends BehindBase
{

    public function index()
    {
        return view('admin.role.index');
    }

    public function create()
    {
        return view('admin.role.create');
    }


    public function store(Request $request)
    {
        $data = $request->only(['name', 'display_name']);
        if (RoleModel::create($data)) {
            return redirect()->to(route('admin.role'))->with(['status' => '添加角色成功']);
        }
        return redirect()->to(route('admin.role'))->withErrors('系统错误');
    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $role = Role::findOrFail($id);
        return view('admin.role.edit', compact('role'));
    }

    public function update(Request $request, $id)
    {
        $role = RoleModel::findOrFail($id);
        $data = $request->only(['name', 'display_name']);
        if ($role->update($data)) {
            return redirect()->to(route('admin.role'))->with(['status' => '更新角色成功']);
        }
        return redirect()->to(route('admin.role'))->withErrors('系统错误');
    }


    public function destroy(Request $request)
    {
        $ids = $request->get('ids');
        if (empty($ids)) {
            return json(['code' => 1, 'msg' => '角色不可删除']);
        }

        if (RoleModel::destroy($ids)) {
            return json(['code' => 0, 'msg' => '删除成功']);
        }
        return json(['code' => 1, 'msg' => '删除失败']);
    }

    /**
     * 分配权限
     */
    public function permission(Request $request, $id)
    {
        $role = RoleModel::findOrFail($id);
        $permissions = $this->tree();
        foreach ($permissions as $key1 => $item1) {
            $permissions[$key1]['own'] = $role->hasPermissionTo($item1['id']) ? 'checked' : false;
            if (isset($item1['_child'])) {
                foreach ($item1['_child'] as $key2 => $item2) {
                    $permissions[$key1]['_child'][$key2]['own'] = $role->hasPermissionTo($item2['id']) ? 'checked' : false;
                    if (isset($item2['_child'])) {
                        foreach ($item2['_child'] as $key3 => $item3) {
                            $permissions[$key1]['_child'][$key2]['_child'][$key3]['own'] = $role->hasPermissionTo($item3['id']) ? 'checked' : false;
                        }
                    }
                }
            }

        }
        return view('admin.role.permission', compact('role', 'permissions'));
    }

    /**
     * 存储权限
     */
    public function assignPermission(Request $request, $id)
    {
        $role = RoleModel::findOrFail($id);
        $permissions = $request->get('permissions');

        if (empty($permissions)) {
            $role->permissions()->detach();
            return redirect()->to(route('admin.role'))->with(['status' => '已更新角色权限']);
        }
        $role->syncPermissions($permissions);
        return redirect()->to(route('admin.role'))->with(['status' => '已更新角色权限']);
    }

}