<?php

  class simpleCMS {
    var $host;
    var $username;
    var $password;
    var $table;

    public function display_public() {
      $q = "SELECT * FROM testDB ORDER BY created DESC LIMIT 3";
      $r = mysql_query($q);

      if ( $r !== false && mysql_num_rows($r) > 0 ) {
        $entry_display = "";
        $entry_display .= "<table class=\"table table-striped\">";

        $entry_display .= "<thead><th>Title</th><th>Body</th><th></th></thead><tbody>";

        while ( $a = mysql_fetch_assoc($r) ) {
          $title = stripslashes($a['title']);
          $bodytext = stripslashes($a['bodytext']);

          $entry_display .= <<<ENTRY_DISPLAY

          <tr>
            <td>
              <h4>$title</h4>
              </td>
          <td>
            <p>
              $bodytext
            </p>
          </td>
          <td>
          <aside>
            <form action="" method="post">
              <input type="submit" value="Delete Entry?" />
            </form>
          </aside>
          </td>
          </tr>

ENTRY_DISPLAY;
        }

        $entry_display .= "</tbody></table>";

      } else {
        $entry_display = <<<ENTRY_DISPLAY

      <h2>This Page Is Under Construction</h2>
      <p>
        No entries have been made on this page.
        Please check back soon, or click the
        link below to add an entry!
      </p>

ENTRY_DISPLAY;
      }
      $entry_display .= <<<ADMIN_OPTION

      <p class="admin_link">
        <a href="{$_SERVER['PHP_SELF']}?admin=1" class="btn btn-default">Add a New Entry</a>
      </p>

ADMIN_OPTION;

      return $entry_display;

    }

    public function display_admin() {

      return <<<ADMIN_FORM

      <form action="{$_SERVER['PHP_SLEF']}" method="post">
        <div class="form-group">
          <label for="title">Title:</label>
          <input name="title" id="title" class="form-control" maxlength="150" type="text"/>
        </div>
        <div class="form-group">
          <label for="bodytext">Body Text:</label>
          <textarea name="bodytext" id="bodytext" class="form-control" rows="3"></textarea>
        </div>

          <input type="submit" value="Create This Entry!" class="btn btn-default">

      </form>

ADMIN_FORM;

    }

    public function write($p) {

      if ( $p['title'] )
         $title = mysql_real_escape_string($p['title']);
       if ( $p['bodytext'])
         $bodytext = mysql_real_escape_string($p['bodytext']);
       if ( $title && $bodytext ) {
         $created = time();
         $sql = "INSERT INTO testDB VALUES('$title','$bodytext','$created')";
         return mysql_query($sql);
       } else {
         return false;
       }

    }

    public function connect() {

      mysql_connect($this->host,$this->username,$this->password) or die("Could not connect. " . mysql_error());
      mysql_select_db($this->table) or die("Could not select database. " . mysql_error());

      return $this->buildDB();

    }

    private function buildDB() {

      $sql = <<<MySQL_QUERY
        CREATE TABLE IF NOT EXISTS testDB (
            title VARCHAR(150),
            bodytext TEXT,
            created VARCHAR(100)
          )

MySQL_QUERY;

      return mysql_query($sql);

    }

  }

?>
