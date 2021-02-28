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
    <base href="{{asset('public')}}">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
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

    <title>CreatedSealPage</title>

</head>

<body>

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
    

    @include('Frontend.side_menu')
    @if(!Auth::user()->is_admin)
    <form action = "{{route('salepage.store')}}" method = "POST">
        @csrf
        <div class="container-fluid">
            <div class="content">
                <div class="">
                    <h5 class="p-4">แพ็คเกจของคุณจะหมดอายุวันที่ {{$exp_date}} (เหลืออีก {{$datediff}} วัน)</h5>
                </div>
                @if (\Session::has('message'))
                    <div class="alert alert-success">
                        <ul>
                            <li>{!! \Session::get('message') !!}</li>
                        </ul>
                    </div>
                @endif
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
                    <p class="p-4">คุณสามารถสร้าง sale page ได้อีก {{$current_page}} หน้า</p>
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
                                    <td>
                                        <a href="{{route('salepage.show',$dt->id)}}" target="_blank">{{$dt->namesale}}</a></td>
                                    <td>
                                        <button type="button" class="btn btn-success" onclick="editModal({{$dt->id}})">แก้ไขข้อมูล</button>
                                        <a type="button" class="btn btn-danger" onclick="return confirm('ยืนยันการลบ salepage ?')" href="{{route('salepage.destroy',$dt->id)}}">ลบ salepage</a>
                                    </td>
                                    
                                </tr>
                                @endforeach
                               
                            </tbody>
                    </table>
                </div>
            </div>
        </div>
    </form>
    @else
    <form action = "{{route('salepage.store')}}" method = "POST">
        @csrf
        <div class="container-fluid">
            <div class="content">
                <div class="">
                    <h5 class="p-4">แพ็คเกจของคุณจะหมดอายุวันที่  (เหลืออีก  วัน)</h5>
                </div>
                @if (\Session::has('message'))
                    <div class="alert alert-success">
                        <ul>
                            <li>{!! \Session::get('message') !!}</li>
                        </ul>
                    </div>
                @endif
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
                    <p class="p-4">คุณสามารถสร้าง sale page ได้อีก & หน้า</p>
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
                                    <td>
                                        <button type="button" class="btn btn-success" onclick="editModal({{$dt->id}})">แก้ไขข้อมูล</button>
                                        <a type="button" class="btn btn-danger" onclick="return confirm('ยืนยันการลบ salepage ?')" href="{{route('salepage.destroy',$dt->id)}}">ลบ salepage</a>
                                    </td>
                                    
                                </tr>
                                @endforeach
                               
                            </tbody>
                    </table>
                </div>
            </div>
        </div>
    </form>
    @endif

    <!-- Modal แก้ไข salespage-->
<div class="modal fade" id="editSalePage" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">แก้ไข sales page</h5>
          
        </div>
        <div class="modal-body">
          <input class="form-control" type="text" id="salepageName" value="">
          <input type="hidden" id="salepageID" value="">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" id="updateSalepage" class="btn btn-primary">Save changes</button>
        </div>
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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/yourcode.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script>
        function editModal(id)
        {
            let salepageId = id;
            $.ajax({
                "url" : "webpanel/created_salepage/"+salepageId+"/edit",
                "method" : "get",
                
                success:function(response)
                {

                    $('#salepageName').val(response.namesale);
                    $('#salepageID').val(id);
                    $('#editSalePage').modal('show');

                }
            })
        }
        $(document).on('click','#updateSalepage',function(){
            var salepageId = $('#salepageID').val();
            var namesale = $('#salepageName').val();
            $.ajax({
                "url" : "webpanel/created_salepage/"+salepageId+"/update",
                "method" : "post",
                "data" : {"_token":"{{csrf_token()}}","namesale":namesale},
                "success" : function(){
                    window.location.reload();
                }
            })
        });
    </script>

</body>

</html>