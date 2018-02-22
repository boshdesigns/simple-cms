<?php
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);

require("_class/connectDB.php");
$results = new displayEnteries();
$addentry = new addEnteries();
?>

<!DOCTYPE html>
<html lang="en">

  <head>
    <title>SimpleCMS</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.js.map">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js">

  </head>

  <body>
    <header>
      <nav class="navbar navbar-default">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="/">Simple CMS</a>
        </div>

        <ul class="nav navbar-nav navbar-right">
          <li><a href="/">Home</a></li>
          <li><a href="<?php print "{$_SERVER['PHP_SELF']}?admin=1" ?>">Add a New Entry</a></li>
        </ul>
      </div>
      </nav>
    </header>
    <div class="container">
      <?php
        echo (isset($_GET['admin']) && $_GET['admin'] == 1 ) ? $addentry->display_admin() : $results->display_public();
      ?>
    </div>
  </body>

</html>
