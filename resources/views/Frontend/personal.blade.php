<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="{{asset('')}}">
    <script src="https://kit.fontawesome.com/yourcode.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="Bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">

    <style>
        body {
            font-family: 'Kanit', sans-serif;
        }
    </style>
    <title>Document</title>
</head>

<body>
    @include('Frontend.side_menu')

    <input type="checkbox" id="menu">

    <nav>
        <label class="head">Created</label>

        <ul>
            <li><a href="home.php" style="text-decoration: none;">Logout</a></li>
        </ul>

        <label for="menu" class="menu-bar">
            <i class="fa fa-bars"></i>
        </label>



    </nav>



    <div class="container-fluid">
        <div class="content">
            <div class="">
                <h5 class="p-4">แพ็คเกจของคุณจะหมดอายุวันที่ ว/ด/ป (เหลืออีก 00 วัน)</h5>
            </div>
            <div class="container-fluid">
                <p class="text-center" style="font-size: 30px">ข้อมูลส่วนตัว</p>
                <form action="{{route('personal.update',Auth::user()->id)}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-3">&nbsp;</div>
                        <div class="col-6">
                            <label style="color: #696969;">ชื่อ-สกุล</label>
                            <input type="text" value="{{$data->name_lastname}}" class="p-2" style="width:90%;border: 1px solid #d1d3e2;border-radius: .35rem;" name="txt_page_name" id="txt_page_name">
                        </div>
                    </div>
                    &nbsp;
                    <div class="row">
                        <div class="col-3">&nbsp;</div>
                        <div class="col-6">
                            <label style="color: #696969;">เบอร์โทร</label>
                            <input type="text" value="{{$data->phone_number}}" class="p-2" style="width:90%;border: 1px solid #d1d3e2;border-radius: .35rem;" name="txt_page_phone" id="txt_page_phone">
                        </div>
                    </div>
                    &nbsp;
                    {{-- <div class="row">
                        <div class="col-3">&nbsp;</div>
                        <div class="col-6">
                            <label style="color: #696969;">อีเมลล์ของคุณ</label>
                            <input type="text" value="{{$data->username_login}}" class="p-2" style="width:90%;border: 1px solid #d1d3e2;border-radius: .35rem;" name="txt_page_email" id="txt_page_email">
                        </div>
                    </div> --}}
                    &nbsp;
                    <div class="row">
                        <div class="col-3">&nbsp;</div>
                        <div class="col-6">
                            <label style="color: #696969;">แพ็คเกจปัจจุบันของคุณคือ</label>
                            <input type="text" class="p-2" value="{{$data->name_package}} " style=" background-color:#DCDCDC; color:#808080; width:90%;border: 1px solid #d1d3e2;border-radius: .35rem;" name="txt_page_package" id="txt_page_package" readonly>
    
                        </div>
                    </div>
                    <div class="text-center">
                        <button class="mt-4 mr-3 mb-4 btn" style="background-color: blue;color:aliceblue">อัพเดทข้อมูลส่วนตัว</button>
                    </div>
                </form>
                
            </div>
        </div>
    </div>

    <!-- START myModal1 HOW TO USE -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="modal" id="myModal1">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header center">
                                <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0">
                                    วิธีการใช้งาน Sale Page
                                </h2>
                            </div>
                            &nbsp;
                            <div class="container-fluid">
                                <div class="embed-responsive embed-responsive-16by9 mb-2"><iframe width="750" height="345" src="https://www.youtube.com/embed/tgbNymZ7vqY" frameborder="0"></iframe>
                                </div>
                            </div>
                            &nbsp;
                            <div class="text-right">
                                <button class="btn btn-warning" data-dismiss="modal">ปิด</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END myModal1 HOW TO USE -->

    <script src="js/bootstrap.min.js"></script>
    
    <script src="js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/yourcode.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


</body>

</html>