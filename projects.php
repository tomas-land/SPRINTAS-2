<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>

  <?php
  $sql = "SELECT projects.project_title,projects.project_id ,employees.name FROM projects
LEFT JOIN employees ON employees.project_id=projects.project_id

";
  $result = mysqli_query($conn, $sql);


  function display_projects($result)
  {
    $counter = 1;
    if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
        <td> " . $counter++ . " </td> 
         <td> " . $row["project_title"] . " </td> 
        <td> " . $row["name"] . " </td>
        <td class='delete_edit' >
        <form  action='' method='POST'>
              <input type='hidden' name='delete_proj' value='" . $row["project_id"] . "'>
               <input id='del_btn' type='submit'  value='DELETE' >
           </form>
           <form  action='' method='POST'>
               <input type='hidden' name='name' value='" . $row["project_title"] . "'>
              <button id='edit_btn' type='submit' name='edit' value='" . $row["project_id"] . "' >Edit</button>
      </form></td>  
        </tr> ";
      }
    } else {
      echo "0 results";
    }
  }


  //DELETE

  if (isset($_POST['delete_proj'])) {

    $id = $_POST['delete_proj'];
    $stmt = $conn->prepare("DELETE FROM projects WHERE project_id=$id");
    $stmt->execute();
    $stmt->close();
    header('Location: ' . $_SERVER['PHP_SELF'] . '?' . $_SERVER['QUERY_STRING']);
    die;
  }
  //EDIT - UPDATE
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
    $stmt = $conn->prepare("UPDATE projects set project_title=? where project_id=?");
    $stmt->bind_param("si", $name, $id);
    $stmt->execute();
    $stmt->close();
    header('Location: ' . $_SERVER['PHP_SELF'] . '?' . $_SERVER['QUERY_STRING']);
    die;
  }
  // CREATE
  if (isset($_POST['create_proj'])) {

    $stmt = $conn->prepare("INSERT INTO projects (project_title) VALUES (?)");
    $stmt->bind_param("s", $title);
    $title = $_POST['project_title'];
    $stmt->execute();
    $stmt->close();
    header('Location: ' . $_SERVER['PHP_SELF'] . '?' . $_SERVER['QUERY_STRING']);
    die;
  }



  ?>


  <div class="container">

    <br>
    <div class="create text-center ">
      <form action="" method="POST">
        <LAbel>Add new project</LAbel>
        <input type="text" class="form-control mt-3" name="project_title" placeholder="" aria-label="Recipient's username" aria-describedby="button-addon2"><br>
        <input class="btn btn-outline-secondary " name="create_proj" value="Submit" type="submit" id="button-addon2">
      </form>
    </div>
    <br>
    <br>

    <table class="table ">
      <thead class="thead-light">
        <tr>
          <th class="col-sm-2">id</th>
          <th class="col">project_title</th>
          <th class="col">employees</th>
          <th class="col text-center">actions</th>
      </thead>
      <tbody>
        <tr>

          <?php
          display_projects($result);
          ?>
        </tr>

      </tbody>
    </table>

    <?php


    edit_name();
    mysqli_close($conn);
    ?>

  </div>














</body>

</html>