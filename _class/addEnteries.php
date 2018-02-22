<?php

class addEnteries extends connectDB {

  public function display_admin() {
    $output = '<form action="create.php" method="post">
      <div class="form-group">
        <label for="title">Title:</label>
        <input name="title" id="title" class="form-control" maxlength="150" type="text"/>
      </div>
      <div class="form-group">
        <label for="bodytext">Body Text:</label>
        <textarea name="bodytext" id="bodytext" class="form-control" rows="3"></textarea>
      </div>

        <input type="submit" name="submit" value="Create This Entry!" class="btn btn-default">

    </form>';

    return $output;
  }

}

?>
