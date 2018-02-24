<?php

class displayEnteries extends connectDB {

  public function display_public() {

    $obj = new connectDB();
    $sql = $obj->connect();

    $q = "SELECT * FROM testDB ORDER BY created DESC LIMIT 10";
    $result = $sql->query($q) or die(mysqli_error($sql));

    if($result) {
      $entry_display = "";
      $entry_display .= "<table class=\"table table-striped\">";

      $entry_display .= "<thead><th>Title</th><th>Body</th><th></th></thead><tbody>";

      while($row = $result->fetch_object()) {
        $title = stripslashes($row->title);
        $bodytext = stripslashes($row->bodytext);

        $entry_display .= "<tr><td><h4>$title</h4></td>";
        $entry_display .= "<td><h4>$bodytext</h4></td>";
        $entry_display .= '<td><form action="delete.php" method="post"><input type="hidden" name="title" value="' . $title . '" />';
        $entry_display .= '<input type="submit" class="btn btn-default" value="Delete Entry?" name="submit" />';
        $entry_display .= '</form></td></tr>';

      }

      $entry_display .= "</tbody></table>";
    }

    return $entry_display;
  }

}

?>
