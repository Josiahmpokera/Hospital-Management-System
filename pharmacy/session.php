<?php 

if(!isset( $_SESSION['phamacistLogin'])) {
    header("location: ../index.php");
}

$phamacistLogin =   $_SESSION['phamacistLogin'] ; 
$query = $conn->query("SELECT * FROM phamacist WHERE pha_id = '$phamacistLogin'");
$row = mysqli_fetch_array($query);
$phamacyusername = $row['pha_username'];


?>