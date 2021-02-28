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

        /*Profile Pic Start*/
.picture-container{
    position: relative;
    cursor: pointer;
    text-align: center;
}
.picture{
    max-width: 150px;
    height: 150px;
    background-color: #999999;
    border: 4px solid #CCCCCC;
    color: #FFFFFF;
    border-radius: 50%;
    margin: 0px auto;
    overflow: hidden;
    transition: all 0.2s;
    -webkit-transition: all 0.2s;
}
.picture:hover{
    border-color: #2ca8ff;
}
.content.ct-wizard-green .picture:hover{
    border-color: #05ae0e;
}
.content.ct-wizard-blue .picture:hover{
    border-color: #3472f7;
}
.content.ct-wizard-orange .picture:hover{
    border-color: #ff9500;
}
.content.ct-wizard-red .picture:hover{
    border-color: #ff3b30;
}
.picture input[type="file"] {
    cursor: pointer;
    display: block;
    height: 100%;
    left: 0;
    opacity: 0 !important;
    position: absolute;
    top: 0;
    width: 100%;
}

.picture-src{
    width: 100%;
    height:100%;
}
/*Profile Pic End*/
    </style>
    <title>Document</title>
</head>

<body>
    @include('Frontend.side_menu')

    <input type="checkbox" id="menu">

    <nav>
        <label class="head">Sale Page</label>

        <ul>
            <li>
                <form action="{{route('logout')}}" method="post">
                    @csrf
                    <button class="btn btn-primary">Logout</button>
                </form>
               
            </li>
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
                <form action="{{route('personal.update',Auth::user()->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="picture-container">
                        <div class="picture">
                            @if(Auth::user()->image)
                            <img src="/assets/images/profile/{{Auth::user()->image}}" class="picture-src" id="wizardPicturePreview" title="">
                            @else
                            <img src="https://lh3.googleusercontent.com/LfmMVU71g-HKXTCP_QWlDOemmWg4Dn1rJjxeEsZKMNaQprgunDTtEuzmcwUBgupKQVTuP0vczT9bH32ywaF7h68mF-osUSBAeM6MxyhvJhG6HKZMTYjgEv3WkWCfLB7czfODidNQPdja99HMb4qhCY1uFS8X0OQOVGeuhdHy8ln7eyr-6MnkCcy64wl6S_S6ep9j7aJIIopZ9wxk7Iqm-gFjmBtg6KJVkBD0IA6BnS-XlIVpbqL5LYi62elCrbDgiaD6Oe8uluucbYeL1i9kgr4c1b_NBSNe6zFwj7vrju4Zdbax-GPHmiuirf2h86eKdRl7A5h8PXGrCDNIYMID-J7_KuHKqaM-I7W5yI00QDpG9x5q5xOQMgCy1bbu3St1paqt9KHrvNS_SCx-QJgBTOIWW6T0DHVlvV_9YF5UZpN7aV5a79xvN1Gdrc7spvSs82v6gta8AJHCgzNSWQw5QUR8EN_-cTPF6S-vifLa2KtRdRAV7q-CQvhMrbBCaEYY73bQcPZFd9XE7HIbHXwXYA=s200-no" class="picture-src" id="wizardPicturePreview" title="">
                            @endif

                            <input type="file" id="wizard-picture" name="profile" class="">
                        </div>
                         <h6 class="">Choose Picture</h6>
                
                    </div>
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
                    <div class="row">
                        <div class="col-3">&nbsp;</div>
                        <div class="col-6">
                            <label style="color: #696969;">อีเมลล์ของคุณ</label>
                            <input type="text" value="{{$data->username_login}}" class="p-2" style="width:90%;border: 1px solid #d1d3e2;border-radius: .35rem;" name="txt_page_email" id="txt_page_email">
                        </div>
                    </div>
                    &nbsp;
                    @if(!Auth::user()->is_admin)
                    <div class="row">
                        <div class="col-3">&nbsp;</div>
                        <div class="col-6">
                            <label style="color: #696969;">แพ็คเกจปัจจุบันของคุณคือ</label>
                            <input type="text" class="p-2" value="{{$data->name_package}} " style=" background-color:#DCDCDC; color:#808080; width:90%;border: 1px solid #d1d3e2;border-radius: .35rem;" name="txt_page_package" id="txt_page_package" readonly>
    
                        </div>
                    </div>
                    @else
                    <div class="row">
                        <div class="col-3">&nbsp;</div>
                        <div class="col-6">
                            <label style="color: #696969;">แพ็คเกจปัจจุบันของคุณคือ</label>
                            <input type="text" class="p-2" value="" style=" background-color:#DCDCDC; color:#808080; width:90%;border: 1px solid #d1d3e2;border-radius: .35rem;" name="txt_page_package" id="txt_page_package" readonly>
    
                        </div>
                    </div>
                    @endif
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
    <script>
        $(document).ready(function(){
// Prepare the preview for profile picture
    $("#wizard-picture").change(function(){
        readURL(this);
    });
});
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#wizardPicturePreview').attr('src', e.target.result).fadeIn('slow');
        }
        reader.readAsDataURL(input.files[0]);
    }
}
    </script>

</body>

</html>