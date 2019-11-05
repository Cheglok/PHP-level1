<?php

namespace app\models;

use app\engine\Db;
use app\interfaces\IModels;

abstract class Model implements IModels
{
    protected $db;

    public function __construct()
    {
        $this->db = Db::getInstance();
    }

    public function insert()
    {
        $tableName = $this->getTableName();
        $fields = $this->prepareFields("key");
        $values = $this->prepareFields("value");
        $params = $this->prepareFields("params");
        $sql = "INSERT INTO `{$tableName}` ($fields) VALUES ($values)";
        $this->id = $this->db->insert($sql, $params);
    }

    private function prepareFields($field)
        // Приведённый в методичке PDO1 РАЗДЕЛ "PDO и запросы INSERT/UPDATE" не понял, написал свой метод.
    {
        $result = null;
        $params = [];
        foreach ($this as $key => $value) {
            if ($key == "db" || $key == "id") {
                continue;
            }
            if ($field == "key") {
                $result .= "`${$field}`, ";
            } else if ($field == "value") {
                $result .= ":$key, ";
            } else {
                $params[$key] = $value;
            }
        }
        if (is_null($result)) {
            return $params;
        }
        return substr($result, 0, -2);
    }

    public function delete()
    {
        $tableName = $this->getTableName();
        $sql = "DELETE FROM `{$tableName}` WHERE id = :id";
        $id = $this->id;
        $this->db->delete($sql, ['id' => $id]);
    }

    public function update()
    {

    }

    public function getOne($id)
    {
        $className = $this->getClass();
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM `{$tableName}` WHERE id = :id";
        $product = $this->db->queryOne($sql, ['id' => $id], $className);
        return $product;
    }

    public function getAll()
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM `{$tableName}`";
        return $this->db->queryAll($sql);
    }

    abstract public function getTableName();
    abstract public function getClass();

}