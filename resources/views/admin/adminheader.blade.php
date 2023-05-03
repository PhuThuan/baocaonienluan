<header  id="menu" class="container" >
    <div class="container text-center ">
        <div class="row align-items-start " >
            <a class=" col-lg-1 navbar-brand" href="/adminhome">
                <img src="{{asset('assets/logo.png')}}" alt="" width="40" height="40">
            </a>
            <a href="/adminhome/admindonhang" class="col-lg-3">ĐƠN HÀNG</a>
            <a href="{{route('tops')}}" class="col-lg-3">TÀI KHOẢN</a>
            <div class="col-lg-3 ">
               <?php
                if(session()->has('loginId')){   ?>
                      <a href="" class="col-lg-1">
                        {{$data->name}}</a>
                        <a href="logout">logout</a>
                <?php } 
                else {  ?>
              
                    <a href="{{route('login')}}" class="col-lg-1">
                    ĐĂNG NHẬP/</a>
                <a href="{{route('registration')}}" class="col-lg-1">ĐĂNG KÝ</a>
                <?php
                }
           
             ?>
            </div>


        </div>
    </div>
</header> 