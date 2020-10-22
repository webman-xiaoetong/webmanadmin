<?php

namespace app\behind\controller;

use app\behind\model\ArticleModel;
use app\behind\model\CategoryModel;
use support\Request;

class Article extends BehindBase
{

    public function index()
    {
        //分类
        $categorys = Category::with('allChilds')->where('parent_id',0)->orderBy('sort','desc')->get();
        return view('article.index',compact('categorys'));
    }

    public function data(\Illuminate\Http\Request $request)
    {

        $model =  ArticleModel::query();
        if ($request->get('category_id')){
            $model = $model->where('category_id',$request->get('category_id'));
        }
        if ($request->get('title')){
            $model = $model->where('title','like','%'.$request->get('title').'%');
        }
        $res = $model->orderBy('created_at','desc')->with(['tags','category'])->paginate($request->get('limit',30))->toArray();
        $data = [
            'code' => 0,
            'msg'   => '正在请求中...',
            'count' => $res['total'],
            'data'  => $res['data']
        ];
        return json($data);
    }


    public function create()
    {
        //分类
        $categorys = CategoryModel::with('allChilds')->where('parent_id',0)->orderBy('sort','desc')->get();
        //标签
        $tags = TagModel::get();
        return view('admin.article.create',compact('tags','categorys'));
    }

    public function store(ArticleRequest $request)
    {
        $data = $request->only(['category_id','title','keywords','description','content','thumb','click']);
        $article = Article::create($data);
        if ($article && !empty($request->get('tags')) ){
            $article->tags()->sync($request->get('tags'));
        }
        return redirect(route('admin.article'))->with(['status'=>'添加成功']);
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $article = Article::with('tags')->findOrFail($id);
        if (!$article){
            return redirect(route('admin.article'))->withErrors(['status'=>'文章不存在']);
        }
        //分类
        $categorys = Category::with('allChilds')->where('parent_id',0)->orderBy('sort','desc')->get();
        //标签
        $tags = Tag::get();
        foreach ($tags as $tag){
            $tag->checked = $article->tags->contains($tag) ? 'checked' : '';
        }
        return view('admin.article.edit',compact('article','categorys','tags'));

    }


    public function update(Request $request, $id)
    {
        $article = Article::with('tags')->findOrFail($id);
        $data = $request->only(['category_id','title','keywords','description','content','thumb','click']);
        if ($article->update($data)){
            $article->tags()->sync($request->get('tags',[]));
            return redirect(route('admin.article'))->with(['status'=>'更新成功']);
        }
        return redirect(route('admin.article'))->withErrors(['status'=>'系统错误']);
    }

    public function destroy(Request $request)
    {
        $ids = $request->get('ids');
        if (empty($ids)){
            return json(['code'=>1,'msg'=>'请选择删除项']);
        }
        foreach (Article::whereIn('id',$ids)->get() as $model){
            //清除中间表数据
            $model->tags()->sync([]);
            //删除文章
            $model->delete();
        }
        return json(['code'=>0,'msg'=>'删除成功']);
    }

}