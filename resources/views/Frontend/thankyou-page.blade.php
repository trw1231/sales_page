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
            </div>
        </nav>
    </div>

<div style="padding-top: 100px;" class="container-fluid">
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
                @endif
              @endforeach
              
          </div>
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



