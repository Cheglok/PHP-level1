<?php

namespace app\models;

use app\engine\App;
use app\interfaces\IModels;

abstract class Repository implements IModels
{
    public function getLimit($from)
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM `{$tableName}` LIMIT ?";
        return App::call()->db->executeLimit($sql, $from);
    }

    public function getCountWhere($field, $value)
    {
        $tableName = $this->getTableName();
        $sql = "SELECT COUNT(*) as count FROM `{$tableName}` WHERE `$field` = :value";
        return App::call()->db->queryOne($sql, ['value' => $value])['count'];
    }

    public function getWhere($field, $value)
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM `{$tableName}` WHERE `$field` = :value";
        return App::call()->db->queryObject($sql, ['value' => $value], $this->getEntityClass());
    }

    public function insert(Model $entity)
    {
        $tableName = $this->getTableName();
        $params = [];
        $columns = [];
        foreach ($entity->props as $key => $value) {
            $params[":{$key}"] = $entity->$key;
            $columns[] = "`{$key}`";
        }

        $columns = implode(', ', $columns);
        $values = implode(', ', array_keys($params));
        $sql = "INSERT INTO `{$tableName}` ($columns) VALUES ($values)";
        App::call()->db->execute($sql, $params);
        $entity->id = App::call()->db->lastInsertId();
    }

    public function update(Model $entity)
    {
        $tableName = $this->getTableName();
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
        App::call()->db->execute($sql, ['id' => $entity->id]);
    }

    public function delete(Model $entity)
    {
        $tableName = $this->getTableName();
        $sql = "DELETE FROM `{$tableName}` WHERE id = :id";
        App::call()->db->execute($sql, [':id' => $entity->id]);
        return true;
    }

    public function deleteWhere($entity, $field, $value)
    {
        $tableName = $this->getTableName();
        $sql = "DELETE FROM `{$tableName}` WHERE id = :id AND `$field` = :value";
        return App::call()->db->execute($sql, [':id' => $entity->id, ':value' => $value]);
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
        $product = App::call()->db->queryObject($sql, ['id' => $id], $className);
        return $product;
    }

    public function getAll()
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM `{$tableName}`";
        return App::call()->db->queryAll($sql);
    }
}