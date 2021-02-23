<?php
    session_start(); 
	include('connect.php');

// echo "<pre>";
// print_r ($_POST);
// echo "</pre>";
// exit;
    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $username_id = $_SESSION["ID"];
        $sql_insert_line_token =    "
                                    INSERT INTO social_token (line_token, facebook_pixel , tiktok_pixel , line_tag )
                                    VALUES ('".$_POST["line_token"]."', '".$_POST["facebook_px"]."','".$_POST["tiktok_px"]."','".$_POST["line_tag"]."');
                                    ";
        $result_insert_line_token = mysqli_query($con, $sql_insert_line_token);
        if ($result_insert_line_token)
        {
            echo    "<script>
                        alert('บันทึกการตั้งค่าเรียบร้อย');
                        window.history.back();;
                        </script>   
                    ";
            exit(0);
        }
        
    }
    else
    {
        echo    "<script>
                    alert('ไม่สามารถบันทึกการตั้งค่าได้ โปรดลองใหม่อีกครั้ง');
                    window.history.back();
                </script>   
                ";
            exit(0);
    }

?>