<?php
    session_start(); 
    include('connect.php');
    include('checkSession.php');
    include('authenChecking.php');
    if ($_SESSION["level"] != "A")
    {
        echo "<script>alert('คุณไม่สามารถสร้างโดเมนได้ เนื่องจากคุณไม่ใช่ Admin');</script>";
        exit(0);
    }
    //echo "<script>alert('".(empty($_POST['addEdit_1']))."');</script>";
    /*
    echo "<br>subdomain_id : ".($_POST['subdomain_id']);
    echo "<br>submit type : ".($_POST['submit_type']);
    echo "<br>addEdit_1 : ".($_POST['addEdit_1']);
    echo "<br>addEdit_2 : ".($_POST['addEdit_2']);
    echo "<br>newSubdomain_name : ".($_POST['newSubdomain_name']);
    echo "<br>newSubdomain_creator : ".($_POST['newSubdomain_creator']);
    echo "<br>newSubdomain_giver : ".($_POST['newSubdomain_giver']);
    echo "<br>newSubdomain_user : ".($_POST['newSubdomain_user']);
    echo "<br>toggleID : ".($_POST['toggleID']);
    echo "<br>toggleStatus : ".($_POST['toggleStatus']);
    */
    function popupAndBack ($msg)
    {
        echo "<script>alert('".$msg."');</script>";
        echo "<script>window.history.back();</script>";
        exit(0);
    }

    if ($_POST["submit_type"] == "2") // Submitted from create new subdomain.
    {
        $operation = "INSERT";
        $GLOBAL["user_tel"] = $_POST["newSubdomain_user"];
    }
    else if ((!empty($_POST["addEdit_1"])) || (!empty($_POST["addEdit_2"]))) //Submitted from subdomain editing.
    {
        $operation = "UPDATE";
        $GLOBAL["user_tel"] = $_POST["addEdit_1"];
    }   
    else if (!empty($_POST["toggleID"])) // Toggle the active and inactive subdomain
    {
        $operation = "TOGGLED"; 
        $GLOBAL["user_tel"] = $_POST["toggleID"];
    }
    else 
        popupAndBack ("ไม่มีการดำเนินการใด ๆ ");

    // Start of checking the permission
    $permission = 0;
    if (($_SESSION["level"]) == "A")
        $permission = "1";
    else if (($_SESSION["level"]) == "B")
        $permission = "2";
    // End of checking the permission

    // Start of checking the ability to operate
    if ($permission == "2")
    {
        $sql_check_user_ID =    "
                                    SELECT  userlogin_ID
                                    FROM    tb_userlogin
                                    WHERE   userlogin_username = '".$GLOBAL["user_tel"]."' AND userlogin_giver_ID = '".$_SESSION["ID"]."';
                                ";
        $result_check_user_ID = mysqli_query($con, $sql_check_user_ID);
        if (!($result_check_user_ID->num_rows > 0))
        {
            popupAndBack("ไม่สามารถดำเนินการได้เนื่องจากสมาชิกที่คุณเลือกไม่ได้เป็นสมาชิกของคุณ");
        }
            
    }
    else if ($permission != "1") 
        popupAndBack("ไม่สามารถดำเนินการได้ กรุณาลองใหม่อีกครั้ง");
    // End of checking the ability to operate

    // Query section
    if ($operation == "INSERT")
    {   
        
        // Start of the checking existing user account and get the userlogin_ID
        $sql_getID = "SELECT userlogin_ID FROM tb_userlogin WHERE userlogin_username = '".$_POST["newSubdomain_user"]."'";
        $result_getID = mysqli_query($con, $sql_getID);
        if ($result_getID)
        {
            if ($result_getID->num_rows > 0)
            {
                while ($row = $result_getID->fetch_assoc())
                {
                    if ((is_null($row["userlogin_ID"])) || (empty($row["userlogin_ID"])))
                        popupAndBack("ไม่สามารถสร้างชื่อผู้ใช้ใหม่ได้ เนื่องจากไม่พบสมาชิกตามหมายเลขโทรศัพท์ที่ระบุไว้");
                    else
                    {
                        is_null($row["userlogin_ID"]) ? "true" : "false";
                        echo "userlogin_ID = ".$row["userlogin_ID"];
                        $GLOBALS["userlogin_ID"] = $row["userlogin_ID"];
                    }
                }
            }
            else 
                popupAndBack("ไม่สามารถสร้างชื่อผู้ใช้ใหม่ได้ เนื่องจากไม่พบสมาชิกตามหมายเลขโทรศัพท์ที่ระบุไว้");    
        }
        else 
            popupAndBack("ไม่สามารถสร้างชื่อผู้ใช้ใหม่ได้ เนื่องจากไม่พบสมาชิกตามหมายเลขโทรศัพท์ที่ระบุไว้");
        // End of the checking existing user account and get the userlogin_ID

        //Start of checking existing subdomain
        $sql_check_existing_subdomain = "SELECT subdomain_name FROM tb_subdomain WHERE subdomain_name = '".$_POST['newSubdomain_name']."'";
        $result_check_existing_subdomain = mysqli_query($con, $sql_check_existing_subdomain);
        if ($result_check_existing_subdomain->num_rows > 0)
        {
            while($row = $result_check_existing_subdomain->fetch_assoc())
            {
                popupAndBack ("found tel : ".$row['subdomain_name']);
            }
        }
        else 
        {
            // Start of creating the new subdomain
            $sql_insert_new_subdomain = "
                                            INSERT INTO tb_subdomain (subdomain_name, subdomain_user_ID, subdomain_status)
                                            VALUES ('".$_POST['newSubdomain_name']."', '".$GLOBALS["userlogin_ID"] ."', '0');
                                        ";
            $result_insert_new_subdomain = mysqli_query($con, $sql_insert_new_subdomain);
            if (!$result_insert_new_subdomain)
            {
                popupAndBack("ไม่สามารถสร้างซับโดเมนใหม่ได้ กรุณาตรวจสอบหมายเลขโทรศัพท์ผู้ใช้งานซับโดเมนและชื่อซับโดเมนอีกครั้ง");
            }
            // Start of getting subdomain_ID and creating the content slots
            // Start of getting subdomain_ID
            $sql_get_subdomain_ID = "
                                        SELECT subdomain_ID
                                        FROM tb_subdomain
                                        WHERE subdomain_user_ID = '".$GLOBALS["userlogin_ID"]."';
                                    ";
            $result = mysqli_query($con, $sql_get_subdomain_ID);
            $result_boolean = $result ? 'true' : 'false';
            if ($result_boolean)
            {
                if ($result->num_rows > 0) 
                    while($row = $result->fetch_assoc())
                        $subdomain_ID = $row['subdomain_ID'];
            }
            else 
                popupAndBack("ไม่สามารถค้นหาซับโดเมนได้"); 
            // End of getting subdomain_ID
            $sql_prepare_meta = "   INSERT INTO tb_meta (meta_subdomain_ID)
                                    VALUES ('$subdomain_ID');
                                ";
            $result_prepare_meta = mysqli_query($con, $sql_prepare_meta);
            if (!$result_prepare_meta)
                popupAndBack("ไม่สามารถจัดเตรียม meta data ได้ กรุณาลองใหม่อีกครั้ง");
            // Start of creating  content slots 
            $sql_prepare_content = "
                                        INSERT INTO tb_content (content_subdomain_ID, content_owner_order)
                                        VALUES  ('".$subdomain_ID."','1')
                                    ";
            for ($i = 2; $i <= 10; $i++)
                $sql_prepare_content .= ",('".$subdomain_ID."','".$i."') ";
            $sql_prepare_content .= ";";
            if (mysqli_query($con, $sql_prepare_content))
            {
                echo "<script>alert('ดำเนินการเรียบร้อยแล้ว (2)');</script>";
                echo "<script>window.location.href = \"manage.php\";</script>";
                exit(0);
            }
            else
                popupAndBack("ไม่สามารถสร้างซับโดเมนใหม่ได้ พบปัญหาการจัดเตรียมพื้นที่สำหรับสร้างคอนเทนท์");
            // End of creating content slots
            // End of getting subdomain_ID and creating the content slots

            echo "<script>alert('ดำเนินการเรียบร้อยแล้ว (1)');</script>";
            echo "<script>window.location.href = \"manage.php\";</script>";
            exit(0);
            // End of creating the new subdomain
        }
        //End of checking existing subdomain
    }
    else if (($operation == "UPDATE") || ($operation == "TOGGLED"))
    {
        if ($operation == "UPDATE")
        {
            $sql_get_new_userlogin_ID = "SELECT userlogin_ID FROM tb_userlogin WHERE userlogin_username = '".$_POST['addEdit_1']."'";
            $result_get_new_userlogin_ID = mysqli_query($con, $sql_get_new_userlogin_ID);
            if (mysqli_query($con, $sql_get_new_userlogin_ID))
            {
                if ($result_get_new_userlogin_ID->num_rows > 0)
                {
                    while ($row = $result_get_new_userlogin_ID->fetch_assoc())
                    {
                        $GLOBALS["userlogin_ID"] = $row["userlogin_ID"];
                    }
                }
                else 
                    popupAndBack("ไม่สามารถแก้ไขข้อมูลได้ เนื่องจากไม่พบสมาชิกตามหมายเลขโทรศัพท์ที่ระบุไว้");
                if (is_null($_POST['addEdit_2']) || empty($_POST['addEdit_2']))
                    popupAndBack("ไม่สามารถแก้ไขข้อมูลได้ เนื่องจากซับโดเมนซ้ำกันหรือชื่อซับโดเมนว่างเปล่า กรุณาเปลี่ยนชื่อซับโดเมนใหม่อีกครั้ง");
                else
                {
                    //$addEdit = is_null($_POST['addEdit_2']) ? "true" : "false";
                    //$addEdit = strlen($_POST['addEdit_2']);
                    $sql_update =   "
                                    UPDATE tb_subdomain 
                                    SET subdomain_name = '".$_POST['addEdit_2']."', subdomain_user_ID = '".$GLOBALS["userlogin_ID"]."'
                                    WHERE subdomain_ID = '".$_POST['subdomain_ID']."';
                                ";
                }
                    
                if (mysqli_query($con, $sql_update))
                {
                    echo "<script>alert('ดำเนินการเรียบร้อยแล้ว (3)');</script>";
                    echo "<script>window.location.href = \"manage.php\";</script>";
                    exit(0);
                }
                else
                    popupAndBack("ไม่สามารถแก้ไขข้อมูลได้ เนื่องจากซับโดเมนซ้ำกันหรือชื่อซับโดเมนว่างเปล่า กรุณาเปลี่ยนชื่อซับโดเมนใหม่อีกครั้ง");
            }
            else 
                popupAndBack("ไม่สามารถแก้ไขข้อมูลได้ กรุณาลองใหม่อีกครั้ง (2)");                
        }
        else if ($operation == "TOGGLED")
        {
            if ($_POST['toggleStatus'] == "0")
                $edited = "subdomain_status = '1'";
            else
                $edited = "subdomain_status = '0'";
            $sql_toggle_status = "
                                    UPDATE tb_subdomain
                                    SET ".$edited."
                                    WHERE subdomain_ID = '".$_POST['subdomain_ID']."';
                                ";
            if (mysqli_query($con, $sql_toggle_status))
            {
                echo "<script>alert('ดำเนินการเรียบร้อยแล้ว (4)');</script>";
                echo "<script>window.location.href = \"manage.php\";</script>";
                exit(0);
            }
            else
                popupAndBack("ไม่สามารถแก้ไขสถานะของซับโดเมนได้ กรุณาลองใหม่อีกครั้ง");
        }
        /*
        if (empty($_POST['toggleID']))
            $where = $_POST['addEdit_1'];
        else if (empty($_POST['addEdit_1']))
            $where = $_POST['toggleID'];
        $sql = "
                UPDATE tb_subdomain
                SET ".$edited."
                WHERE subdomain_ID = '".$_POST['subdomain_ID']."';
                ";
        */
        /*
        if (mysqli_query($con, $sql))
        {
            echo "<script>alert('ดำเนินการเรียบร้อยแล้ว');</script>";
            echo "<script>window.location.href = \"manage.php\";</script>";
            exit(0);
        }
        else 
            popupAndBack("ไม่สามารถดำเนินการได้ กรุณาลองใหม่อีกครั้ง");
        */
    }
    /*
    else 
        $sql = "";
    */
    /*  
    if (!empty($sql)) // excute sql command.
    {
        //$result = $result ? 'true' : 'false';
        if (mysqli_query($con, $sql))
            echo "<script>alert('ดำเนินการเรียบร้อยแล้ว - 3');</script>";  
        else 
            popupAndBack("ไม่สามารถบันทึกได้ กรุณาตรวจสอบว่าไม่มีซับโดเมนหรือผู้ใช้ซับโดเมนซ้ำกัน");
    } 
    else
        echo "<script>alert('ไม่มีการดำเนินการใด ๆ ');</script>";
    */
    echo "<script>window.location.replace(\"manage.php\");</script>";    
?>