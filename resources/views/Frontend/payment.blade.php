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

<form action = "addNewpayment.php" method = "POST">

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
                                <input class="input" type="text">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <label class="text">ราคาแพ็คเกจ</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <input class="input" type="text">
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
                                <input class="input" type="text" name ="name_lastname" id ="name_lastname">
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
                                <input class="input" type="text" name ="phone" id ="phone">
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
                        <div class="row">
                            <div class="col-9 browse">
                                <input style="width: 100%;" class="input" type="text">
                            </div>
                            <div class="col-3 btnbrowse" style="padding-right: 15px;">
                                <input class="button2" value="browse..." type="button">
                            </div>
                        </div>
                        <div class="button pt-4" align="center">
                            <input type="submit" value="แจ้งชำระเงิน" onclick="window.location.href = 'created_salepage.php'">
                        </div>

                </div>
            </div>

        </div>
    </div>

</form>



</body>

</html>