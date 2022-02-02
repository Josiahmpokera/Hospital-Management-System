<?php 

if(!isset($_SESSION['nurseLogin'])) {
    header("location: ../index.php");
}

$nurseLogin = $_SESSION['nurseLogin']; 
$query = $conn->query("SELECT * FROM nurse WHERE nur_id = '$nurseLogin'");
$row = mysqli_fetch_array($query);
$nurseusername = $row['nur_username'];


?>