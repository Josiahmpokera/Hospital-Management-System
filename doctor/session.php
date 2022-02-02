<?php 

if(!isset($_SESSION['doctorLogin'])) {
    header("location: ../index.php");
}

$doctorLogin = $_SESSION['doctorLogin']; 
$query = $conn->query("SELECT * FROM doctors WHERE doc_id = '$doctorLogin'");
$row = mysqli_fetch_array($query);
$doctorusername = $row['doc_username'];


?>