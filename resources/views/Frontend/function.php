<?php 
include('connect.php');

    $insert_sale =  "
                                INSERT INTO category_sale (namesale)
                                VALUES ('".$_POST['create']."');
                                ";

    $result_insert_sale = mysqli_query($con, $insert_sale);

    if (!($result_insert_sale))
    {
        echo "<script>alert('กรุณากรอกชื่อเพจ');</script>";
        echo "<script>window.location.replace(\"created_salepage.php\");</script>";
        exit(0);
    }

    if ($result_insert_sale)
    {
        echo "<script>alert('เพิ่ม page เรียบร้อย');</script>";
        echo "<script>window.location.replace(\"created_salepage.php\");;</script>";
        exit(0);
    }
    else
    {
        echo "<script>alert('กรุณากรอกชื่อเพจที่ไม่ซ้ำกัน');</script>";
        echo "<script>window.history.back();</script>";
        exit(0);
    }
?>