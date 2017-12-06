<?php
class database{

  private $servername = "localhost";
  private $username = 'root';
  private $password = '';
  private $dbname = 'wad-project';
  private $pdo = null;

  public function connect(){

    $mysql_connect_str = "mysql:host=$this->servername;dbname=$this->dbname";
    $pdo = new PDO($mysql_connect_str, $this->username, $this->password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $pdo;
  }

}
?>
