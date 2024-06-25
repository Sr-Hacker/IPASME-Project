<?php
  class DB{
    private $dsn = "mysql:host=db;port=3306;dbname=examen";
    private $username = "root";
    private $password = "123123";

    function conecta(){
      try{
        $pdo = new PDO($this->dsn, $this->username, $this->password);
        $pdo->exec("set names utf8");
        return $pdo;
      }catch(PDOException $e){
        echo "Error de conexión: " . $e->getMessage();
      }
    }
  }
?>
