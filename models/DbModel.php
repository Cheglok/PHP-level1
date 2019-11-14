<?php


namespace app\models;

use app\engine\Db;

abstract class DbModel extends Model
{
    protected $id;

    public function getLimit($from)
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM `{$tableName}` LIMIT ?";
        return Db::getInstance()->executeLimit($sql, $from);
    }

    public function getWhere($field, $value)
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM `{$tableName}` WHERE `$field` = :value";
        return Db::getInstance()->queryObject($sql, ['value' => $value], static::class);
    }

    public function insert()
    {
        $tableName = $this->getTableName();
        $params = [];
        $columns = [];
        foreach (array_keys($this->props) as $key) {
            $value = $this->{$key};
            $params[":{$key}"] = $value;
            $columns[] = "`{$key}`";
        }

        $columns = implode(', ', $columns);
        $values = implode(', ', array_keys($params));
        $sql = "INSERT INTO `{$tableName}` ($columns) VALUES ($values)";
        var_dump($sql);
        Db::getInstance()->execute($sql, $params);
        $this->id = Db::getInstance()->lastInsertId();
        return $this;
    }

    public function update()
    {
        $tableName = $this->getTableName();
        $params = [];
        foreach ($this->props as $key => $changed) {
            if ($changed) {
                $this->props[$key] = false;
                $value = $this->{$key};
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

    public function save()
    {
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

    public static function getAll()
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM `{$tableName}`";
        return Db::getInstance()->queryAll($sql);
    }

    abstract public static function getTableName();
}