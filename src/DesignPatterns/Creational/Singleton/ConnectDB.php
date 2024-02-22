<?php

namespace App\DesignPatterns\Creational\Singleton;

use PDO;
use PDOException;

class ConnectDB extends Singleton
{
    private static $instance = null;
    public $pdo;
    private $query;
    private $results;
    private $count = 0;
    private $error = false;

    private $query_string = "";
    private $bindValues = array();
    private $lastId;

    private string $host = 'localhost';
    private string $user = 'root';
    private string $pwd = '';
    private string $dbName = 'gymsystempro';

    protected function __construct()
    {
        try {
            $this->pdo = new PDO(
                $this->getDsn(),
                $this->user,
                $this->pwd,
                [
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                ]
            );
        } catch(PDOException $pdoException) {
            return $pdoException->getMessage();
        }
    }

    private function getDsn()
    {
        return 'mysql:host=' . $this->host . ';dbname=' . $this->dbName;
    }

    public static function getInstance()
    {
        if (is_null(self::$instance))
        {
            self::$instance = new ConnectDB();
        }

        return self::$instance;
    }

    public function getConnection()
    {
        return $this->pdo;
    }

    public function query($sql, $parameters = array()) {
        $this->error = false;

        if ($this->query = $this->pdo->prepare($sql)) {
            $i = 1;
            foreach ($parameters as $param) {
                $this->query->bindValue($i, $param);
                $i++;
            }
            if ($this->query->execute()) {
                // You can PDO::FETCH_OBJ instad of assoc, or whatever you like
                $this->results = $this->query->fetchAll();
                $this->count = $this->query->rowCount();
                $this->lastId = $this->query->lastInsertId();
            } else {
                $this->error = true;
            }
        }
        return $this;
    }


    public function select($fields = "*") {
        $action = "";
        $this->query_string = "";
        if (is_array($fields)) {
            $action = "SELECT ";
            for ($i = 0; $i < count($fields); $i++) {
                $action .= $fields[$i];
                if ($i != count($fields) - 1)
                    $action .= ', ';
            }
        } else {
            $action = "SELECT * ";
        }
        $this->query_string .= $action;
        return $this;
    }

    public function from($table) {
        $this->query_string .= " FROM {$table} ";
        return $this;
    }

    public function where($where = array()) {
        $keys = array_keys($where);
        $action = " WHERE ";
        for ($i = 0; $i < count($keys); $i++) {
            $action .= $keys[$i] . ' = ?';
            if ($i < count($keys) - 1)
                $action .= ' AND ';
            $this->bindValues[] = $where[$keys[$i]];
        }
        $this->query_string .= $action;
        return $this;
    }

    public function execute() {
        if (!empty($this->query_string))
            $this->query($this->query_string, $this->bindValues);
        $this->bindValues = array();
    }

    public function getQueryString() {
        return $this->query_string;
    }

    public function results() {
        return $this->results;
    }
    public function first() {
        return $this->results[0];
    }
    public function last() {
        return $this->results[$this->count-1];
    }
    public function row($id) {
        return $this->results[$id];
    }
    public function error() {
        return $this->error();
    }
    public function count() {
        return $this->count;
    }
    public function lastId() {
        return $this->lastId;
    }
}