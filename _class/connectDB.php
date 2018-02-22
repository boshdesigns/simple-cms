<?php

  include_once('displayEnteries.php');
  include_once('addEnteries.php');

  class connectDB {

    var $servername = '***';
    var $username = '****';
    var $password = '****';
    var $dbname = '****';

    public function connect() {
      $conn = new MySQLi($this->servername,$this->username,$this->password,$this->dbname);

      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      }

      return $conn;
    }
  }


?>
