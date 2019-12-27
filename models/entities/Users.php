<?php

namespace app\models\entities;

use app\models\Model;

class Users extends Model
{
    protected $id;
    protected $login;
    protected $password;
    protected $hash;
    protected $props = [
        'id' => false,
        'login' => false,
        'password' => false,
        'hash' => false
    ];

    public function __construct($login = null, $password = null, $hash = null)
    {
        $this->login = $login;
        $this->password = $password;
        $this->hash = $hash;
    }
}