{{-- <?php 
include('connect.php');
// include('checkSession.php');


$resultdata = "SELECT * FROM category_sale";
$resultdata = mysqli_query($con, $resultdata);

while($row[] = $resultdata->fetch_assoc()) {

};

?> --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/yourcode.js"></script>
    <base href="{{asset('')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="Bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">

    <style>
        body {
            font-family: 'Kanit', sans-serif;
        }
    </style>

    <title>CreatedSealPage</title>

</head>

<body>

    <input type="checkbox" id="menu">

    <nav>
        <label class="head">Created</label>

        <ul>
            <li>
                <form action="{{route('logout')}}" method="post">
                    @csrf
                    <button href="{{route('logout')}}" style="text-decoration: none;">Logout</button>
                </form>
            </li>
        </ul>

        <label for="menu" class="menu-bar">
            <i class="fa fa-bars"></i>
        </label>



    </nav>

    @include('frontend.side_menu')
    <form action = "{{route('salepage.store')}}" method = "POST">
        @csrf
        <div class="container-fluid">
            <div class="content">
                <div class="">
                    <h5 class="p-4">แพ็คเกจของคุณจะหมดอายุวันที่ ว/ด/ป (เหลืออีก 00 วัน)</h5>
                </div>
                <div class="text-center" style="font-size: 30px">
                    <p>สร้าง sale page</p>
                </div>
                <div class="text-center">
                    <input type="text" name="create" id="create" class="p-2" style="width:90%;border: 1px solid #d1d3e2;border-radius: .35rem;" name="txt_page_name" id="txt_page_name" placeholder="กรอกชื่อ sale page (จำกัด 30 ตัวอักษร)" maxlength="30">
                </div>
                <div class="text-center">
                    <button type="submit" class="mt-4 mr-3 mb-4 btn" style="background-color: blue;color:aliceblue">Create Sale Page</button>
                </div>
                <div>
                    <p class="p-4">คุณสามารถสร้าง sale page ได้อีก 00 หน้า</p>
                </div>
                <div class="table-responsive mt-1">
                    <table class="table table-striped">
                        <thead class="thead-dark">
                            <tr class="text-center">
                                <th>ลำดับที่</th>
                                <th>Salepage</th>
                                <th>แก้ไขข้อมูล</th>
                            </tr>
                        </thead>
                            <tbody>
                                @foreach($data as $dt)
                                <tr class="text-center">
                                    <td>{{$loop->iteration}}</td>
                                    <td><a href="{{route('salepage.show',$dt->id)}}">{{$dt->namesale}}</a></td>
                                    
                                </tr>
                                @endforeach
                               
                            </tbody>
                    </table>
                </div>
            </div>
        </div>
    </form>
    


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
    <script src="https://kit.fontawesome.com/yourcode.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</body>

</html>