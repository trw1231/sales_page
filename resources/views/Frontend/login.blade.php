<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/login.css">
    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sign-in/">
    <title>Login</title>
</head>

<body>
    <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
        <div class="container">
            <div class="card login-card">
                <div class="row no-gutters">
                    <div class="col-md-5">
                        <img src="assets/images/loginpic2.jpg" alt="login" class="login-card-img">
                    </div>
                    <div class="col-md-7">
                        <div class="card-body">
                            <p class="login-card-description ">เข้าสู่ระบบ</p>
                            <form id="myform" action="{{route('login')}}" method="POST">
                                @csrf
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                                <div class="form-group">
                                    <label for="email" class="sr-only">Email</label>
                                    <input type="email" name="username_login" id="email" class="form-control"
                                        placeholder="อีเมลล์">
                                </div>

                                <div class="form-group mb-4">
                                    <label for="password" class="sr-only">Password</label>
                                    <input type="password" name="password_login" id="password" class="form-control" placeholder="รหัสผ่าน">
                                </div>

                                <input name="login" id="login"class="btn btn-block login-btn mb-4" type="submit" value="เข้าสู่ระบบ"></a>

                            </form>
                            <p class="login-card-footer-text">ลืมรหัสผ่าน <a href="#!"
                                    class="text-reset "><u>คลิ๊กที่นี่</a></p></u>
                            <p class="login-card-footer-text">สมัครใช้บริการ <a href="{{route('register')}}"
                                    class="text-reset "><u>คลิ๊กที่นี่</a></p></u>
                            <a href="{{route('home')}}" class="login-card-footer-nav">กลับสู่หน้าหลัก</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>


</html>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>

<script>

$("#myform").validate({
  errorElement: "span"
});

</script>