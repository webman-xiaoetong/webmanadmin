<?php

namespace app\behind\model;

use app\core\model\BaseModel;

class PermissionModel extends BaseModel
{

    protected $table = 'permissions';

    //子权限
    public function childs()
    {
        return $this->hasMany('app\behind\model\PermissionModel', 'parent_id', 'id');
    }

}