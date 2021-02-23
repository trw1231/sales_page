<?php 
    //echo "<script>alert('ID = ". $_SESSION["ID"]." and level = ".$_SESSION["level"]."');</script>";
    if ((empty($_SESSION["ID"])))
    {
        Header ("Location: home.php");
        exit(0);
    }
?>