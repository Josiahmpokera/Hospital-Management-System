<?php 

if(!isset( $_SESSION['laboratoryLogin'])) {
    header("location: ../index.php");
}

$laboratoryLogin =   $_SESSION['laboratoryLogin'] ; 
$query = $conn->query("SELECT * FROM laboratorist WHERE lab_id = '$laboratoryLogin'");
$row = mysqli_fetch_array($query);
$labusername = $row['lab_username'];


?>