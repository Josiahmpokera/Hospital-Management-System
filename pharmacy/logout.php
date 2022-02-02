<?php
 session_unset($_SESSION['phamacistLogin']);
 session_destroy($_SESSION['phamacistLogin']);
    header("location: ../index.php");
?>
