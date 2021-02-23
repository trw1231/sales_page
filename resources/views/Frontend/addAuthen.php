<?php   
    session_start(); 
    include('connect.php');
    include('checkSession.php');
    $userlogin_ID = $_SESSION["ID"];
    $name = $_POST["name"];
    $lastname = $_POST["lastname"];
    $accNo = $_POST["personalInfo_accNo"];
    $bankname_ID = $_POST["personalInfo_bankName_ID"];


    $allowedExtension = array("jpg", "jpeg", "png", "gif", "bmp", "pdf");
    $target_dir = "upload_bankbook/";
    $fileExtension = strtolower(end(explode(".", basename($_FILES["personalInfo_bankbook_uploaded"]["name"])))); // Getting file extension.
    
    if (in_array($fileExtension, $allowedExtension))
    {
        $target_file = $target_dir.$_SESSION['ID']."_".$_POST['personalInfo_accNo']."_".strval(date("Y-m-d_h.i.sa")).".".$fileExtension;
        if (move_uploaded_file($_FILES["personalInfo_bankbook_uploaded"]["tmp_name"], $target_file)) 
        {
            //echo "ไฟล์ ". basename( $_FILES["personalInfo_bankbook_uploaded"]["name"]). " ถูกอัปโหลดเรียบร้อยแล้ว";
            $bankbook_url = $target_file ;
        }
    }
    else 
    {
        /*echo    "
                <script>
                    alert('ไฟล์ที่อัปโหลดไม่ใช่นามสกุล .jpg .jpeg .png .gif .bmp หรือ .pdf กรุณาเลือกไฟล์ใหม่ที่มีนามสกุลดังกล่าว');
                    window.history.back();
                </script>
                ";
        exit(0);*/
        $bankbook_url = "";
    }

    /* $sql_1 =  "
                INSERT INTO tb_personalinfo (personalInfo_ID, personalInfo_userlogin_ID, personalInfo_name, personalInfo_lastname, personalInfo_accNo, personalInfo_bankName_ID, personalInfo_bankbook_url)
                VALUES ('$userlogin_ID', '$userlogin_ID','$name','$lastname','$accNo','$bankname_ID','$bankbook_url');
            "; */
    $sql_1 =  "
                INSERT INTO tb_personalinfo (personalInfo_ID, personalInfo_userlogin_ID, personalInfo_name, personalInfo_lastname, personalInfo_accNo, personalInfo_bankName_ID)
                VALUES ('$userlogin_ID', '$userlogin_ID','$name','$lastname','$accNo','$bankname_ID');
                ";

    $result = mysqli_query($con, $sql_1);
    if ($result)
    {
        $sql =  "    
                UPDATE tb_userlogin
                SET userlogin_authen_status = 'T'
                WHERE userlogin_ID = '".$_SESSION["ID"]."';
                ";
        mysqli_query($con, $sql);
        echo    "
                <script>
                    alert('ยืนยันตนเรียบร้อยแล้ว');
                    window.location.href = \"subdomainChecking.php\";
                </script>
                ";
    }
    else
    {
        echo    "
                <script>
                    alert('ไม่สามารถยืนยันตนได้ กรุณาตรวจสอบข้อมูลที่ใส่ไว้ให้เรียบร้อย');
                    alert('".var_dump($sql_1)."');
                    //window.history.back();
                </script>
                ";
    }
    
?>