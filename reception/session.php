<?php 

if(strlen($_SESSION['receptionLogin']) =="") {
    header("location: ../index.php");
}

$receptionLogin =  $_SESSION['receptionLogin'];
$query = $conn->query("SELECT * FROM reception WHERE rec_id = '$receptionLogin'");
$row = mysqli_fetch_array($query);
$username = $row['rec_username'];

?>