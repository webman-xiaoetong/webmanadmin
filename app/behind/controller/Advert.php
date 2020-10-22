<?php

namespace app\behind\controller;

use app\behind\model\AdvertModel;
use app\behind\model\PositionModel;
use app\core\controller\BaseController;
use support\Request;

class Advert extends BehindBase
{

    public function index()
    {
        $positions = PositionModel::get();

        return view('admin.advert.index', compact('positions'));
    }

    public function data(Request $request)
    {
        $model = AdvertModel::query();
        if ($request->get('position_id')) {
            $model = $model->where('position_id', $request->get('position_id'));
        }
        if ($request->get('title')) {
            $model = $model->where('title', 'like', '%' . $request->get('title') . '%');
        }
        $res = $model->orderBy('sort', 'desc')->orderBy('id', 'desc')->with('position')->paginate($request->get('limit', 30))->toArray();
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
        //所有广告位置
        $positions = PositionModel::orderBy('sort', 'desc')->get();
        return view('admin.advert.create', compact('positions'));
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string',
            'sort' => 'required|numeric',
            'thumb' => 'required|string',
            'position_id' => 'required|numeric'
        ]);

        if (AdvertModel::create($request->all())) {
            return redirect(route('admin.advert'))->with(['status' => '添加完成']);
        }
        return redirect(route('admin.advert'))->with(['status' => '系统错误']);
    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $advert = AdvertModel::findOrFail($id);
        //所有广告位置
        $positions = PositionModel::orderBy('sort', 'desc')->get();
        foreach ($positions as $position) {
            $position->selected = $position->id == $advert->position_id ? 'selected' : '';
        }
        return view('admin.advert.edit', compact('positions', 'advert'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|string',
            'sort' => 'required|numeric',
            'thumb' => 'required|string',
            'position_id' => 'required|numeric'
        ]);
        $advert = AdvertModel::findOrFail($id);
        if ($advert->update($request->all())) {
            return redirect(route('admin.advert'))->with(['status' => '更新成功']);
        }
        return redirect(route('admin.advert'))->withErrors(['status' => '系统错误']);
    }


    public function destroy(Request $request)
    {
        $ids = $request->get('ids');
        if (empty($ids)) {
            return json(['code' => 1, 'msg' => '请选择删除项']);
        }
        if (Advert::destroy($ids)) {
            return json(['code' => 0, 'msg' => '删除成功']);
        }
        return json(['code' => 1, 'msg' => '删除失败']);
    }

}