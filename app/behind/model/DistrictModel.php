<?php

namespace app\behind\model;


use app\core\model\BaseModel;

class DistrictModel extends BaseModel
{
    protected $table = 'districts';

    protected $fillable = ['citycode','adcode','name','center','level'];
}
