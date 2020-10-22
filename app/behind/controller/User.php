<?php

namespace app\behind\controller;

use app\behind\model\TagModel;
use support\Request;

class User extends BehindBase
{

    public function index()
    {
        return view('admin.tag.index');
    }

    public function data(Request $request)
    {
        $res = TagModel::orderBy('id', 'desc')->orderBy('sort', 'desc')->paginate($request->get('limit', 30))->toArray();
        $data = [
            'code' => 0,
            'msg' => '正在请求中...',
            'count' => $res['total'],
            'data' => $res['data']
        ];
        return json($data);
    }


    public function create()
    {
        return view('admin.tag.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'sort' => 'required|numeric'
        ]);
        if (TagModel::create($request->all())) {
            return redirect(route('admin.tag'))->with(['status' => '添加完成']);
        }
        return redirect(route('admin.tag'))->with(['status' => '系统错误']);
    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $tag = TagModel::findOrFail($id);
        return view('admin.tag.edit', compact('tag'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'sort' => 'required|numeric'
        ]);
        $tag = TagModel::findOrFail($id);
        if ($tag->update($request->only(['name', 'sort']))) {
            return redirect(route('admin.tag'))->with(['status' => '更新成功']);
        }
        return redirect(route('admin.tag'))->withErrors(['status' => '系统错误']);
    }


    public function destroy(Request $request)
    {
        $ids = $request->get('ids');
        if (empty($ids)) {
            return json(['code' => 1, 'msg' => '请选择删除项']);
        }
        if (TagModel::destroy($ids)) {
            return json(['code' => 0, 'msg' => '删除成功']);
        }
        return json(['code' => 1, 'msg' => '删除失败']);
    }


}