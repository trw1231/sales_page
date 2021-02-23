<?php
    session_start(); 
    include('connect.php');
    /* include('checkSession.php');
    include('authenChecking.php'); */

    //Insert new member
    $sql_insert_new_member =  "
                                INSERT INTO user_login (username_login, password_login , name_lastname , phone_number )
                                VALUES ('".$_POST['email']."', '".md5($_POST['password'])."','".$_POST['name_lastname']."','".$_POST['phone']."');
                            ";
    $result_insertNewMember = mysqli_query($con, $sql_insert_new_member);

    
    if (!($result_insertNewMember))
    {
        echo "<script>alert('ไม่สามารถเพิ่มสมาชิกได้ กรุณาตรวจสอบว่าหมายเลขโทรศัพท์สมาชิกไม่ได้ซ้ำกับสมาชิกที่ลงทะเบียนแล้ว');</script>";
        echo "<script>window.location.replace(\"home.php\");</script>";
        exit(0);
    }

    if ($result_insertNewMember)
    {
        echo "<script>alert('เพิ่มสมาชิกเรียบร้อย');</script>";
        echo "<script>window.location.replace(\"login.php\");;</script>";
        exit(0);
    }
    else
    {
        echo "<script>alert('ไม่สามารถเพิ่มสมาชิกได้ กรุณาตรวจสอบว่าหมายเลขโทรศัพท์สมาชิกไม่ได้ซ้ำกับสมาชิกที่ลงทะเบียนแล้ว');</script>";
        echo "<script>window.history.back();</script>";
        exit(0);
    }
    // End of insert new member

?>

