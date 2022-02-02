<?php
 session_unset($_SESSION['receptionLogin']);
 session_destroy($_SESSION['receptionLogin']);
    header("location: ../index.php");
?>
