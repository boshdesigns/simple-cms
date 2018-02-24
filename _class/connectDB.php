<?php

  include_once('displayEnteries.php');
  include_once('addEnteries.php');

  class connectDB {

    var $servername = 'localhost';
    var $username = 'root';
    var $password = 'root';
    var $dbname = 'simplecms_local';

    public function connect() {
      $conn = new MySQLi($this->servername,$this->username,$this->password,$this->dbname);

      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      }

      $sql = "CREATE TABLE IF NOT EXISTS testDB (title VARCHAR(150), bodytext TEXT, created VARCHAR(100))";
      mysqli_query($conn, $sql);

      return $conn;
    }

  }


?>
