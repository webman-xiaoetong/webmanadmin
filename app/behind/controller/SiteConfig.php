<?php

namespace app\behind\controller;


use app\behind\model\SiteModel;
use support\Request;

class SiteConfig extends BehindBase
{

    public function index()
    {
        $config = SiteModel::pluck('value','key');
        return view('admin.site.index',compact('config'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }

    public function update(Request $request)
    {
        $data = $request->except(['_token','_method']);
        if (empty($data)){
            return back()->withErrors(['status'=>'无数据更新']);
        }
        SiteModel::truncate();
        foreach ($data as $key=>$val){
            SiteModel::create([
                'key' => $key,
                'value' => $val
            ]);
        }
        return back()->with(['status'=>'更新成功']);
    }

    public function destroy($id)
    {
        //
    }
}
