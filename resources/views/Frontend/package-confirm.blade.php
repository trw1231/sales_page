<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
<base href="{{asset('')}}">
    <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
    <!-- <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css"> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/login.css">

    <link rel="stylesheet" href="css/payment.css">

    <style>
        .browse {
            padding-right: 0;
        }

        .btnbrowse {
            padding-left: 0;
        }
    </style>

</head>

<body>

<form action = "{{route('package.storeTransaction',$id)}}" method = "POST" enctype="multipart/form-data">
    @csrf
    <div class="container">
        <div class="signup-box">
            <div class="title">แจ้งชำระเงิน</div>
            <div class="background">
                <div class="content">

                    
                        <div class="row">
                            <div class="col-12">
                                <label class="text">แพ็คเกจที่เลือก</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <input class="input" type="text" value="{{$package->name_package}}" disabled>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <label class="text">ราคาแพ็คเกจ</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <input class="input" type="text" value="{{$package->price}}" disabled>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <label class="text">ชื่อ - นามสกุล</label>
                            </div>
                        </div>

                        <!-- <div class="textbox col-12">
                            <input name ="name_lastname" id ="name_lastname" type="text" placeholder="ชื่อ - นามสกุล">
                        </div> -->

                        <div class="row">
                            <div class="col-12">
                                <input class="input" type="text" name ="name_lastname" id ="name_lastname" value="{{Auth::user()->name_lastname}}">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <label class="text">เบอร์โทรศัพท์</label>
                            </div>
                        </div>

                        <!-- <div class="textbox col-12">
                            <input name ="phone" id ="phone" type="text" placeholder="เบอร์โทรศัพท์">
                        </div> -->

                        <div class="row">
                            <div class="col-12">
                                <input class="input" type="text" name ="phone" id ="phone" value="{{Auth::user()->phone_number}}">
                            </div>
                        </div>

                        <div class="boxpalment pt-3">
                            <div style="font-size: 20px;">
                                <p><u>ช่องทางการชำระเงิน</p></u>
                            </div>
                            <p>ชื่อบัญชี : ....................</p>
                            <p>ธนาคาร : ....................</p>
                            <p>เลขบัญชี : ....................</p>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <label class="text">หลักฐานารชำระเงิน</label>
                            </div>
                        </div>
                        <div class="custom-file">
                            <input type="file" class="form-control-file" id="customFile" name="slip">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                          </div>

                        <div class="button pt-4" align="center">
                            <input type="submit" value="แจ้งชำระเงิน">
                        </div>

                </div>
            </div>

        </div>
    </div>

</form>



</body>

</html>