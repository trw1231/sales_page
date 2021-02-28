<div class="side-menu">
    <center>
        <img src="assets/images/profile/{{Auth::user()->image}}">
        <br><br>

        <h2 class="pt-4" style="font-size: 25px;">{{Auth::user()->name_lastname}}</h2>
    </center>
    <br>
    <a style="text-decoration: none;" href="{{route('personal.index')}}"><i class="fa fa-user"></i><span>ข้อมูลส่วนตัว</span></a>
    <a style="text-decoration: none;" href="{{route('salepage.index')}}"><i class="fa fa-folder"></i><span>สร้าง sale page</span></a>
    <a style="text-decoration: none;" href="#" data-toggle="modal" data-target="#myModal1"><i class="fa fa-mouse-pointer"></i><span>วิธีใข้งาน sale page</span></a>
    <a style="text-decoration: none;" href="{{route('checkorder.index')}}"><i class="fa fa-shopping-basket"></i><span>เช็คออเดอร์</span></a>
    <a style="text-decoration: none;" href="{{route('payment.index')}}"><i class="fa fa-cog"></i><span>เปลี่ยน หรือ ต่ออายุแพ็คเกจ</span></a>
    <a style="text-decoration: none;" href="{{route('password.change')}}"><i class="fa fa-lock"></i><span>เปลี่ยนรหัสผ่าน</span></a>
    @if(Auth::user()->is_admin)
    <a style="text-decoration: none;" href="{{route('package_admin.index')}}"><i class="fa fa-shopping-basket"></i><span>รายการซื้อ package</span></a>
    @endif
    <!-- <a href="#" class="Logout"><span>Logout</span></a> -->
</div>