<?php 
        session_start();
        include('connect.php');

        if(isset($_POST['email']))
        {
          $username = $_POST['email'];
          $password = md5($_POST['password']);

          $sql_get_userlogin = "SELECT * FROM user_login WHERE username_login = '$username' AND password_login = '$password ' ";
          $result_get_userlogin = mysqli_query($con, $sql_get_userlogin);
            
          $package = "SELECT * FROM package WHERE username_login = '$username'";
          $resultpackage = mysqli_query($con, $sql_get_userlogin);
         
          //alert("$result_get_userlogin->num_rows");
          if ($result_get_userlogin->num_rows > 0)
          {

            $row = $result_get_userlogin->fetch_assoc();
            $readUsername = $row["username_login"];
            $readPassword = $row["password_login"];
            if (($readUsername == $username) && ($readPassword == $password))
            {
              $_SESSION["ID"] = $row["id"];
              $_SESSION["username"] = $row["username_login"];
              // End of User redirection.   
              if($resultpackage){
                Header("Location: created_salepage.php");
              }else{
                Header("Location: payment.php");
              }
            }
            else
            {
              echo "<script>";
                  echo "alert(\" username หรือ  password ไม่ถูกต้อง\");"; 
                  echo "window.history.back()";
              echo "</script>";
            }
            
          }
          else
          {// In case of wrong password.
            echo "<script>";
                echo "alert(\" username หรือ  password ไม่ถูกต้อง\");"; 
                echo "window.history.back()";
            echo "</script>";
          }// End of wrong password case. 
        }
        else
          Header("Location: home.php"); // In case of jumping access (jump to access this page without login).
          //echo "<script>alert('".print_r($sql_get_userlogin)."');</script>";
          //echo "<script>alert('".print_r($sql_get_userlogin)."');</script>";
?>