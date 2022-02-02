<?php
 session_unset($_SESSION['laboratoryLogin']);
 session_destroy($_SESSION['laboratoryLogin']);
    header("location: ../index.php");
?>
