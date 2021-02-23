<?php
    session_start(); 
    include('connect.php');
    /* include('checkSession.php');
    include('authenChecking.php'); */

    // // ดึงข้อมูล user

    // $sql_user = "SELECT un.username_login
    //             FROM user_login un
    //             LEFT JOIN user_payment up ON up.username_login = un.username_login";

    // $result_user = mysqli_query($con, $sql_user);

    // while($row = $result_user->fetch_assoc()) {
    
   
    // }   

    $sql_insert_new_member =  "
                            INSERT INTO user_payment (username_login, name_lastname , phone_number)
                            VALUES ('".$row['username_login']."', '".($_POST['name_lastname'])."' , '".($_POST['phone'])."');
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
        echo "<script>window.location.replace(\"home.php\");;</script>";
        exit(0);
    }
    else
    {
        echo "<script>alert('ไม่สามารถเพิ่มสมาชิกได้ กรุณาตรวจสอบว่าหมายเลขโทรศัพท์สมาชิกไม่ได้ซ้ำกับสมาชิกที่ลงทะเบียนแล้ว');</script>";
        echo "<script>window.history.back();</script>";
        exit(0);
    }
    //End of insert new member

?>