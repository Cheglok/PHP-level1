<?php


namespace app\models\entities;

use app\models\Model;


class Order extends Model
{
    protected $session_id;
    protected $tel;
    protected $email;
    protected $props = [
        'session_id' =>false,
        'tel' =>false,
        'email' =>false
    ];

    public function __construct($session_id=null, $tel=null, $email=null)
    {
        $this->session_id = $session_id;
        $this->tel = $tel;
        $this->email = $email;
    }
}