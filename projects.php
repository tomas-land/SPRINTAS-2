<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="style/styles.css">
    <title>Document</title>
</head>
<body>
    
<?php
$sql = "SELECT employee_id, first_name, last_name, project FROM employees";
$result = mysqli_query($conn, $sql);    


function display_employees($result){
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
         echo "<tr><td> " . $row["employee_id"]. " </td> ".
        "<td> " . $row["first_name"]. " </td> ". 
        "<td> " . $row["last_name"]. " </td> " .
        "<td> " . $row["project"]. " </td></tr><br> ";
    }
} else {
    echo "0 results";
}
}







  if(isset($_GET['projects'])){

  ?>


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





<?php

  }

  mysqli_close($conn);
?>









</body>
</html>