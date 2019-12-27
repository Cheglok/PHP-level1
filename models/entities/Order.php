<?php

namespace app\models\entities;

use app\models\Model;

class Order extends Model
{
    protected $id;
    protected $session_id;
    protected $tel;
    protected $email;
    protected $status;
    protected $props = [
        'session_id' => false,
        'tel' => false,
        'email' => false,
        'status' => false
    ];

    public function __construct($session_id = null, $tel = null, $email = null, $status = 'new')
    {
        $this->session_id = $session_id;
        $this->tel = $tel;
        $this->email = $email;
        $this->status = $status;
    }
}