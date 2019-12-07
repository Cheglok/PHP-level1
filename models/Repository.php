<?php


namespace app\models;

use app\engine\Db;
use app\interfaces\IModels;

abstract class Repository implements IModels
{
    public function getLimit($from)
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM `{$tableName}` LIMIT ?";
        return Db::getInstance()->executeLimit($sql, $from);
    }

    public function getCountWhere($field, $value)
    {
        $tableName = static::getTableName();
        $sql = "SELECT COUNT(*) as count FROM `{$tableName}` WHERE `$field` = :value";
        return Db::getInstance()->queryOne($sql, ['value' => $value])['count'];
    }

    public function getWhere($field, $value)
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM `{$tableName}` WHERE `$field` = :value";
        return Db::getInstance()->queryObject($sql, ['value' => $value], $this->getEntityClass());
    }

    public function insert(Model $entity)
    {
        $tableName = static::getTableName();
        $params = [];
        $columns = [];
        foreach (array_keys($entity->props) as $key) {
            $value = $entity->{$key};
            $params[":{$key}"] = $value;
            $columns[] = "`{$key}`";
        }

        $columns = implode(', ', $columns);
        $values = implode(', ', array_keys($params));
        $sql = "INSERT INTO `{$tableName}` ($columns) VALUES ($values)";
        Db::getInstance()->execute($sql, $params);
        $entity->id = Db::getInstance()->lastInsertId();
    }

    public function update(Model $entity)
    {
        $tableName = static::getTableName();
        $params = [];
        foreach ($entity->props as $key => $changed) {
            if ($changed) {
                $entity->props[$key] = false;
                $value = $entity->{$key};
                $params[] = "`{$key}`='{$value}'";
            }
        }
        $params = implode(', ', $params);
        $sql = "UPDATE `{$tableName}` SET  $params WHERE id = :id";
        Db::getInstance()->execute($sql, ['id' => $entity->id]);
    }

    public function delete(Model $entity)
    {
        $tableName = static::getTableName();
        $sql = "DELETE FROM `{$tableName}` WHERE id = :id";
        Db::getInstance()->execute($sql, [':id' => $entity->id]);
        return true;
    }

    public function deleteWhere($entity, $field, $value)
    {
        $tableName = static::getTableName();
        $sql = "DELETE FROM `{$tableName}` WHERE goods_id = :id AND `$field` = :value";
        return Db::getInstance()->execute($sql, [':id' => $entity->goods_id, ':value' => $value]);
    }

    public function save($entity)
    {
        if (is_null($entity->id))
            $this->insert($entity);
        else
            $this->update($entity);
    }

    public function getOne($id)
    {
        $className = $this->getEntityClass();
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM `{$tableName}` WHERE id = :id";
        $product = Db::getInstance()->queryObject($sql, ['id' => $id], $className);
        return $product;
    }

    public function getAll()
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM `{$tableName}`";
        return Db::getInstance()->queryAll($sql);
    }
}