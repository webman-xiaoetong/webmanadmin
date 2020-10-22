<?php

namespace app\behind\model;

use app\core\model\BaseModel;

class AdvertModel extends BaseModel
{

    protected $fillable = ['title','thumb','link','position_id','sort','description'];
    //广告所在的位置信息
    public function position()
    {
        return $this->belongsTo('App\Models\Position');
    }

}
