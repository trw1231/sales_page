<?php
/*session_start();
  if (isset($_POST['submit'])) {
    $_SESSION['authen_id'] = 1; 
    header('Location: menupage.php');
  }*/
//Header("Location: login.php");
session_start();

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" href="images/icons/favicon.ico">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <title>Salepages</title>
  <script src="https://unpkg.com/feather-icons"></script>

  <!-- Bootstrap CSS -->

  <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <style>
    body {
      font-family: 'Kanit', sans-serif;
    }

    .img {
      padding-top: 88px;
    }
  </style>

  <title>Home</title>

</head>

<body>

 @include('Frontend.inc_header')


 <div class="row mx-0">
  <div class="col text-center mx-0 px-0">
    <div class="img">
      <img src="assets/images/1pic.jpg" width="100%" heigh="auto">
      <img src="assets/images/2pic.jpg" width="100%" heigh="auto">
      <img src="assets/images/3pic.jpg" width="100%" heigh="auto">
      <img src="assets/images/4pic.jpg" width="100%" heigh="auto">
  <img src="assets/images/5pic.jpg" width="100%" heigh="auto">
      <img src="assets/images/6pic.jpg" width="100%" heigh="auto">
      <img src="assets/images/7pic.jpg" width="100%" heigh="auto">
      <img src="assets/images/8pic.jpg" width="100%" heigh="auto">
  <img src="assets/images/9pic.jpg" width="100%" heigh="auto">
    </div>
  </div>
</div>


  <!-- Optional JavaScript -->

  <!-- <script>
		  feather.replace()
    </script> -->

  <!-- jQuery first, then Popper.js, then Bootstrap JS -->

  <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->

</body>

</html>