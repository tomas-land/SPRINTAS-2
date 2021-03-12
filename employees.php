<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

  <title>Document</title>
</head>

<body>
  <?php 
  require 'index.php';
  require "main_php.php"; ?>

  <div class="container">
    <table class="table ">
      <thead class="thead-light">
        <tr>
          <th scope="col">employee_id</th>
          <th scope="col">first_name</th>
          <th scope="col">last_name</th>
          <th scope="col">projects</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <?php
          display_employees($result);
          ?>
        </tr>

      </tbody>
    </table>
  </div>


  





</body>

</html>