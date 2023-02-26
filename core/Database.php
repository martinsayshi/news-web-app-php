<?php

namespace app\core;

use PDO;

class Database {

    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $dbName = "news_article_system";
    private PDO $pdo;

    private $stmt;
    private $error;

    public function __construct() {
        // Set DSN
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbName;
        // Create PDO instance
        $this->pdo = new PDO($dsn, $this->user, $this->password);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    // Prepare statement with query
    public function query($sql) {
        $this->stmt = $this->pdo->prepare($sql);
    }
  
    // Bind values
    public function bind($param, $value, $type = null) {
        if(is_null($type)){
            switch(true){
            case is_int($value):
                $type = PDO::PARAM_INT;
                break;
            case is_bool($value):
                $type = PDO::PARAM_BOOL;
                break;
            case is_null($value):
                $type = PDO::PARAM_NULL;
                break;
            case is_float($value):
                $type = PDO::PARAM_FLOAT;
                break;    
            default:
                $type = PDO::PARAM_STR;
            }
        }
  
        $this->stmt->bindValue($param, $value, $type);
    }
  
    // Execute the prepared statement
    public function execute() {
        return $this->stmt->execute();
    }

    // Get last insert ID
    public function lastInsertId() {
        return $this->pdo->lastInsertId();
    }

    // Get result set as array of objects
    public function resultSet() {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }

    // Get single record as object
    public function single() {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }

    // Get row count
    public function rowCount() {
        return $this->stmt->rowCount();
    }
}