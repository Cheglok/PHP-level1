<?php

namespace app\models;

abstract class Model
{
    protected $id;
    protected $props;

    public function __set($prop, $value)
    {
        if (array_key_exists($prop, $this->props)) {
            $this->$prop = $value;
            $this->props[$prop] = true;
        }
    }

    public function __get($prop)
    {
        return $this->$prop;
    }

    public function __isset($name)
    {
        return isset($this->name);
    }
}