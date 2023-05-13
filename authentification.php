<?php
if(isset($_SESSION['auth'])){
    $_SESSION["auth_status"] = "login pour dashboard";
    header("Location: login.php");
    exit(0);
}
?>