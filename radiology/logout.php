<?php
 session_unset($_SESSION['RadiologyLogin']);
 session_destroy($_SESSION['RadiologyLogin']);
    header("location: ../index.php");
?>
