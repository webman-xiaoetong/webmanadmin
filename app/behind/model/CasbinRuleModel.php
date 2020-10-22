<?php


namespace app\behind\model;


use app\core\model\BaseModel;

/**
 * Casbin Model
 * Class CasbinRuleModel
 * @package app\behind\model
 */
class CasbinRuleModel extends BaseModel
{
    protected $table = 'rules';
    public $timestamps = false;
}