<?php

namespace app\engine;

use app\traits\TSingletone;

class Db
{

    use TSingletone;

    private $config = [
        'driver' => 'mysql',
        'host' => 'localhost',
        'login' => 'root',
        'password' => '',
        'database' => 'php1',
        'charset' => 'utf8'
    ];


    private $connection = null;

    private function getConnection() {
        if (is_null($this->connection)) {
            $this->connection = new \PDO($this->prepareDSNString(),
                $this->config['login'],
                $this->config['password']
            );
            $this->connection->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
        }
        return $this->connection;
    }

    private function prepareDSNString() {
        return sprintf("%s:host=%s;dbname=%s;charset=%s",
            $this->config['driver'],
            $this->config['host'],
            $this->config['database'],
            $this->config['charset']
        );
    }

    private function query($sql, $params){
        $pdoStatement = $this->getConnection()->prepare($sql);
        $pdoStatement->execute($params);
        return $pdoStatement;
    }

    public function queryObject($sql, $params, $className) {
        $pdoStatement = $this->query($sql, $params);
        $pdoStatement->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, $className);
        $obj = $pdoStatement->fetch();
        if (!$obj) {
            throw new \Exception("Продукт не найден", 404);
        }
        return $obj;
    }

    public function execute($sql, $params) {
        $this->query($sql, $params);
        return true;
    }

    public function queryOne($sql, $params = [])
    {
        return $this->queryAll($sql, $params)[0];
    }

    public function queryAll($sql, $params = [])
    {
        return $this->query($sql, $params)->fetchAll();
    }

    public function lastInsertId() {
        return $this->getConnection()->lastInsertId();
    }

    public function executeLimit($sql, $number) {
        $pdoStatement = $this->getConnection()->prepare($sql);
        $pdoStatement->bindValue(1, $number, \PDO::PARAM_INT);
        $pdoStatement->execute();
        return $pdoStatement->fetchAll();
    }

    public function __toString()
    {
        return "Db";
    }

}