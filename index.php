<?php


$servername = "localhost";
$username = "root";
$password = "mysql";
$dbname = "projekt_man";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}


?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <title>Document</title>
</head>
 
<body>


  <?php



  ?>

  <div class="container">
    <div class="row mt-5 gx-5">
      <div class="col">
        <div class="p-3  ">

          <a class="list-group-item list-group-item-action text-center" id="list-messages-list" data-bs-toggle="list" href="<?php echo '?projects' ?>" role="tab" aria-controls="messages">PROJECTS</a>

        </div>
      </div>
      <div class="col">
        <div class="p-3  ">
          <a class=" list-group-item list-group-item-action text-center" id="list-messages-list" data-bs-toggle="list" href="<?php echo '?employees' ?>" role="tab" aria-controls="profile">EMPLOYEES</a>
        </div>
      </div>
    </div>
  </div>
  </div>


  <?php

  if (isset($_GET['employees'])) {
    require 'employees.php';
  }

  if (isset($_GET['projects'])) {
    require 'projects.php';
  }





  ?>











</body>

</html>