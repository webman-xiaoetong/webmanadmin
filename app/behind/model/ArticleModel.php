<?php

namespace app\behind\model;


use app\core\model\BaseModel;

class ArticleModel extends BaseModel
{
    protected $fillable = ['category_id','title','keywords','description','content','thumb','click'];

    //文章所属分类
    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    //与标签多对多关联
    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag','article_tag','article_id','tag_id');
    }


}
