<?php

namespace app\behind\model;


use app\core\model\BaseModel;

class TagModel extends BaseModel
{
    protected $table = 'tags' ;

    //与文章多对多关联
    public function articles()
    {
        return $this->belongsToMany('app\behind\model\ArticleModel', 'article_tag', 'tag_id', 'article_id');
    }

}
