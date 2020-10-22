<?php

namespace app\behind\model;


use app\core\model\BaseModel;

class CategoryModel extends BaseModel
{

    protected $table = 'category';

    protected $fillable = ['name', 'sort', 'parent_id'];

    //子分类
    public function childs()
    {
        return $this->hasMany('app\behind\model\CategoryModel', 'parent_id', 'id');
    }

    //所有子类
    public function allChilds()
    {
        return $this->childs()->with('allChilds');
    }

    //分类下所有的文章
    public function articles()
    {
        return $this->hasMany('app\behind\model\ArticleModel');
    }

}
