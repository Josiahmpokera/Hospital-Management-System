<?php 

if(!isset( $_SESSION['adminLogin'])) {
    header("location: ../index.php");
}

$adminLogin =  $_SESSION['adminLogin']; 
$query = $conn->query("SELECT * FROM admin WHERE admin_id = '$adminLogin'");
$row = mysqli_fetch_array($query);
$adminusername = $row['username'];


?>