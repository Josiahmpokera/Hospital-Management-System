<?php 

if(!isset($_SESSION['RadiologyLogin'])) {
    header("location: ../index.php");
}

$RadiologyLogin =  $_SESSION['RadiologyLogin'] ; 
$query = $conn->query("SELECT * FROM radiology WHERE rad_id = '$RadiologyLogin'");
$row = mysqli_fetch_array($query);
$radusername = $row['rad_username'];


?>