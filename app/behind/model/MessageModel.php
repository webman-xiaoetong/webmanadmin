<?php

namespace app\behind\model;


use app\core\model\BaseModel;

class MessageModel extends BaseModel
{
    protected $table = 'messages';

    protected $fillable = ['title','content','read','send_uuid','accept_uuid','flag'];

    public $read_status=[
        '1'=>'未读',
        '2'=>'已读'
    ];

}
