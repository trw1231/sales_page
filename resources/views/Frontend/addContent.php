<?php 
    session_start(); 
    include('connect.php');
    include('checkSession.php');
    include('authenChecking.php');
    $media_type = 0;

    //$_POST["content_order"];
    $content_owner_order = $_POST["content_order"];
    $content_description = $_POST["content_description"];
    $content_media_type = $_POST["select_media"];
    $subdomain_ID;
    $media_url;
    
  
    
    /*$sql_update_content_slot =" UPDATE tb_content
                                SET content_detail = '$content_description' , content_media_type = '$content_media_type', content_media_url = ''
                                WHERE content_owner_order = '$content_order' AND content_subdomain_ID = '$subdomain_ID';
                                ";*/
    if($_SERVER['REQUEST_METHOD'] == 'POST') 
    {
        $sql_get_subdomain_ID = "SELECT tb_subdomain.subdomain_ID FROM tb_subdomain WHERE tb_subdomain.subdomain_user_ID = '".$_SESSION["ID"]."'";
        $result_get_subdomain_ID = mysqli_query($con, $sql_get_subdomain_ID);
        if ($result_get_subdomain_ID->num_rows > 0)
        {
            while ($row = $result_get_subdomain_ID->fetch_assoc())
            {
                $GLOBALS["subdomain_ID"] = $row["subdomain_ID"];
            }
        }

        $sql_existing_content = "   SELECT content_media_type, content_media_url
                                    FROM tb_content
                                    WHERE content_subdomain_ID = '$subdomain_ID' AND content_owner_order = '$content_owner_order'; ";
        $result_existing_content = mysqli_query($con, $sql_existing_content);
        if ($result_existing_content->num_rows > 0)
        {
            while ($row = $result_existing_content->fetch_assoc())
            {
                $GLOBALS["existing_content_media_type"] = $row["content_media_type"];
                $GLOBALS["existing_content_media_url"] = $row["content_media_url"];
            }
        }

        //echo "<script>alert('POSTED');</script>";
        if (!empty($_FILES["uploadMedia"]["tmp_name"]))
            $issetPic = 1;
        else
            $issetPic = 0;

        if (!empty($_POST['uploadLink']))
            $issetUploadLink = 1;
        else
            $issetUploadLink = 0;

        if (!empty($_POST['content_description'])) 
            $issetContentDescription = 1;
        else 
            $issetContentDescription = 0;
        
        if (($issetPic == 1) && ($issetUploadLink != 1))
        {
            $check = getimagesize($_FILES["uploadMedia"]["tmp_name"]);
            if($check !== false) 
            {
                //echo "File is an image - " . $check["mime"] . "."; // display file extension and type.
                $uploadOk = 1;
                $media_type = 1; //media_type = 1 : the media is picture.
                if ($issetContentDescription == 1)
                    $query_status = 1; // set query status as 1 to waiting for INSERT or UPDATE.
            } 
            else 
            {
                /*
                echo "  <script>
                            alert('กรุณาเลือกไฟล์ภาพนามสกุล .jpg, .png, .bmp หรือ .gif');
                            window.history.back();
                        </script>";
                exit(0);
                */
                $media_type = 9;
            }
        }
        else if (($issetPic != 1) && ($issetUploadLink == 1))
        {
            $uploadOk = 0;
            $media_type = 2; //media_type = 2 : the media is video link.
            //$media_url = $_POST['uploadLink'];
			if (strpos($_POST['uploadLink'], "="))
			{
				$exploded_media_url = explode("=", $_POST['uploadLink']);
				$media_url = "https://www.youtube.com/embed/".$exploded_media_url[1];
			}
			else if (strpos($_POST['uploadLink'], "youtu.be"))
			{
				$exploded_media_url = explode("/", $_POST['uploadLink']);
				$media_url = "https://www.youtube.com/embed/".$exploded_media_url[3];
			}
			else 
				$media_url = $_POST['uploadLink'];
				
            if ($issetContentDescription == 1)
                $query_status = 1; // set query status as 1 to waiting for INSERT or UPDATE.
        }
        else if (($issetPic == 1) && ($issetUploadLink == 1))
        {
            echo "  <script>
                        alert('ไม่สามารถอัปโหลดรูปภาพและลิงก์วิดีโอพร้อมกันได้ \nกรุณาเลือกอัปโหลดรูปภาพหรือลิงก์วิดีโอเพียงอย่างใดอย่างหนึ่ง');
                        window.history.back();
                    </script>";
            exit(0);
        }
        else if (($issetPic != 1) && ($issetUploadLink != 1))
        {
            if ($issetContentDescription != 1)
            {
                echo "  <script>
                            alert('ไม่สามารถส่งอัปโหลดหน้าเปล่าได้ กรุณาใส่ข้อความ แล้วเลือกอัปโหลดรูปภาพหรือใส่ลิงก์วิดีโอ: issetContentDescription = $issetContentDescription');
                            //window.history.back();
                        </script>";
                exit(0);
            }
            else
            {
                /*
                echo "  <script>
                            alert('กรุณาอัปโหลดรูปหรือใส่ลิงก์วิดีโออย่างใดอย่างหนึ่ง');
                            window.history.back();
                        </script>";
                exit(0);
                */
                $media_type = "8";
                if(empty($GLOBALS["existing_content_media_url"]))
                    echo "<script>alert('คำเตือน: คุณไม่ได้อัปโหลดภาพ หรือเลือกลิงก์วิดีโอ หรือภาพที่คุณเลือกอาจมีขนาดใหญ่เกินกว่า 2 MB');</script>";                

            }
        }
        if ($issetContentDescription == 1)
        {
            //$content_detail = subStr(str_replace("'","\"",$_POST['content_description']), 1, -3);
            $content_detail = str_replace("'","\"",$_POST['content_description']);
            //$content_detail = subStr(str_replace("'","\"",$_POST['content_description']), 3, -7);
            //echo "<script>alert('$content_detail');</script>";
        }
        if ($uploadOk == 1)
        {
            $target_dir = "uploads/";
            $fileExtension = end(explode(".", basename($_FILES["uploadMedia"]["name"]))); // Getting file extension.
            $target_file = $target_dir.$_SESSION['ID']."_".$_POST['content_order']."_".strval(date("Y-m-d_h.i.sa")).".".$fileExtension;
            if (move_uploaded_file($_FILES["uploadMedia"]["tmp_name"], $target_file)) 
            {
                echo "รูปภาพ ". basename( $_FILES["uploadMedia"]["name"]). " ถูกอัปโหลดเรียบร้อยแล้ว";
                $GLOBALS["media_url"] = $target_file ;
            }
                
            else 
            {
                echo "ขออภัย ไม่สามารถอัปโหลดภาพได้";
                echo    "<script>
                            alert('ขออภัย ไม่สามารถอัปโหลดภาพได้ กรุณาลองอีกครั้ง');
                            //window.history.back();
                        </script>";
                exit(0);
                
            }
        }

        if (($query_status == 1) || ($issetContentDescription == 1))
        { 
            $already =  $_POST["alreadyUploadLink"];
            echo "<script>alert('   type = $media_type 
                                    url = $media_url 
                                    exType = $existing_content_media_type 
                                    exUrl = $existing_content_media_url 
                                    subdomain_ID = $subdomain_ID 
                                    already = $already
                                ');
                    </script>";
            if (($media_type == "8") && ($media_url == "") && (!empty($existing_content_media_type)) && (!empty($existing_content_media_url)))
            {
                $media_type = $existing_content_media_type;
                $media_url = $existing_content_media_url;
            }
            else if ((empty($media_type)) || (!isset($media_type)))
                $media_type = 7;
            $sql_content = "UPDATE tb_content 
                            SET content_detail = '$content_detail', content_media_type = '$media_type', content_media_url = '$media_url'
                            WHERE content_subdomain_ID = '$subdomain_ID' AND content_owner_order = '$content_owner_order'; ";
            $result_content = mysqli_query($con, $sql_content);
            //echo "<script>alert('$sql_content');</script>";
        }

        // upload meta tag
        //$meta_subdomain_ID = $_POST['meta_subdomain_ID']
        $meta_sitename = str_replace("\"","",str_replace("'","",$_POST['meta_sitename']));
        $meta_title = str_replace("\"","",str_replace("'","",$_POST['meta_title']));
        $meta_description = str_replace("\"","",str_replace("'","",$_POST['meta_description']));
        $meta_keyword = str_replace("\"","",str_replace("'","",$_POST['meta_keyword']));
        $meta_lineid = str_replace("\"","",str_replace("'","",$_POST['meta_lineid']));
        $meta_website = str_replace("\"","",str_replace("'","",$_POST['meta_website']));
        $meta_fb_pixel = str_replace("\"","\\"."\"",str_replace("'","\\'",$_POST['meta_fb_pixel']));
        
        //$meta_ = $_POST[''];
        
             //(meta_subdomain_ID, meta_sitename, meta_title, meta_description, meta_keyword, meta_lineid, meta_website, meta_fb_pixel)
            $sql_meta = "
                            UPDATE  tb_meta 
                            SET     meta_sitename = '".$meta_sitename."',
                                    meta_title = '".$meta_title."',
                                    meta_description = '".$meta_description."',
                                    meta_keyword = '".$meta_keyword."',
                                    meta_lineid = '".$meta_lineid."',
                                    meta_website = '".$meta_website."',
                                    meta_fb_pixel = '".$meta_fb_pixel."'
                            WHERE   meta_subdomain_ID = '".$subdomain_ID."';
                        ";
            $result_meta = mysqli_query($con, $sql_meta);
            if (($result_meta) && ($media_type != "8"))
            {
                echo "<script>alert('บันทึก Content เรียบร้อยแล้ว'); window.location.replace(\"menupage.php\")</script>" ;
                exit(0);
            }
            else 
            {
                echo "<script>alert('กรุณาตรวจสอบ Content ของคุณอีกครั้ง'); window.location.replace(\"menupage.php\")</script>" ;
                exit(0);
                //echo "<script>alert('".$meta_fb_pixel."');</script>";
                
                /* echo "<br><br>sql_content = ".$sql_content;
                echo "<br><br>sql_meta = ".$sql_meta;
                echo "<br><br>sql_get_subdomain_ID = ".$sql_get_subdomain_ID;
                echo "<br><br>subdomain_ID = ".$subdomain_ID;//$GLOBALS["subdomain_ID"]; */
            }
        
        
    }
?>