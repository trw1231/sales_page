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
                                        <tr class="text-center">
                                            <td>
                                                <select name="content_sort" id="content_sort">
                                                    <option selected="selected">
                                                        {{$im->sort}}
                                                        </option>
                                                    @foreach($image as $im2)
                                                        <option value="{{$loop->iteration}}">{{$im2->sort}}</option>
                                                    @endforeach
                                                  </select>
                                            </td>
                                            <td><a href="#"></a>รูปภาพ</td>
                                            <td><img src="/public/images/sales_page_image/{{$im->image_name}}" width="20%"></td>
                                            <td>
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
                                            <div class="card-body">
                                                <p class="mb-3"></p>
                                                <h3>เพิ่มวิดีโอ</h3>
                                                <div class="mb-2">
                                                    <input class="form-control" type="text" placeholder="Youtube or Facebook Video URL">
                                                </div>
                                                <button type="button" class="btn btn-primary" id="btnSaveVideo">
                                                    <i class="fas fa-save"></i>
                                                    บันทึก Video URL
                                                </button>
                                                <p class="mb-0">&nbsp;</p>
                                            </div>
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
                                        <div id="collapseArticle" class="collapse" aria-labelledby="headingArticle" data-parent="#accordion">
                                            <p class="mb-0">&nbsp;</p>
                                            <div class="container">
                                                <textarea name="content"></textarea>
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
                                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseContactButton" aria-expanded="false" aria-controls="collapseContactButton">
                                                    เพิ่มปุ่มติดต่อสอบถาม
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseContactButton" class="collapse" aria-labelledby="headingContactButton" data-parent="#accordion">
                                            <div class="card-body">
                                                <p class="mb-3"></p>
                                                <h3>เพิ่มปุ่มติดต่อสอบถาม</h3>
                                                <div class="mb-2">
                                                    <select class="browser-default custom-select" id="txtButtonType">
                                                        <option selected value="no">เลือกช่องทางการติดต่อ</option>
                                                        <option value="no">Line</option>
                                                        <option value="no">Facebook</option>
                                                        <option value="no">Phone Number</option>
                                                    </select>
                                                </div>
                                                <div class="mb-2">
                                                    <input class="form-control" type="text" placeholder="กรอกลิ๊งค์ปลายทางหรือเบอร์ติดต่อ" id="txtContactLink">
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
                                                <div class="row">
                                                    <div class="mb-2 col-6">
                                                        <input class="form-control hasDatepicker" type="text" placeholder="เลือกวันที่" id="txtCountDown">
                                                    </div>
                                                    <div class="col-6">
                                                        <select class="form-control" name="txtTimeList" id="txtTimeList">
                                                            <option value="00:00" selected>
                                                                เลือกเวลา
                                                            </option>
                                                            <option value="00:00" selected>
                                                                00:00
                                                            </option>
                                                            <option value="00:00" selected>
                                                                01:00
                                                            </option>
                                                            <option value="00:00" selected>
                                                                02:00
                                                            </option>
                                                            <option value="00:00" selected>
                                                                03:00
                                                            </option>
                                                            <option value="00:00" selected>
                                                                04:00
                                                            </option>
                                                            <option value="00:00" selected>
                                                                05:00
                                                            </option>
                                                            <option value="00:00" selected>
                                                                06:00
                                                            </option>
                                                            <option value="00:00" selected>
                                                                07:00
                                                            </option>
                                                            <option value="00:00" selected>
                                                                08:00
                                                            </option>
                                                            <option value="00:00" selected>
                                                                09:00
                                                            </option>
                                                            <option value="00:00" selected>
                                                                10:00
                                                            </option>
                                                            <option value="00:00" selected>
                                                                11:00
                                                            </option>
                                                            <option value="00:00" selected>
                                                                12:00
                                                            </option>
                                                            <option value="00:00" selected>
                                                                13:00
                                                            </option>
                                                            <option value="00:00" selected>
                                                                14:00
                                                            </option>
                                                            <option value="00:00" selected>
                                                                15:00
                                                            </option>
                                                            <option value="00:00" selected>
                                                                16:00
                                                            </option>
                                                            <option value="00:00" selected>
                                                                17:00
                                                            </option>
                                                            <option value="00:00" selected>
                                                                18:00
                                                            </option>
                                                            <option value="00:00" selected>
                                                                19:00
                                                            </option>
                                                            <option value="00:00" selected>
                                                                20:00
                                                            </option>
                                                            <option value="00:00" selected>
                                                                21:00
                                                            </option>
                                                            <option value="00:00" selected>
                                                                22:00
                                                            </option>
                                                            <option value="00:00" selected>
                                                                23:00
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <button type="button" class="btn btn-primary" id="btnSaveCountDown">
                                                    <i class="fas fa-save"></i>
                                                    บันทึกเวลา
                                                </button>
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
                                    <h1>จัดการหน้าเพจหลัก</h1>
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
                                                    <form action="process.php" method="post" enctype="multipart/form-data">
                                                        Image: <input required type="file" name="image" id="image" accept="image/*"><br>
                                                        <button type="submit" class="default" name="upload">Submit</button>
                                                        <button type="button" class="cancel" onClick="javascript:window.location.href='./'">Cancel</button>
                                                    </form>
                                                        <!-- <form name="process.php" method="post" enctype="multipart/form-data">
                                                            <input type="hidden" id="txtSelectImageType" name="txtSelectImageType" value="img">
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" id="txt_file_name" readonly>
                                                                <label class="input-group-btn custom-file-input">
                                                                    <span class="btn btn-info custom-file-label" id="imgUpload" onClick="javascript:window.location.href='?upload'">
                                                                        Browse...
                                                                        <input class="submit" type="file" id="upload" name="upload" style="display: none;" multiple>
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
                                                <button type="button" class="btn btn-primary" id="btnSaveImage">
                                                    <i class="fas fa-save">
                                                    </i>
                                                    บันทึกรูปภาพ
                                                </button>
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
                                            <tr class="text-center">
                                                <td>ยังไม่มีเนื้อหาใดๆ</td>
                                                <td><a href="#"></a>ยังไม่มีเนื้อหาใดๆ</td>
                                                <td>ยังไม่มีเนื้อหาใดๆ</td>
                                                <td>ยังไม่มีเนื้อหาใดๆ</td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <h3>เพิ่มรายการสินค้า</h3>
                                    <div class="mb-3 text-left">
                                        <label>รายละเอียดสินค้า : </label>
                                        <input class="form-control" type="text" placeholder="รายละเอียดสินค้า" id="txtProductDetail">
                                    </div>
                                    <div class="mb-2 text-left">
                                        <label>ราคาสินค้า (บาท): </label>
                                        <input class="form-control" type="number" placeholder="ราคาสินค้า (เฉพาะตัวเลข)" id="txtProductPrice" min="0" data-bind="value:replyNumber">
                                    </div>
                                    <p class="mb-0">&nbsp;</p>
                                    <div class="text-center">
                                        <button class="btn btn-success" href="#" data-dismiss="modal" id="BtnClosedAndPreview">
                                            <i class="fas fa-eye"></i>
                                            เพิ่มรายการสินค้า
                                        </button>
                                    </div>
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
                                            <div class="row">
                                                <div class="col-2">
                                                    <div class="toggle-btn" onclick="this.classList.toggle('active')">
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
                                                    <div class="toggle-btn" onclick="this.classList.toggle('active')">
                                                        <div class="inner-circle"></div>
                                                    </div>
                                                </div>
                                                <div class="col-5 text-left ml-2">
                                                    คิดค่าจัดส่งด้วยอัตราเท่าๆกัน ในราคาชิ้นละ
                                                </div>
                                                <div class="col-3">
                                                    <input class="form-control" type="number" value="0" id="txt_shipping_fixed" min="0" data-bind="value:replyNumber">
                                                </div>
                                                <div class="col-1">
                                                    บาท
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-2">
                                                    <div class="toggle-btn" onclick="this.classList.toggle('active')">
                                                        <div class="inner-circle"></div>
                                                    </div>
                                                </div>
                                                <div class="col-5 text-left ml-2">
                                                    คิดค่าจัดส่งชิ้นแรก
                                                </div>
                                                <div class="col-3">
                                                    <input class="form-control" type="number" value="50" id="txt_shipping_first_unit" min="0" data-bind="value:replyNumber">
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
                                                    <input class="form-control" type="number" value="0" id="txt_shipping_next_unit" min="0" data-bind="value:replyNumber">
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
                                                    <input class="form-control" type="number" value="0" id="txt_shipping_next_unit" min="0" data-bind="value:replyNumber">
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
                                                <button class="btn btn-success" href="#" data-dismiss="modal" id="BtnClosedProductModal">
                                                    <i class="fas fa-save">

                                                    </i>
                                                    บันทึก
                                                </button>
                                            </div>
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
                                        <h2>LINE TAG</h2>
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
                                            <tr class="text-center">
                                                <td>ยังไม่มีเนื้อหาใดๆ</td>
                                                <td><a href="#"></a>ยังไม่มีเนื้อหาใดๆ</td>
                                                <td>ยังไม่มีเนื้อหาใดๆ</td>
                                                <td>ยังไม่มีเนื้อหาใดๆ</td>
                                                <td>ยังไม่มีเนื้อหาใดๆ</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="mb-3 text-left">
                                        <input class="form-control" type="text" placeholder="ซื่อบัญชี" id="txtProductDetail">
                                    </div>
                                    <p class="mb-0">&nbsp;</p>

                                    <div class="mb-2">
                                        <select class="browser-default custom-select" id="txtButtonType">
                                            <option selected value="no">เลือกช่องทางการติดต่อ</option>
                                            <option value="no">ธนาคารกรุงเทพ</option>
                                            <option value="no">ธนาคารกสิกรไทย</option>
                                            <option value="no">ธนาคารกรุงไทย</option>
                                            <option value="no">ธนาคารทหารไทย</option>
                                            <option value="no">ธนาคารไทยพาณิชย์</option>
                                            <option value="no">ธนาคารกรุงศรีอยุธยา</option>
                                            <option value="no">ธนาคารเกียรตินาคิน</option>
                                            <option value="no">ธนาคารซีไอเอ็มบีไทย</option>
                                            <option value="no">ธนาคารทิสโก้</option>
                                            <option value="no">ธนาคารธนชาต</option>
                                            <option value="no">ธนาคารญูโอบี</option>
                                            <option value="no">ธนาคารออมสิน</option>
                                        </select>
                                    </div>


                                    <div class="mb-3 text-left">
                                        <input class="form-control" type="text" placeholder="เลขบัญชี" id="txtProductDetail">
                                    </div>

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
        <!-- END myModal9-->


    </div>

    <div class="row mx-0">
        <div class="col text-center mx-0 px-0">
          <div class="img">
              @foreach($image as $im)
                <img src="/public/images/sales_page_image/{{$im->image_name}}" width="100%" heigh="auto">
              @endforeach
          
          </div>
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

</body>

</html>

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
