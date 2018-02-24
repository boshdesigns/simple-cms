<?php

  require("_class/connectDB.php");

  function add_entry() {

    $obj = new connectDB();
    $sql = $obj->connect();

      if ( $_POST['title'] )
         $title = mysqli_real_escape_string($sql, $_POST['title']);
       if ( $_POST['bodytext'])
         $bodytext = mysqli_real_escape_string($sql, $_POST['bodytext']);
       if ( $title && $bodytext ) {
         $created = time();
         $query = $sql->query("INSERT INTO testDB VALUES('$title','$bodytext','$created')");
         header('Location: /');

         exit();
       }



  }
  if(isset($_POST['submit']))
  {
     if(isset($_POST['title']) && isset($_POST['bodytext']) && !empty($_POST['title']) && !empty($_POST['bodytext'])) {
       add_entry();
     }
  }
?>
