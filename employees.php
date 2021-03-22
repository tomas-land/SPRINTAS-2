<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="style.scss">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Document</title>
</head>

<body>


  <?php
  $sql = "SELECT  employees.employee_id,employees.name, projects.project_title  
  FROM employees
  LEFT JOIN projects ON employees.project_id = projects.project_id
  ";
  $result = mysqli_query($conn, $sql);




  $sql2 = "SELECT projects.project_id,projects.project_title from projects";
  $result2 = mysqli_query($conn, $sql2);

  function display_employees($result)
  {
    $counter = 1;
    if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)) {

        echo "<tr>
        <td> " . $counter++ . " </td> 
         <td> " . $row["name"] . " </td> 
         <td> " . $row["project_title"] . " </td>
         <td class='delete_edit'>
         <form  action='' method='POST'>
            <input type='hidden' name='delete_empl' value='" . $row["employee_id"] . "'>
            <input id='del_btn' type='submit'  value='DELETE' >
         </form>
          <form  action='' method='POST'>
               <input type='hidden' name='name' value='" . $row["name"] . "'>
               <button id='edit_btn' type='submit' name='edit' value='" . $row["employee_id"] . "' >Edit</button>
          </form></td> 
        </tr> ";
      }
    } else {
      echo "0 results";
    }
  }

  //DELETE

  if (isset($_POST['delete_empl'])) {
    $id = $_POST['delete_empl'];
    $stmt = $conn->prepare("DELETE FROM employees WHERE employee_id=$id");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
    header('Location: ' . $_SERVER['PHP_SELF'] . '?' . $_SERVER['QUERY_STRING']);
    die;
  }
  //EDIT-UPDATE
  function edit_name()
  {
    if (isset($_POST['edit'])) {
      print("<form   action='' method='POST'>
      <input class='update form-control mt-3' type='text' name='new_name' value='" . $_POST['name'] . "'>
      <button id='edit_btn' type='submit' name='update' value='" . $_POST['edit'] . "' >update</button>
 </form></td>");
    }
  }
  if (isset($_POST['update'])) {
    $id = $_POST['update'];
    $name = $_POST['new_name'];
    $stmt = $conn->prepare("UPDATE employees set name=? where employee_id=?");
    $stmt->bind_param("si", $name, $id);
    $stmt->execute();
    $stmt->close();
    header('Location: ' . $_SERVER['PHP_SELF'] . '?' . $_SERVER['QUERY_STRING']);
    die;
  }

  // CREATE 
  if (isset($_POST['create_empl'])) {
    $stmt = $conn->prepare("INSERT INTO employees (name,project_id) VALUES (?,?)");
    $stmt->bind_param("si", $name, $project_id);
    $name = $_POST['name'];
    $project_id = $_POST['assign_project'];
    $stmt->execute();
    $stmt->close();
    header('Location: ' . $_SERVER['PHP_SELF'] . '?' . $_SERVER['QUERY_STRING']);
    die;
  }

  if (isset($_POST['create_empl'])) {
    $stmt = $conn->prepare("INSERT INTO employees (name) VALUES (?)");
    $stmt->bind_param("s", $name);
    $name = $_POST['name'];
    $stmt->execute();
    $stmt->close();
    header('Location: ' . $_SERVER['PHP_SELF'] . '?' . $_SERVER['QUERY_STRING']);
    die;
  }



  //DROPDOWN PROJECT_LIST
  function projects_list($result2)
  {
    if (mysqli_num_rows($result2) > 0) {
      while ($row = mysqli_fetch_assoc($result2)) {
        echo '<option  value=' . $row['project_id'] . '>' . $row['project_title'] . '</option>';
      }
    } else {
      echo '0 results';
    }
  }
  ?>


  <!-- //  HTML -->
  <div class="container">


    <br>
    <div class="create text-center">
      <form action="" method="POST">
        <LAbel>Add new employee</LAbel>
        <input type="text " class="form-control mt-3" name="name" placeholder="" aria-label="Recipient's username" aria-describedby="button-addon2"><br>
        <LAbel>Assign project</LAbel>

        <select class="form-select mt-3" name="assign_project">
          <option selected disabled>Choose...</option>
          <?php projects_list($result2) ?>
        </select>
        <input class="btn btn-outline-secondary mt-3" name="create_empl" value="Submit" type="submit" id="button-addon2">
      </form>
    </div>
    <br>
    <br>



    <table class="table ">
      <thead class="thead-light">
        <tr>
          <th class="col-sm-2">id</th>
          <th class="col">name</th>
          <th class="col">project_title</th>
          <th class="col text-center">actions</th>
        </tr>
      </thead>
      <tbody>


        <?php
        display_employees($result);
        ?>


      </tbody>
    </table>

    <?php

    edit_name();
    mysqli_close($conn);
    ?>


  </div>




















</body>

</html>