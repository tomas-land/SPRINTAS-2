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


// $sql = "SELECT employee_id, first_name, last_name, project FROM employees";
// $result = mysqli_query($conn, $sql);

// if (mysqli_num_rows($result) > 0) {
//     while($row = mysqli_fetch_assoc($result)) {
//         echo "<br>id: " . $row["employee_id"]. " - Name: " . $row["first_name"]. " " . $row["last_name"]. $row["last_name"]. "<br>";
//     }
// } else {
//     echo "0 results";
// }
// include 'employees.php';
mysqli_close($conn);




?>
