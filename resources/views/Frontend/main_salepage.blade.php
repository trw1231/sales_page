{{-- <?php 
include('connect.php');
require_once 'class/Image.php';
$app = new Image;
// include('checkSession.php');


?> --}}

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>main-sale-page</title>
    <base href="{{asset('')}}">

    <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="css/switch.css">
    <link rel="stylesheet" href="/public/assets/css/flipclock.css">
    <link rel="stylesheet" href="/public/assets/css/jquery.datetimepicker.css">

    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Kanit', sans-serif;
        }

        .dropbtn {
            margin-top: 15px;
            margin-right: 25px;
            background-color: #666666;
            color: white;
            width: 100%;
            height: 50%;
            padding: 1px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
        }

        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f1f1f1;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content a:hover {
            background-color: #ddd;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .dropdown:hover .dropbtn {
            background-color: #333333;
        }

        .center {
            text-align: center;
            display: block;
        }
        .image-editor img{
            max-width: 100%;
            height : auto;
        }
        .content-limit {
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 2; /* number of lines to show */
            -webkit-box-orient: vertical;
            }
    </style>

</head>

<body>

    <div class="container px-0">
        <nav class="navbar navbar-light fixed-top mb-5" style="background-color: #d0d0ce">
            <div class="row" style="width: 85%;">
                <div class="col-auto mr-auto my-auto">
                    <div class="text-left p-2">
                        <p class="pt-3">{{$data->namesale}}</p>
                    </div>
                </div>
                @if(Auth::check())
                <div class="dropdown text-right pt-3">
                    <button class="btn btn-secondary dropdown-toggle " type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        จัดการระบบของคุณ
                    </button>
                        <div class="dropdown-menu">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#myModal1">จัดการหน้าหลัก</a>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#myModal2">จัดการหน้าขอบคุณ</a>

                                <div class="dropdown-divider"></div>

                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#myModal3">จัดการรายการสินค้า</a>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#myModal4">จัดการค่าจัดส่งสินค้า</a>

                                <div class="dropdown-divider"></div>

                            <form class="form-signin m-3 p-2" action = "notifySettingExe.php" method = "POST">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#myModal5">จัดการ LINE
                                    TOKEN</a>
                                    <input type="hidden" id="line_token" name = "line_token">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#myModal6">จัดการ FACEBOOK
                                    PIXEL</a>
                                    <input type="hidden" id="facebook_px" name = "facebook_px">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#myModal7">จัดการ TIKTOK
                                    PIXEL</a>
                                    <input type="hidden" id="tiktok_px" name = "tiktok_px">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#myModal8">จัดการ LINE
                                    TAG</a>
                                    <input type="hidden" id="line_tag" name = "line_tag">
                            </form>

                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#myModal9">จัดการบัญชีธนาคาร</a>
                                <!-- <a class="dropdown-item" href="#" data-toggle="modal" data-target="#myModal10">การสร้าง CUSTOM URL</a> -->
                                <!-- <a class="dropdown-item" href="#"></a> -->
                        </div>
                </div>
                @endif
            </div>
        </nav>

        
        <!-- START myModal1 -->
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="modal" id="myModal1">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header center">
                                    <h1>จัดการหน้าเพจหลัก</h1>
                                </div>
                                <table class="table table-striped">
                                    <thead class="thead-dark">
                                        <tr class="text-center">
                                            <th>ปรับตำแหน่ง</th>
                                            <th>ชนิดข้อมูล</th>
                                            <th>หน้าภาพตัวอย่าง</th>
                                            <th>แก้ไข</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($image as $im)
                                        <tr class="text-center row1" data-id="{{$im->id}}">
                                            <td>
                                               <a href="javascript:void(0);" class="up"><i class="icon-arrow-up"></i></a>
                                               <a href="javascript:void(0);" class="down"><i class="icon-arrow-down"></i></a>
                                            </td>
                                            <td><a href="#"></a>{{$im->content_type}}</td>
                                            <td style="width:20%;">
                                                @if($im->content_type == 'image')
                                                    <img src="/public/images/sales_page_image/{{$im->content}}" width="100%" heigh="auto">
                                                    @elseif($im->content_type == 'content')
                                                    <div class="content-limit">{!!$im->content!!}</div>
                                                    @elseif($im->content_type == 'video')
                                                    <div class="embed-responsive embed-responsive-16by9">
                                                        <iframe class="embed-responsive-item" src="{{$im->content}}" allowfullscreen></iframe>
                                                    </div>
                                                    @elseif($im->content_type == 'ตัวนับถอยหลัง')
                                                        <div>N/A</div>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                
                                                <form action="{{route('image.destroy',$im->id)}}" method="post">
                                                    @csrf
                                                    <button class="btn btn-danger">ลบ</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                       
                                    </tbody>
                                </table> 
                                
                                <!-- <table class="table table-striped">
                                    <thead class="thead-dark">
                                        <tr class="text-center">
                                            <th>ปรับตำแหน่ง</th>
                                            <th>ชนิดข้อมูล</th>
                                            <th>หน้าภาพตัวอย่าง</th>
                                            <th>รายละเอียด</th>
                                            <th>แก้ไข</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="text-center">
                                            <td>1</td>
                                            <td><a href="#"></a>รูปภาพ</td>
                                            <td>ภาพตัวอย่าง</td>
                                            <td>รายละเอียดชนิดข้อมูล</td>
                                            <td>ลบ</td>
                                        </tr>
                                        <tr class="text-center">
                                            <td>2</td>
                                            <td><a href="#"></a>รูปภาพ</td>
                                            <td>ภาพตัวอย่าง</td>
                                            <td>รายละเอียดชนิดข้อมูล</td>
                                            <td>ลบ</td>
                                        </tr>
                                        <tr class="text-center">
                                            <td>3</td>
                                            <td><a href="#"></a>รูปภาพ</td>
                                            <td>ภาพตัวอย่าง</td>
                                            <td>รายละเอียดชนิดข้อมูล</td>
                                            <td>ลบ</td>
                                        </tr>
                                        <tr class="text-center">
                                            <td>4</td>
                                            <td><a href="#"></a>รูปภาพ</td>
                                            <td>ภาพตัวอย่าง</td>
                                            <td>รายละเอียดชนิดข้อมูล</td>
                                            <td>ลบ</td>
                                        </tr>
                                        <tr class="text-center">
                                            <td>5</td>
                                            <td><a href="#"></a>รูปภาพ</td>
                                            <td>ภาพตัวอย่าง</td>
                                            <td>รายละเอียดชนิดข้อมูล</td>
                                            <td>ลบ</td>
                                        </tr>
                                        <tr class="text-center">
                                            <td>5</td>
                                            <td><a href="#"></a>รูปภาพ</td>
                                            <td>ภาพตัวอย่าง</td>
                                            <td>รายละเอียดชนิดข้อมูล</td>
                                            <td>ลบ</td>
                                        </tr>
                                    </tbody>
                                </table> 


                                <!-- START -->
                                <!-- START UPLOAD IMAGE -->
                                <div id="accordion" class="text-center">
                                    <div class="card">
                                        <div class="card-header" id="headingImage">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseImage" aria-expanded="false" aria-controls="collapseImage">เพิ่มรูปภาพ</button>
                                            </h5>
                                        </div>
                                        <div id="collapseImage" class="collapse" aria-labelledby="headingImage" data-parent="#accordion">
                                            <div class="card-body">
                                                <p class="mb-3"></p>
                                                <h3>เพิ่มรูปภาพ</h3>
                                                <div class="mb-2 input-group_RemoveThis">
                                                    <div class="custom-file">
                                                    <form action="{{route('image.store',$id)}}" method="post" enctype="multipart/form-data">
                                                        @csrf
                                                        Image: <input required type="file" name="image" id="image" accept="image/*"><br>
                                                        <button type="submit" class="btn btn-primary" id="btnSaveImage">
                                                            <i class="fas fa-save">
                                                            </i>
                                                            บันทึกรูปภาพ
                                                        </button>
                                                    </form>
                                                        <!-- <form name="FORMImageUpload" method="post">
                                                            <input type="hidden" id="txtSelectImageType" name="txtSelectImageType" value="img">
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" id="txt_file_name" readonly>
                                                                <label class="input-group-btn">
                                                                    <span class="btn btn-info">
                                                                        Browse...
                                                                        <input class="input" type="file" id="fileupload" name="fileupload" style="display: none;" multiple>
                                                                    </span>
                                                                </label>
                                                            </div>
                                                            <input type="hidden" id="page_id" name="page_id" value="5523">
                                                        </form> -->
                                                    </div>
                                                </div>
                                                <div>
                                                    <label class="mb-3 mt-2">ขนาดความกว้างรูปภาพที่เหมาะสมคือ
                                                        1200px</label>
                                                </div>
                                              
                                                <p class="mb-0">&nbsp;</p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END UPLOAD IMAGE -->

                                    <!-- START UPLOAD VIDEO -->
                                    <div class="card">
                                        <div class="card-header" id="headingVideo">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseVideo" aria-expanded="false" aria-controls="collapseVideo">เพิ่มวิดีโอ</button>
                                            </h5>
                                        </div>
                                        <div id="collapseVideo" class="collapse" aria-labelledby="headingVideo" data-parent="#accordion">
                                            <form action="{{route('video.store',$id)}}" method="post">
                                                @csrf
                                                <div class="card-body">
                                                    <p class="mb-3"></p>
                                                    <h3>เพิ่มวิดีโอ</h3>
                                                    <div class="mb-2">
                                                        <input class="form-control" type="text" name="video" value="" placeholder="Youtube or Facebook Video URL">
                                                    </div>
                                                    <button type="submit" class="btn btn-primary" id="btnSaveVideo">
                                                        <i class="fas fa-save"></i>
                                                        บันทึก Video URL
                                                    </button>
                                                    <p class="mb-0">&nbsp;</p>
                                                </div>
                                            </form>
                                            
                                        </div>
                                    </div>
                                    <!-- END UPLOAD VIDEO -->

                                    <!-- START ADD ARTICLE -->
                                    <div class="card">
                                        <div class="card-header" id="headingArticle">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collpsed" data-toggle="collapse" data-target="#collapseArticle" aria-expanded="false" aria-controls="collapseArticle">
                                                    เพิ่มบทความ
                                                </button>
                                            </h5>
                                        </div>
                                        <form action="{{route('article.store',$id)}}" method="post">
                                            @csrf
                                            <div id="collapseArticle" class="collapse" aria-labelledby="headingArticle" data-parent="#accordion">
                                                <p class="mb-0">&nbsp;</p>
                                                <div class="container">
                                                    <textarea name="content"></textarea>
                                                </div>
                                                <p class="mb-0">&nbsp;</p>
                                                <button type="submit" class="btn btn-primary" id="btnSaveArticle">
                                                    <i class="fas fa-save"></i>
                                                    บันทึกบทความ
                                                </button>
                                                <p class="mb-0">&nbsp;</p>
                                            </div>
                                        </form>
                                       
                                    </div>
                                    <!-- END ADD ARTICLE -->

                                    <!-- START CONTACT -->
                                    <div class="card">
                                        <div class="card-header" id="headingContactButton">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseContactButton" aria-expanded="false" aria-controls="collapseContactButton">
                                                    เพิ่มปุ่มติดต่อสอบถาม
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseContactButton" class="collapse" aria-labelledby="headingContactButton" data-parent="#accordion">
                                            <div class="card-body">
                                                <p class="mb-3"></p>
                                                <h3>เพิ่มปุ่มติดต่อสอบถาม</h3>
                                                <form action="{{route('social_button.store',$id)}}" method="post">
                                                    @csrf
                                                    <div class="mb-2">
                                                        <select class="browser-default custom-select" name="button" id="txtButtonType" required>
                                                            <option selected value="">เลือกช่องทางการติดต่อ</option>
                                                            <option value="line">Line</option>
                                                            <option value="facebook">Facebook</option>
                                                            <option value="phone">Phone Number</option>
                                                        </select>
                                                    </div>
                                                    <div class="mb-2">
                                                        <input class="form-control" type="text" name="content" placeholder="กรอกลิ๊งค์ปลายทางหรือเบอร์ติดต่อ" id="txtContactLink">
                                                    </div>
                                                    <button type="submit" class="btn btn-primary" id="btnSaveContactButton">
                                                        <i class="fas fa-save"></i>
                                                        บันทึกปุ่มติดต่อ
                                                    </button>
                                                </form>
                                              
                                                <p class="mb-0">&nbsp;</p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END CONTACT -->

                                    <!-- START PROMOTION -->
                                    <div class="card">
                                        <div class="card-header" id="headingCountDown">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseCountDown" aria-expanded="false" aria-controls="collapseCountDown">
                                                    เพิ่มตัวนับเวลาถอยหลัง (สำหรับจัดโปร)
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseCountDown" class="collapse" aria-labelledby="headingCountDown" data-parent="#accordion">
                                            <div class="card-body">
                                                <p class="mb-3"></p>
                                                <h3>ตั้งค่าเวลาสิ้นสุดโปรโมชั่น</h3>
                                                <form action="{{route('timer.store',$id)}}" method="post">
                                                    @csrf
                                                   
                                                          <input type="text" name="timer" id="datetimepicker">
                                                       
                                                <button  class="btn btn-primary" id="btnSaveCountDown">
                                                    <i class="fas fa-save"></i>
                                                    บันทึกเวลา
                                                </button>
                                                </form>
                                                    
                                                <p class="mb-0">&nbsp;</p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END PROMOTION -->
                                </div>
                                <!-- END -->
                                <p class="mb-0">&nbsp;</p>
                                <div class="text-center">
                                    <button class="btn btn-success" href="#" data-dismiss="modal" id="BtnClosedAndPreview">
                                        <i class="fas fa-eye"></i>
                                        บันทึกและดูตัวอย่าง
                                    </button>
                                </div>
                                <p class="mb-0">&nbsp;</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END myModal1 -->

        <table>
        <tr>
            <th style="width:10px;">ID</th>
            <th>IMAGE</th>
            <th style="width:150px;"></th>
        </tr>
        {{-- <?php
            $stmt = $app->query("SELECT id, image_name FROM images");
            $stmt->execute();
            while ($row = $stmt->fetch()) {
        ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><img width="20%" src="upload/<?php echo $row['image_name']; ?>"></td>
            <td>
                <button class="default" onClick="javascript:window.location.href='?update&id=<?php echo $row['id']; ?>'">update</button>
                <button class="cancel" onClick="javascript:window.location.href='process.php?id=<?php echo $row['id']; ?>'">delete</button>
            </td>
        </tr>
        <?php } ?> --}}
    </table>

        <!-- START myModal2 -->
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="modal" id="myModal2">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header center">
                                    <h1>จัดการหน้า THANK YOU PAGE</h1>
                                </div>
                                <table class="table table-striped">
                                    <thead class="thead-dark">
                                        <tr class="text-center">
                                            <th>ปรับตำแหน่ง</th>
                                            <th>ชนิดข้อมูล</th>
                                            <th>หน้าภาพตัวอย่าง</th>
                                            <th>รายละเอียด</th>
                                            <th>แก้ไข</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="text-center">
                                            <td>ยังไม่มีเนื้อหาใดๆ</td>
                                            <td><a href="#"></a>ยังไม่มีเนื้อหาใดๆ</td>
                                            <td>ยังไม่มีเนื้อหาใดๆ</td>
                                            <td>ยังไม่มีเนื้อหาใดๆ</td>
                                            <td>ยังไม่มีเนื้อหาใดๆ</td>
                                        </tr>
                                    </tbody>
                                </table>


                                <!-- START -->
                                <!-- START UPLOAD IMAGE -->
                                <div id="accordion" class="text-center">
                                    <div class="card">
                                        <div class="card-header" id="headingImage">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseImage2" aria-expanded="false" aria-controls="collapseImage">เพิ่มรูปภาพ</button>
                                            </h5>
                                        </div>
                                        <div id="collapseImage2" class="collapse" aria-labelledby="headingImage" data-parent="#accordion">
                                            <div class="card-body">
                                                <p class="mb-3"></p>
                                                <h3>เพิ่มรูปภาพ</h3>
                                                <div class="mb-2 input-group_RemoveThis">
                                                    <div class="custom-file">
                                                   <form action="{{route('thankyou.storeImage',$id)}}" method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    Image: <input required type="file" name="image" id="image" accept="image/*"><br>
                                                    <button type="submit" class="btn btn-primary" id="btnSaveImage">
                                                        <i class="fas fa-save">
                                                        </i>
                                                        บันทึกรูปภาพ
                                                    </button>
                                                   </form>
                                                   
                                                        
                                                    </div>
                                                </div>
                                                <div>
                                                    <label class="mb-3 mt-2">ขนาดความกว้างรูปภาพที่เหมาะสมคือ
                                                        1200px</label>
                                                </div>
                                                
                                                <p class="mb-0">&nbsp;</p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END UPLOAD IMAGE -->

                                        

                                    <!-- START ADD ARTICLE -->
                                    <div class="card">
                                        <div class="card-header" id="headingArticle">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collpsed" data-toggle="collapse" data-target="#collapseArticle2" aria-expanded="false" aria-controls="collapseArticle">
                                                    เพิ่มบทความ
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseArticle2" class="collapse" aria-labelledby="headingArticle" data-parent="#accordion">
                                            <p class="mb-0">&nbsp;</p>
                                            <div class="container">
                                                <textarea name="content2"></textarea>
                                            </div>
                                            <p class="mb-0">&nbsp;</p>
                                            <button type="button" class="btn btn-primary" id="btnSaveArticle">
                                                <i class="fas fa-save"></i>
                                                บันทึกบทความ
                                            </button>
                                            <p class="mb-0">&nbsp;</p>
                                        </div>
                                    </div>
                                    <!-- END ADD ARTICLE -->

                                    <!-- START CONTACT -->
                                    <div class="card">
                                        <div class="card-header" id="headingContactButton">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseContactButton2" aria-expanded="false" aria-controls="collapseContactButton">
                                                    เพิ่มปุ่มติดต่อสอบถาม
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseContactButton2" class="collapse" aria-labelledby="headingContactButton" data-parent="#accordion">
                                            <div class="card-body">
                                                <p class="mb-3"></p>
                                                <h3>เพิ่มปุ่มติดต่อสอบถาม</h3>
                                                <div class="mb-2">
                                                    <select class="browser-default custom-select" id="txtButtonType">
                                                        <option selected value="no">เลือกช่องทางการติดต่อ</option>
                                                        <option value="no">Line</option>
                                                        <option value="no">Facebook</option>
                                                    </select>
                                                </div>
                                                <div class="mb-2">
                                                    <input class="form-control" type="text" placeholder="กรอกลิ๊งค์ปลายทาง" id="txtContactLink">
                                                </div>
                                                <button type="button" class="btn btn-primary" id="btnSaveContactButton">
                                                    <i class="fas fa-save"></i>
                                                    บันทึกปุ่มติดต่อ
                                                </button>
                                                <p class="mb-0">&nbsp;</p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END CONTACT -->
                                </div>
                                <!-- END -->
                                <p class="mb-0">&nbsp;</p>
                                <div class="text-center">
                                    <button class="btn btn-success" href="#" data-dismiss="modal" id="BtnClosedAndPreview">
                                        <i class="fas fa-eye"></i>
                                        บันทึกและดูตัวอย่าง
                                    </button>
                                </div>
                                <p class="mb-0">&nbsp;</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END myModal2-->

        <!-- START myModal3-->
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="modal" id="myModal3">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header center">
                                    <div class="col-lg-12">
                                        <h2>เพิ่มรายการสินค้า</h2>
                                    </div>
                                    <table class="table table-striped">
                                        <thead class="thead-dark">
                                            <tr class="text-center">
                                                <th>ลำดับที่</th>
                                                <th>รายการสินค้า</th>
                                                <th>หน้าราคาสินค้า</th>
                                                <th>แก้ไข</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($product as $pd)
                                            <tr class="text-center">
                                                <td>{{$loop->iteration}}</td>
                                                <td><a href="#"></a>{{$pd->description}}</td>
                                                <td>{{$pd->price}}</td>
                                                <td><button class="btn btn-success">แก้ไข</button></td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <form action="{{route('product.store',$id)}}" method="post">
                                        @csrf
                                        <h3>เพิ่มรายการสินค้า</h3>
                                        <div class="mb-3 text-left">
                                            <label>รายละเอียดสินค้า : </label>
                                            <input class="form-control" type="text" name="description" placeholder="รายละเอียดสินค้า" id="txtProductDetail">
                                        </div>
                                        <div class="mb-2 text-left">
                                            <label>ราคาสินค้า (บาท): </label>
                                            <input class="form-control" type="number" name="price" placeholder="ราคาสินค้า (เฉพาะตัวเลข)" id="txtProductPrice" min="0" data-bind="value:replyNumber">
                                        </div>
                                        <p class="mb-0">&nbsp;</p>
                                        <div class="text-center">
                                            <button class="btn btn-success">
                                                <i class="fas fa-eye"></i>
                                                เพิ่มรายการสินค้า
                                            </button>
                                        </div>
                                    </form>
                                  
                                    <p class="mb-0">&nbsp;</p>
                                    <div class="text-right">
                                        <button class="btn btn-success" href="#" data-dismiss="modal" id="BtnClosedProductModal">
                                            <i class="fas fa-save">

                                            </i>
                                            บันทึกและปิด
                                        </button>
                                    </div>
                                </div>
                                <p class="mb-0">&nbsp;</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END myModal3-->


        <!-- START myModal4-->
        <div class="modal-body text-center">
            <div class="container">
                <div class="row ">
                    <div class="col-md-12">
                        <div class="modal" id="myModal4">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header center">
                                        <div class="col-lg-12">
                                            <h2>
                                                จัดการค่าจัดส่งสินค้า
                                            </h2>
                                            <hr>
                                            <form action="{{route('express.store',$id)}}" method="post">
                                                @csrf
                                                <input type="hidden" id="method" name="method" value="">
                                                <div class="row">
                                                    <div class="col-2">
                                                        <div class="toggle-btn" data-id="1"  >
                                                            <div class="inner-circle"></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-5 text-left ml-2">
                                                        <label>ฟรีค่าจัดส่ง</label>
                                                    </div>
                                                    <div class="col-3">
                                                        &nbsp;
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-2">
                                                        <div class="toggle-btn" data-id="2" >
                                                            <div class="inner-circle"></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-5 text-left ml-2">
                                                        คิดค่าจัดส่งด้วยอัตราเท่าๆกัน ในราคาชิ้นละ
                                                    </div>
                                                    <div class="col-3">
                                                        <input class="form-control" type="number" value="0" name="price" id="txt_shipping_fixed" min="0" data-bind="value:replyNumber">
                                                    </div>
                                                    <div class="col-1">
                                                        บาท
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-2">
                                                        <div class="toggle-btn" data-id="3" >
                                                            <div class="inner-circle"></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-5 text-left ml-2">
                                                        คิดค่าจัดส่งชิ้นแรก
                                                    </div>
                                                    <div class="col-3">
                                                        <input class="form-control" type="number" value="50" name="price1" id="txt_shipping_first_unit" min="0" data-bind="value:replyNumber">
                                                    </div>
                                                    <div class="col-1">
                                                        บาท
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-2">
                                                        &nbsp;
                                                    </div>
                                                    <div class="col-5 text-left ml-2">
                                                        คิดค่าจัดส่งชิ้นถัดไป
                                                    </div>
                                                    <div class="col-3">
                                                        <input class="form-control" type="number" value="0" name="price2" id="txt_shipping_next_unit" min="0" data-bind="value:replyNumber">
                                                    </div>
                                                    <div class="col-1">
                                                        บาท
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-2">
                                                        &nbsp;
                                                    </div>
                                                    <div class="col-5 text-left ml-2">
                                                        เก็บเงินปลายทางบวกเพิ่ม
                                                    </div>
                                                    <div class="col-3">
                                                        <input class="form-control" type="number" value="0" name="COD" id="txt_shipping_next_unit" min="0" data-bind="value:replyNumber">
                                                    </div>
                                                    <div class="col-1">
                                                        บาท
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-12 text-left ml-2">
                                                        <label>
                                                            <strong>*หมายเหตุ : </strong>
                                                            จาก 3 ตัวเลือกด้านบน สามารถเปิด (on)
                                                            ใช้งานได้เพียงรูปแบบใดรูปแบบหนึ่งเท่านั้น
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="text-right">
                                                    <button class="btn btn-success" type="submit">
                                                        <i class="fas fa-save">
    
                                                        </i>
                                                        บันทึก
                                                    </button>
                                                </div>
                                            </form>
                                            
                                          
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END myModal4-->


        <!-- START myModal6-->
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="modal" id="myModal5">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header center">
                                    <div class="col-lg-12">
                                        <h2>LINE TOKEN</h2>
                                    </div>
                                    <table class="table table-striped">
                                        <thead class="thead-dark">
                                            <tr class="text-center">
                                                <th>ลำดับที่</th>
                                                <th>ชนิดข้อมูล</th>
                                                <th>รายละเอียดชนิดข้อมูล</th>
                                                <th>แก้ไข</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="text-center">
                                                <td>ยังไม่มีเนื้อหาใดๆ</td>
                                                <td><a href="#"></a>ยังไม่มีเนื้อหาใดๆ</td>
                                                <td>ยังไม่มีเนื้อหาใดๆ</td>
                                                <td>ยังไม่มีเนื้อหาใดๆ</td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <h3>เพิ่ม Line Token</h3>
                                    <div class="mb-3 text-left">
                                        <input class="form-control" type="text" placeholder="Line Token" id="txtProductDetail">
                                    </div>
                                    <p class="mb-0">&nbsp;</p>
                                    <div class="text-right">
                                        <button class="btn btn-success" href="#" data-dismiss="modal" id="BtnClosedProductModal">
                                            <i class="fas fa-save">

                                            </i>
                                            บันทึก Line Token
                                        </button>
                                    </div>
                                </div>
                                <p class="mb-0">&nbsp;</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END myModal5-->

        <!-- START myModal6-->
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="modal" id="myModal6">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header center">
                                    <div class="col-lg-12">
                                        <h2>FACEBOOK PIXEL</h2>
                                    </div>
                                    <table class="table table-striped">
                                        <thead class="thead-dark">
                                            <tr class="text-center">
                                                <th>ลำดับที่</th>
                                                <th>ชนิดข้อมูล</th>
                                                <th>รายละเอียดชนิดข้อมูล</th>
                                                <th>แก้ไข</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="text-center">
                                                <td>ยังไม่มีเนื้อหาใดๆ</td>
                                                <td><a href="#"></a>ยังไม่มีเนื้อหาใดๆ</td>
                                                <td>ยังไม่มีเนื้อหาใดๆ</td>
                                                <td>ยังไม่มีเนื้อหาใดๆ</td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <h3>Facebook Pixel ID</h3>
                                    <div class="mb-3 text-left">
                                        <input class="form-control" type="text" placeholder="Facebook Pixel ID" id="txtProductDetail">
                                    </div>
                                    <p class="mb-0">&nbsp;</p>
                                    <div class="text-right">
                                        <button class="btn btn-success" href="#" data-dismiss="modal" id="BtnClosedProductModal">
                                            <i class="fas fa-save">

                                            </i>
                                            บันทึก Facebook Pixel ID
                                        </button>
                                    </div>
                                </div>
                                <p class="mb-0">&nbsp;</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END myModal6-->


        <!-- START myModal7-->
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="modal" id="myModal7">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header center">
                                    <div class="col-lg-12">
                                        <h2>TIKTOK PIXEL</h2>
                                    </div>
                                    <table class="table table-striped">
                                        <thead class="thead-dark">
                                            <tr class="text-center">
                                                <th>ลำดับที่</th>
                                                <th>ชนิดข้อมูล</th>
                                                <th>รายละเอียดชนิดข้อมูล</th>
                                                <th>แก้ไข</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="text-center">
                                                <td>ยังไม่มีเนื้อหาใดๆ</td>
                                                <td><a href="#"></a>ยังไม่มีเนื้อหาใดๆ</td>
                                                <td>ยังไม่มีเนื้อหาใดๆ</td>
                                                <td>ยังไม่มีเนื้อหาใดๆ</td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <h3>TikTok Pixel ID</h3>
                                    <div class="mb-3 text-left">
                                        <input class="form-control" type="text" placeholder="TikTok Pixel ID" id="txtProductDetail">
                                    </div>
                                    <p class="mb-0">&nbsp;</p>
                                    <div class="text-right">
                                        <button class="btn btn-success" href="#" data-dismiss="modal" id="BtnClosedProductModal">
                                            <i class="fas fa-save">

                                            </i>
                                            บันทึก TikTok Pixel ID
                                        </button>
                                    </div>
                                </div>
                                <p class="mb-0">&nbsp;</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END myModal7-->

        <!-- START myModal8-->
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="modal" id="myModal8">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header center">
                                    <div class="col-lg-12">
                                        <h2>LINE TAG</h2>
                                    </div>
                                    <table class="table table-striped">
                                        <thead class="thead-dark">
                                            <tr class="text-center">
                                                <th>ลำดับที่</th>
                                                <th>ชนิดข้อมูล</th>
                                                <th>รายละเอียดชนิดข้อมูล</th>
                                                <th>แก้ไข</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="text-center">
                                                <td>ยังไม่มีเนื้อหาใดๆ</td>
                                                <td><a href="#"></a>ยังไม่มีเนื้อหาใดๆ</td>
                                                <td>ยังไม่มีเนื้อหาใดๆ</td>
                                                <td>ยังไม่มีเนื้อหาใดๆ</td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <h3>LINE Tag ID</h3>
                                    <div class="mb-3 text-left">
                                        <input class="form-control" type="text" placeholder="LINE Tag ID" id="txtProductDetail">
                                    </div>
                                    <p class="mb-0">&nbsp;</p>
                                    <div class="text-right">
                                        <button class="btn btn-success" href="#" data-dismiss="modal" id="BtnClosedProductModal">
                                            <i class="fas fa-save">

                                            </i>
                                            บันทึก LINE Tag ID
                                        </button>
                                    </div>
                                </div>
                                <p class="mb-0">&nbsp;</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END myModal8-->


        <!-- START myModal9-->
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="modal" id="myModal9">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header center">
                                    <div class="col-lg-12">
                                        <h2>บัญชี ธนาคาร</h2>
                                    </div>
                                    <table class="table table-striped">
                                        <thead class="thead-dark">
                                            <tr class="text-center">
                                                <th>ลำดับที่</th>
                                                <th>ชื่อบัญชี</th>
                                                <th>ธนาคาร</th>
                                                <th>เลขบัญชี</th>
                                                <th>แก้ไข</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if($bank)
                                            <tr class="text-center">
                                                <td>1</td>
                                                <td><a href="#"></a>{{$bank->name}}</td>
                                                <td>{{$bank->bank_name}}</td>
                                                <td>{{$bank->bank_number}}</td>
                                                <td><button class="btn btn-success">แก้ไข</button></td>
                                            </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                    <form action="{{route('bank.store',$id)}}" method="post">
                                        @csrf
                                        <div class="mb-3 text-left">
                                            <input class="form-control" type="text" name="name" placeholder="ซื่อบัญชี" id="txtProductDetail">
                                        </div>
                                        <p class="mb-0">&nbsp;</p>
    
                                        <div class="mb-2">
                                            <select class="browser-default custom-select" name="bank_name" id="txtButtonType">
                                                <option selected value="no">เลือกช่องทางการติดต่อ</option>
                                                <option value="ธนาคารกรุงเทพ">ธนาคารกรุงเทพ</option>
                                                <option value="ธนาคารกสิกรไทย">ธนาคารกสิกรไทย</option>
                                                <option value="ธนาคารกรุงไทย">ธนาคารกรุงไทย</option>
                                                <option value="ธนาคารทหารไทย">ธนาคารทหารไทย</option>
                                                <option value="ธนาคารไทยพาณิชย์">ธนาคารไทยพาณิชย์</option>
                                                <option value="ธนาคารกรุงศรีอยุธยา">ธนาคารกรุงศรีอยุธยา</option>
                                                <option value="ธนาคารเกียรตินาคิน">ธนาคารเกียรตินาคิน</option>
                                                <option value="ธนาคารซีไอเอ็มบีไทย">ธนาคารซีไอเอ็มบีไทย</option>
                                                <option value="ธนาคารทิสโก้">ธนาคารทิสโก้</option>
                                                <option value="ธนาคารธนชาต">ธนาคารธนชาต</option>
                                                <option value="ธนาคารญูโอบี">ธนาคารญูโอบี</option>
                                                <option value="ธนาคารออมสิน">ธนาคารออมสิน</option>
                                            </select>
                                        </div>
    
    
                                        <div class="mb-3 text-left">
                                            <input class="form-control" type="text" name="bank_number" placeholder="เลขบัญชี" id="txtProductDetail">
                                        </div>
    
                                        <div class="text-right">
                                            <button class="btn btn-success" >
                                                <i class="fas fa-save">
                                                </i>
                                                บันทึกข้อมูล
                                            </button>
                                    </form>
                                    
                                    </div>
                                </div>
                                <p class="mb-0">&nbsp;</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END myModal9-->


    </div>

    <div class="row mx-0">
        <div class="col text-center mx-0 px-0">
          <div class="img">
              @foreach($image as $im)
              @if($im->content_type == 'image')
                <img src="/public/images/sales_page_image/{{$im->content}}" width="100%" heigh="auto">
                @elseif($im->content_type == 'content')
                <div>{!!$im->content!!}</div>
                @elseif($im->content_type == 'video')
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="{{$im->content}}" allowfullscreen></iframe>
                  </div>
                @elseif($im->content_type == 'ตัวนับถอยหลัง')
                <input type="hidden" id="time_countdown" value="{{Carbon\Carbon::now()->diffInSeconds($im->content)}}">
                <div class="clock d-flex justify-content-center"></div>
                @elseif($im->content_type == 'facebook')
                <div><a class="btn btn-primary" href="{{$im->content}}" target="_blank">facebook</a></div>
                @endif
              @endforeach
              
          </div>
        </div>
      </div>
      <form method="post" action="{{route('order.store',$id)}}" enctype="multipart/form-data">
        @csrf
      <div class="row pt-4">
        <div class="container">
            <h1 class="text-center">สั่งซื้อสินค้า</h1>
                <hr>
                @foreach($product as $pd)
                <div class="card mb-2 product_section">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-check my-2 mx-2">
                                <input class="form-check-input product_checkbox" data-price="{{$pd->price}}" name="product_checkbox" type="checkbox" value="{{$pd->id}}" id="flexCheckDefault">
                                
                            </div>
                        </div>
                        <div class="col-6">
                            <h5 class="my-2 mx-2">{{$pd->price}} บาท</h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4 my-2 ml-2">
                            <h5>{{$pd->description}}</h5>
                        </div>
                        <div class="col-6">
                            <div class="form-group my-2 mx-2">
                                <input type="number" value="1" name="product_count"  class="form-control product_count" >
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            @if($express)
            <div class="justify-content-end">
                @if($express->method == 1)
                <p>ฟรีค่าจัดส่ง</p>
                <p>กรณีเก็บเงินปลายทาง มีค่าธรรมเนียมเพิ่ม {{$express->COD}} บาท</p>
                @elseif($express->method == 2)
                <p>ค่าจัดส่งเท่ากันในอัตราชิ้นละ {{$express->price1}}</p>
                <p>กรณีเก็บเงินปลายทาง มีค่าธรรมเนียมเพิ่ม {{$express->COD}} บาท</p>
                @elseif($express->method ==3)
                <p>ค่าจัดส่งชิ้นแรก {{$express->price1}}</p>
                <p>ค่าจัดส่งชิ้นถัดไป {{$express->price2}}</p>
                <p>กรณีเก็บเงินปลายทาง มีค่าธรรมเนียมเพิ่ม {{$express->COD}} บาท</p>
                @endif
            </div>
            @endif

            <hr>
            <div class="justify-content-end">
               <h5>ค่าสินค้า <span id="product_price">0</span>  บาท</h5>
               <h5>ค่าส่ง <span id="express_price">0</span> บาท</h5>
               <h5>ยอดรวมส่ง <span id="sum_price">0</span>  บาท</h5>
            </div>

        </div>
          
        
      </div>

      <div class="row pt-4 pb-4">
        <div class="container">
            <h1 class="">กรอกชื่อที่อยู่ในการจัดส่ง</h1>
                <hr>
                
                    <input type="hidden" name="summary_price" value="" id="summary_price">
                    <div class="form-row">
                      <div class="col-12 pt-2">
                        <label for="name">ชื่อ - นามสกุล</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="" required>
                      </div>
                     
                      <div class="col-12 pt-2">
                        <label for="phone">เบอร์โทร</label>
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone number" value="" required>
                      </div>
                    </div>
                    <div class="form-row">
                        <div class="col-12 pt-2">
                          <label for="name">ชื่อเฟส,ไลน์ไอดี, หรืออีเมลล์ (กรอกเพียงอย่างใดอย่างหนึ่ง)</label>
                          <input type="text" class="form-control" id="social" name="social" placeholder="Social" value="" required>
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="col-12 pt-2">
                          <label for="name">ที่อยู่ในการจัดส่ง</label>
                          <textarea class="form-control" id="address" name="address" placeholder="Address" value="" required></textarea>
                        </div>
                        
                      </div>

                    <div class="pt-4">
                        <h3>รูปแบบการชำระเงิน</h3>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="customRadioInline1" name="banking" value="1" class="custom-control-input method" checked>
                            <label class="custom-control-label" for="customRadioInline1">แบบโอนเงิน</label>
                          </div>
                          <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="customRadioInline2" name="banking" value="0" class="custom-control-input method">
                            <label class="custom-control-label" for="customRadioInline2">แบบเก็บปลายทาง</label>
                          </div>
                    </div>
                    @if($bank)
                    <div class="pt-4 banking">
                        <h3>ข้อมูลบัญชีธนาคาร</h3>
                        <p><span class="font-weight-bold">ชื่อบัญชี</span> : {{$bank->name}}</p>
                        <p><span class="font-weight-bold">ชื่อธนาคาร</span> : {{$bank->bank_name}}</p>
                        <p><span class="font-weight-bold">เลขบัญชี</span> : {{$bank->bank_number}}</p>
                    </div>
                    @endif
                    <hr>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="file" id="customFile">
                        <label class="custom-file-label"  for="customFile">Choose file</label>
                      </div>
                    <div class="text-center pt-3">
                        <button class="btn btn-success text-center">ยืนยันคำสั่งซื้อ</button>
                    </div>
                      
                   
                      
                    
                  </form>
        </div>
      </div>


    <!-- <script></script> -->

    <script src="ckeditor 3/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('content')
    </script>
    <script src="ckeditor 3/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('content2')
    </script>



    <!-- <script src="ckeditor3/ckeditor.js"></script>
            <script>
                CKEDITOR.replace('content1');
            </script> -->

    <script src="https://kit.fontawesome.com/yourcode.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="/public/assets/js/flipclock.min.js"></script>
    <script src="/public/assets/js/jquery.datetimepicker.full.js"></script>
    
</body>

</html>



    <script>
    $(document).ready(function(){
        $(".up,.down,.top,.bottom").click(function(){
            var row = $(this).parents("tr:first");
            if ($(this).is(".up")) {
                row.insertBefore(row.prev());
            } else if ($(this).is(".down")) {
                row.insertAfter(row.next());
            } else if ($(this).is(".top")) {
                //row.insertAfter($("table tr:first"));
                row.insertBefore($("table tr:first"));
            }else {
                row.insertAfter($("table tr:last"));
            }
            sendOrderToServer();
        });
        
        function sendOrderToServer() {
          var order = [];
          let id = "{{$id}}";
          $('tr.row1').each(function(index,element) {
            order.push({
              id: $(this).attr('data-id'),
              position: index+1
            });
          });
          console.log(order);
          $.ajax({
            type: "POST", 
            dataType: "json", 
            url: "{{ route('salepage.reorder') }}",
                data: {
              order: order,
              id:id,
              _token: "{{csrf_token()}}"
            },
            success: function(response) {
                if (response.status == "success") {
                  console.log(response);
                } else {
                  console.log(response);
                }
            }
          });
        }
    });
    </script>
<script>
    $(document).ready(function(){
        var check = {!!json_encode($image)!!}
    $.each(check, function(i) {
    if(check[i].content_type == 'ตัวนับถอยหลัง')
    {
        var clock = $('.clock').FlipClock({ 
        clockFace: 'DailyCounter',
        autoStart: false,
        callbacks: {
        stop: function() {
            $('.message').html('The clock has stopped!')
        }
        }
        }); 
        let timer_time = parseInt($('#time_countdown').val());
        // set time
        clock.setTime(timer_time);

        // countdown mode
        clock.setCountdown(true);

        // start the clock
        clock.start();
    }
    });
    })
    
</script>
<script>
    $('#datetimepicker').datetimepicker({
        inline:true,
    });

   

</script>
<script>
    $(document).on('click','.product_checkbox',function(){
        var array = [];
        let sum = 0;
        $('.product_section  input:checked').each(function(index,element) {
            let count = $(this).closest('.card').find('.product_count').val();
            array.push({
                price : $(this).data('price'),
                count : count,
            });
           
          });
          array.forEach(function(number) {
            sum+= number.price*number.count;
            });
            $('#sum_price').html(sum);
            $('#product_price').html(sum);
      
      
    })
    $(document).on('keyup','.product_count',function(){
        var array = [];
        let sum = 0;
        $('.product_section  input:checked').each(function(index,element) {
            let count = $(this).closest('.card').find('.product_count').val();
            array.push({
                price : $(this).data('price'),
                count : count,
            });
           
          });
          array.forEach(function(number) {
            sum+= number.price*number.count;
            });
            $('#sum_price').html(sum);
            $('#product_price').html(sum);
    })
</script>

<script>
    $(document).ready(function(){
        var express_id = {!! json_encode($express) !!};
        $('.toggle-btn[data-id="'+express_id.method+'"]').addClass('active');
    });
    $(document).on('click','.toggle-btn',function(){
        $('.toggle-btn').removeClass('active');

        let method = $(this).data('id');
        $('#method').val(method);
        this.classList.toggle('active');
    })

</script>

<script>
    $(document).on('click','.method',function(){

        if($(this).val() == 1)
        {
            $('.banking').show();
            let product_price = $('#product_price').text();

            product_price = parseInt(product_price);

            $('#express_price').html(0);

            $('#sum_price').html(product_price)
            
        }
        else
        {
            var express = {!! json_encode($express) !!};
            let product_price = $('#product_price').text();

            product_price = parseInt(product_price);

            $('#express_price').html(express.COD);
            let sum_price = product_price + parseInt(express.COD);

            $('#sum_price').html(sum_price)
            // express_price
            // sum_price
            $('.banking').hide();
        }
    })
</script>

<script>
    $('.custom-file-input').on('change', function(){
            $('#imgUpload').show();
            $('#btn-example-file-reset').show();
        var fileName = $(this).val().split('\\').pop()
        $(this).siblings('.custom-file-label').html(fileName)
        if (this.files[0]) {
            var reader = new FileReader()
            $('.figure').addClass('d-block')
            reader.onload = function (e) {
                $('#imgUpload').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0])
            $('#btn-example-file-reset').on('click', function() {   
                $('#imgUpload').hide();
                $('#btn-example-file-reset').hide();
                $('.custom-file-label').text('เลือกรูปภาพ');
                fileName = '';
            });
        }
    })
</script>
