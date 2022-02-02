<?php
 session_unset($_SESSION['adminLogin']);
 session_destroy($_SESSION['adminLogin']);
    header("location: ../index.php");
?>
