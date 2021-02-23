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
            <li><a href="home.php" style="text-decoration: none;">Logout</a></li>
        </ul>

        <label for="menu" class="menu-bar">
            <i class="fa fa-bars"></i>
        </label>



    </nav>

  @include('Frontend.side_menu')

    <div class="container-fluid">
        <div class="content">
            <div class="">
                <h5 class="p-4">แพ็คเกจของคุณจะหมดอายุวันที่ ว/ด/ป (เหลืออีก 00 วัน)</h5>
            </div>
            <div class="text-center" style="font-size: 30px">
                <p>ตรวจสอบรายการสั่งซื้อ</p>
            </div>
            <div class="table-responsive mt-1">
                <table class="table table-striped">
                    <thead class="thead-dark">
                        <tr class="text-center">
                            <th>ลำดับที่</th>
                            <th>Sale Page</th>
                            <th>ตรวจสอบคำสั่งซื้อ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="text-center">
                            <td>1</td>
                            <td><a href="#"></a>Test Page</td>
                            <td><a target="_blank" href="{{route('checkorder.show',1)}}">คลิ๊ก</a></td>
                        </tr>
                        <tr class="text-center">
                            <td>2</td>
                            <td><a href="#"></a></td>
                            <td></td>
                        </tr>
                        <tr class="text-center">
                            <td>3</td>
                            <td><a href="#"></a></td>
                            <td></td>
                        </tr>
                        <tr class="text-center">
                            <td>1</td>
                            <td><a href="#"></a>ชื่อ Sale Page</td>
                            <td><a target="_blank" href="#">คลิ๊ก</a></td>
                        </tr>
                        <tr class="text-center">
                            <td>2</td>
                            <td><a href="#"></a></td>
                            <td></td>
                        </tr>
                        <tr class="text-center">
                            <td>3</td>
                            <td><a href="#"></a></td>
                            <td></td>
                        </tr>
                        <tr class="text-center">
                            <td>1</td>
                            <td><a href="#"></a>ชื่อ Sale Page</td>
                            <td><a target="_blank" href="#">คลิ๊ก</a></td>
                        </tr>
                        <tr class="text-center">
                            <td>2</td>
                            <td><a href="#"></a></td>
                            <td></td>
                        </tr>
                        <tr class="text-center">
                            <td>3</td>
                            <td><a href="#"></a></td>
                            <td></td>
                        </tr>
                        <tr class="text-center">
                            <td>1</td>
                            <td><a href="#"></a>ชื่อ Sale Page</td>
                            <td><a target="_blank" href="#">คลิ๊ก</a></td>
                        </tr>
                        <tr class="text-center">
                            <td>2</td>
                            <td><a href="#"></a></td>
                            <td></td>
                        </tr>
                        <tr class="text-center">
                            <td>3</td>
                            <td><a href="#"></a></td>
                            <td></td>
                        </tr>
                        <tr class="text-center">
                            <td>1</td>
                            <td><a href="#"></a>ชื่อ Sale Page</td>
                            <td><a target="_blank" href="#">คลิ๊ก</a></td>
                        </tr>
                        <tr class="text-center">
                            <td>2</td>
                            <td><a href="#"></a></td>
                            <td></td>
                        </tr>
                        <tr class="text-center">
                            <td>3</td>
                            <td><a href="#"></a></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
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