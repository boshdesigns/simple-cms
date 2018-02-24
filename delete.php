<?php

  require("_class/connectDB.php");

  function delete_entry() {

    $obj = new connectDB();
    $sql = $obj->connect();

    $delete_entry = $_POST['title'];

    if (isset($delete_entry) && !empty($delete_entry)) {

      $query = $sql->query("DELETE FROM testDB WHERE title = '$delete_entry'") or die(mysqli_error($sql));

      header('Location: /');
      exit();

    }
  }
  if(isset($_POST['submit']))
  {
     if(isset($_POST['title']) && !empty($_POST['title'])) {
       delete_entry();
     } 
  }
?>
