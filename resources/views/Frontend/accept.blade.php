<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/register.css">

    <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="css/switch.css">
    <title>Register</title>

    <style>
        body {
            font-family: 'Kanit', sans-serif;
            padding: 0;
            margin: 0;
            background: #d0d0ce;
        }

        .signup-box {
            width: auto;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: white;
            border-radius: 10px;
            padding: 40px;
            box-shadow: 0 8px 12px 0 rgba(0, 0, 0, 0.15);
        }

        .title {
            font-size: 20px;
            text-align: center;
            font-weight: bold;
            color: #444444;
            margin: 20px 0 20px 0;
        }

        .text {
            padding-top: 20px;
            padding-bottom: 20px;
        }
    </style>
</head>

<body>

    <div class="signup-box">
        <div class="title">
            ข้อกำหนดการใช้งานระบบ
        </div>
        <hr>
        <div class="text">
            <p> 1. ห้ามสมชิกนำระบบไปใช้ในทางที่ผิดกฏหมายบ้านเมืองทุกชนิด ถ้า
                ตรวจพบถือว่าเป็นความผิดร้ายแรง ทางระบบจะระงับการใช้บริการในทันทีที่ตรวจพบ<br>
                2. ห้ามทำการ spam หรือก่อกวนระบบ เช่น อัพโหลดรูปภาพต่างๆมากเกินความจำเป็น ใช้โปรแกรม ต่างๆเพื่อทำให้ระบบทำงานไม่ราบรื่น<br>
                3. ไม่รับสินค้าผิดกฏหมายการลงโฆษณาทุกชนิด หากโดนแบนลิ้งค์ จะต้อง
                ยื่นเรื่องปลดแบนด้วยตัวเองกับทาง facebook <br>
                4. ทางระบบอาจปรับเปลี่ยน นโยบายใหม่ๆเพื่อให้เกิดความเหมาะสม
                การตัดสินของทีมงานผู้ดูแลระบบ ถือเป็นที่สิ้นสุด</p>
        </div>
        <hr>
        <div class="text-center">
            <button type="button" class="btn btn-success " onclick="window.location.href = '{{route('register')}}'">ยอมรับ</button>
            <button type="button" class="btn btn-danger " onclick="window.location.href = '{{route('home')}}'">ไม่ยอมรับ</button>
            </button>
        </div>

    </div>

</body>

</html>