<?php
  class DB{
    private $dsn = "mysql:host=db;port=3306;dbname=data_uptaeb";
    private $username = "root";
    private $password = "123123";

    function conecta(){
      try{
        $pdo = new PDO($this->dsn, $this->username, $this->password);
		    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->exec("set names utf8");
        return $pdo;
      }catch(PDOException $e){
        echo "Error de conexión: " . $e->getMessage();
      }
    }
  }
?>
