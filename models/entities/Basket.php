<?php
namespace app\models\entities;

use app\engine\Db;
use app\models\Model;

class Basket extends Model
{
    protected $goods_id;
    protected $session_id;
    protected $props = [
        'goods_id' =>false,
        'session_id' =>false
    ];

    public function __construct($session_id=null, $goods_id=null)
    {
        $this->goods_id = $goods_id;
        $this->session_id = $session_id;
    }
}