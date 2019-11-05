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
        'database' => 'shop',
        'charset' => 'utf8'
    ];


    private $connection = null;
    private $dump = null;

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
    public function setDump(){}

    private function query($sql, $params){
        $pdoStatement = $this->getConnection()->prepare($sql);
        $pdoStatement->execute($params);
        return $pdoStatement;
    }

    private function execute($sql, $params) {
        $this->query($sql, $params);
    }

    private function queryObject($sql, $params=[], $className) { //Пока оставил везде вывод отладочной информации
        var_dump($sql);
        var_dump($params);
        var_dump($className);
        $pdoStatement = $this->query($sql, $params);
        $pdoStatement->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, $className);
        return $pdoStatement->fetch();
    }

    public function queryOne($sql, $params=[], $className)
    {
        return $this->queryObject($sql, $params, $className);
    }

    public function queryAll($sql, $params = [])
    {
        return $this->query($sql, $params)->fetchAll();
    }

    public function insert($sql, $params) {
        var_dump($sql);
        var_dump($params);
        $this->execute($sql, $params);
        return $this->getConnection()->lastInsertId();
    }

    public function delete($sql, $params) {
        var_dump($sql);
        var_dump($params);
        $this->execute($sql, $params);
    }

    public function __toString()
    {
        return "Db";
    }

}