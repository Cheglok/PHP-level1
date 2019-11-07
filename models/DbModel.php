<?php


namespace app\models;

use app\engine\Db;

abstract class DbModel extends Model
{
    protected $id;
    public $changedFields = [];

    public function __set($prop, $value)
    {
        $this->$prop= $value;
        $this->changedFields[] = $prop;
    }

    public function getLimit($from, $to) {

    }

    public function getWhere($name, $value) {

    }

    public function insert()
    {
        $tableName = $this->getTableName();
        $params=[];
        $columns=[];
        foreach ($this as $key => $value) {
            if ($key == "id" || $key == "changedFields") continue;
            $params[":{$key}"] = $value;
            $columns[] = "`{$key}`";
        }
        $columns = implode(', ', $columns);
        $values = implode(', ', array_keys($params));
        $sql = "INSERT INTO `{$tableName}` ($columns) VALUES ($values)";
        Db::getInstance()->execute($sql, $params);
        $this->id = Db::getInstance()->lastInsertId();
        return $this;
    }

    public function update()
    {
        $tableName = $this->getTableName();
        $params=[];
        foreach ($this as $key => $value) {
            if(in_array($key, $this->changedFields)) {
                $params[] = "`{$key}`='{$value}'";
            }
        }
        $params = implode(', ', $params);
        $sql = "UPDATE `{$tableName}` SET  $params WHERE id = :id";
        Db::getInstance()->execute($sql, ['id' => $this->id]);
    }

    public function delete()
    {
        $tableName = static::getTableName();
        $sql = "DELETE FROM `{$tableName}` WHERE id = :id";
        Db::getInstance()->execute($sql, ['id' => $this->id]);
        return $this;
    }

    public function save() {
        if (is_null($this->id))
            $this->insert();
        else
            $this->update();
    }

    public static function getOne($id)
    {
        $className = static::class;
        $tableName = static::getTableName();
        $sql = "SELECT * FROM `{$tableName}` WHERE id = :id";
        $product = Db::getInstance()->queryObject($sql, ['id' => $id], $className);
        return $product;
    }

    public static function queryOne($id)
    {
        $className = static::class;
        $tableName = static::getTableName();
        $sql = "SELECT * FROM `{$tableName}` WHERE id = :id";
        return Db::getInstance()->queryOne($sql, ['id' => $id], $className);
    }

    public static function getAll()
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM `{$tableName}`";
        return Db::getInstance()->queryAll($sql);
    }

    abstract public static function getTableName();
}