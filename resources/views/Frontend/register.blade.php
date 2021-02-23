{{-- <?php
    session_start(); 
    include('connect.php');
/*     include('checkSession.php');
    include('authenChecking.php'); */

    if (empty($_SESSION["ID"]))
    {
      $userlogin_ID = "value = \"apinya\"";
      $giver_tel_display = "style = \"display: none;\"";
    }
    else 
    {
      $userlogin_ID = "";
      $giver_tel_display = "";
    }
?> --}}

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/register.css">
    <title>Sapapps</title>
</head>

<body>

    <form action = "{{route('register')}}" method = "POST">
        @csrf
        <div class="container">
            <div class="signup-box">
                <div class="title"> สมัครเข้าใข้งานระบบ </div>

                <div class="row">
                    <div class="col">
                        <div class="textboxtop">
                            <input name="name_lastname" id="name_lastname" type="text" placeholder="ชื่อ - นามสกุล">
                        </div>
                    </div>
                    <div class="col" align="right">
                        <div class="textboxtop">
                            <input name="phone_number" id="phone" type="text" placeholder="เบอร์โทรศัพท์">
                        </div>
                    </div>
                </div>
                
                <div class="textbox">
                    <input name ="username_login" id ="email" type="email" placeholder="อีเมลล์">
                </div>

                <div class="textbox">
                    <input name ="password" id ="password" type="password" placeholder="รหัสผ่าน">
                </div>

                <div class="textbox">
                    <input name ="password_confirmation" id ="password" type="password" placeholder="ยืนยันรหัสผ่านอีกครั้ง">
                </div>

                <div class="button" align="center">
                    <input type="submit" value="สมัครเข้าใช้งาน">
                </div>
                
                <hr style="margin-top: 15px;">
                <div style="margin-top: 15px" align="center">
                    <p class="footer">คุณลงทะเบียนแล้วใช่ไหม? <a class="footer" href="{{route('login')}}" style="text-decoration: none;" >เข้าสู่ระบบที่นี่</a></p>
                    <div style="color:aquamarine;margin-top: 15px;">
                        <a style="font-size: 12px;color:greenyellow;" href="{{route('home')}}">กลับสู่หน้าหลัก</a>
                    </div>
                </div>
            </div>
        </div>
    </form>
    

</body>

</html>