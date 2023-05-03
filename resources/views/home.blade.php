<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
        <link rel="stylesheet" type="text/css" href="{{asset('css/index.css')}}" media="all">
        <link rel="stylesheet" type="text/css" href="{{asset('css/index.css')}}" media="all">
        <link href="https://fonts.googleapis.com/css2?family=Rubik+Glitch&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
        <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
      @include('client.headerhome')
      <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
           <div class="carousel-item active" id="banner">
              <img src="{{asset('images/1/slideshow_1.webp')}}"  class="d-block w-100" alt="...">
           </div>
           <div class="carousel-item">
            <img src="{{asset('images/1/slideshow_2.webp')}}"class="d-block w-100" alt="...">
           </div>
           <div class="carousel-item">
            <img src="{{asset('images/1/slideshow_3.webp')}}"  class="d-block w-100" alt="...">
           </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
           <span class="carousel-control-prev-icon" aria-hidden="true"></span>
           <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
           <span class="carousel-control-next-icon" aria-hidden="true"></span>
           <span class="visually-hidden">Next</span>
        </button>
     </div> 
     <div class="container text-center">
        <div class="row align-items-start">
           <div class="col-lg-4 ">
              <img src="{{asset('images/2/block_home_category1_new.webp')}}" class="d-block w-100 mx-auto" alt="...">
           </div>
           <div class="col-lg-4 ">
              <img src="{{asset('images/2/block_home_category2_new.webp')}}" class="d-block w-100 mx-auto" alt="...">
           </div>
           <div class="col-lg-4 ">
              <img src="{{asset('images/2/block_home_category3_new.webp')}}" class="d-block w-100 mx-auto" alt="...">
           </div>
        </div>
     </div>
     <img src="{{asset('images/show_block_home_category_image_3_new.webp')}}" class=" d-block w-100 mx-auto" alt="...">
     <div class="marquee">
        <p> STREETWEAR BRAND </p>
     </div>
     <div class="container text-center">
        <div class="row">
            <?php 
            $i=0;
            foreach ($products as $product) {
               
               if($i<8){
               # code...
                ?> 
           <div class="col-lg-3 spham ">
              <a href="{{route('productDetail',['id'=>$product->id]);}}">
            <img src="{{asset('images/sanpham/'.$product->products_image)}}" alt="" class="d-block w-100 mx-auto hinh" onmouseover="this.src='{{asset('images/sanpham/'.$product->products_image2)}}'" onmouseout="this.src='{{asset('images/sanpham/'.$product->products_image)}}'" />
              </a>   
                       <h5>{{$product->products_name}}</h5>
                       <div class="gia row text-center">
                        <?php if ($product->products_discount != 0) {
                        ?>
                           <div class="discount col">{{$product->products_discount}}%</div>
                        <?php
                        } ?>
         
                        <div class="price col">
                           <?php if ($product->products_discount != 0) {
                              ?>
                                 <div class="gia col">{{($product->products_price*(100-$product->products_discount))/100}}</div>
                              <?php
                              } else {?>
                               <div class="gia col">{{$product->products_price}}</div>
                               <?php
                              }  ?>
                        </div>
                        <?php if ($product->products_discount != 0) {
                       
                        ?>
                           <div class="giacu col">${{$product->products_price}}</div>
                        <?php
                        } ?>
                     </div>
                     
                     <div class="row "> 
                        <i onclick="myFunction(this)" class="fa fa-heart col-lg-6" style="margin-top:10px;"></i>
                        <a href="#" data-url="{{route('addToCart',['id'=>$product->id]);}}" class="btn btn-primary add-to-cart col-lg-6">Add to cart</a>
                    </div>  
                  
               
           </div>
           <?php 
           $i++;
           }
        }
        ?>
     </div>
     </div>
     <script>
        function addToCart(){
         event.preventDefault();
            let urlCart =$(this).data('url');
            $.ajax({
             type:'GET',
             url:urlCart,
             dataType:'json',
             success:function(data){
             console.log(data);
             if(data.code===200)
             {
                 alert('Đã thêm sản phẩm vào trong giỏ hàng');
             }
             },
             error:function(){
 
             }
            });
         }
       $( ".add-to-cart" ).click(addToCart);
       function myFunction(x) {
  x.classList.toggle("fa-heart-o");
 
}
     </script>
     <script src="{{asset('js/index.js')}}">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

    </body>
</html>