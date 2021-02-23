<?php
    /*
    echo "<script>alert('ขออภัย ระบบอยู่ในโหมดซ่อมบำรุง (Maintenance Session) กรุณากลับมาใหม่อีกครั้งในเวลาถัดไป');</script>";
    echo '<img src = "http://www.industry.go.th/ops/media/k2/items/cache/93429c17e4b38dbc8a8e5136bf2fe45f_XL.jpg" width = "100%">';
    exit(0); 
    */
    $GLOBALS["PROJECT_NAME"] = "Salepages";
    $GLOBALS["DOMAIN_NAME"] = "salepage.com";
    $GLOBALS["PROJECT_KEYWORD"] = "";
    $GLOBALS["PROJECT_DESCRIPTION"] = "";
    $GLOBALS["PROJECT_AUTHOR"] = "";
    $GLOBALS["PROJECT_THEME_COLOR"] = "danger ";
    $GLOBALS["PROJECT_COLOR_BUTTON"] = "warning ";
    $GLOBALS["PROJECT_COLOR_CODE"] = "#ff0000"; 
    // warning-#ffc107 primary-#007bff danger-#dc354 info-#17a2b8 red-#ff0000
    $environment = "0"; // 0-> localhost 1->server

    if ($environment == "0")
    {
        $con= mysqli_connect("localhost","root","","salespage") or die("Error: " . mysqli_error($con));
        mysqli_query($con, "SET NAMES 'utf8' ");
        error_reporting( error_reporting() & ~E_NOTICE );
        date_default_timezone_set('Asia/Bangkok');
    }
    
    else 
    {
        $GLOBALS["con"]= mysqli_connect("localhost:3306","salepage","salepage_password","salepage") or die("Error: " . mysqli_error($con));
        mysqli_query($con, "SET NAMES 'utf8' ");
        error_reporting( error_reporting() & ~E_NOTICE );
        date_default_timezone_set('Asia/Bangkok');
    }
?>
