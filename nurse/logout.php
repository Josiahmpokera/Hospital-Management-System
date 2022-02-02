<?php
 session_unset($_SESSION['nurseLogin']);
 session_destroy($_SESSION['nurseLogin']);
    header("location: ../index.php");
?>
