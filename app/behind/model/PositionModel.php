<?php

namespace app\behind\model;


use app\core\model\BaseModel;

class PositionModel extends BaseModel
{
    protected $table = 'positions';

    protected $fillable = ['name', 'sort'];

    //该位置下所有的广告
    public function adverts()
    {
        return $this->hasMany('app\behind\model\AdvertModel');
    }

}
