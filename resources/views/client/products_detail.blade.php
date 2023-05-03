<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
        <link rel="stylesheet" type="text/css" href="{{asset('css/index.css')}}" media="all">
        <link rel="stylesheet" type="text/css" href="{{asset('css/shopall.css')}}" media="all">
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
    <div class="container text-center ">
        <div class="row align-items-start">
            <div class="col-lg-6 scroll" id="style-1">
                <div class="force-overflow">
                    <img src="{{asset('images/sanpham/'.$product->products_image)}}" class="d-block w-100 mx-auto">
                    <img src="{{asset('images/sanpham/'.$product->products_image2)}}" class="d-block w-100 mx-auto">
                </div>
            </div>
            <div class="col-lg-6 detail-sp">
                <div class="name mb-2"><h1>{{$product->products_name}}</h1></div>
                <div class="noidung mb-2"><h2> {{$product->products_description}}</h2></div>
                <?php if ($product->products_discount != 0) {
                    ?>
                        <div class="discount mb-2 ">GIẢM GIÁ-{{$product->products_discount}}%</div>


                        <div class="price mb-2">GIÁ MỚI $<{{$product->products_price}}</div>
                    <?php } else { ?>
                        <div class="price mb-2">GIÁ ${{$product->products_price}}</div>
                    <?php  } ?>

                    <?php if ($product->products_discount != 0) {
                        $aa = (int)($product->products_price / ((100 - $product->products_discount) / 100));
                    ?>
                        <div class="giacu col mb-3">GIÁ CŨ${{$product->products_price}}</div>
                    <?php
                    } ?>
            </div>                           
        <div class="row"> 
        <i onclick="myFunction(this)" class="fa fa-heart col-lg-6" style="margin-top:10px;"></i>
        <a href="#" data-url="{{route('addToCart',['id'=>$product->id]);}}" class="btn btn-primary add-to-cart col-lg-6">Add to cart</a>
        </div>  
            </div>                
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