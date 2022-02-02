<?php
 session_unset($_SESSION['doctorLogin']);
 session_destroy($_SESSION['doctorLogin']);
    header("location: ../index.php");
?>
