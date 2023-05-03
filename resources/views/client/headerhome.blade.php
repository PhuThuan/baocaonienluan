<header  id="menu" >
    <div class="container text-center ">
        <div class="row align-items-start " >
            <a class=" col-lg-1 navbar-brand" href="{{route('indexhome')}}">
                <img src="{{asset('assets/logo.png')}}" alt="" width="40" height="40">
            </a>
            <a href="{{route('shopall')}}" class="col-lg-1">SHOP ALL</a>
            <a href="{{route('tops')}}" class="col-lg-1">TOPS</a>
            <a href="{{route('bottoms')}}" class="col-lg-1">BOTTOMS</a>
            <a href="{{route('outerwear')}}" class="col-lg-1">OUTERWEAR</a>
            <div class="col-lg-2 ">
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


            <a href="{{route('search')}}" class="col-lg-1">TÌM KIẾM</a>
         

            <a href="{{route('showCart')}}" class="col-lg-1">GIỎ HÀNG</a>
            <a href="/search-donhang" class="col-lg-1">ĐƠN HÀNG</a>
  

        </div>
    </div>
</header> 