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
      <div style="height: 100px; width: 100px;">

      </div>
  
      <div class="container">
          <div class="row ">
              <div class="col col-lg-2 locsp text-center " >
  
                  <div style="float:left; position:relative;">
  
                      <div >
                          <p class="margin_bottom_5"><b>Giá tiền:</b>
  
                          </p>
                          <input type="checkbox" name="screen_group[]" value="100-200" id="100-200" class="cb" />&nbsp;<span class="filter_paragraphs">100-200</span>
  
                          <br />
                          <input type="checkbox" name="screen_group[]" value="200-300" id="200-300" class="cb" />&nbsp;<span class="filter_paragraphs">200-300</span>
  
                          <br />
                          <input type="checkbox" name="screen_group[]" value="300-400" id="300-400" class="cb" />&nbsp;<span class="filter_paragraphs">300-400</span>
  
                          <br />
                          <input type="checkbox" name="screen_group[]" value="400-500" id="400-500" class="cb" />&nbsp;<span class="filter_paragraphs">400-500</span>
                          <br />
                          <input type="checkbox" name="screen_group[]" value="500-600" id="500-600" class="cb" />&nbsp;<span class="filter_paragraphs">500-600</span> <br />
                          <input type="checkbox" name="screen_group[]" value="600-700" id="600-700" class="cb" />&nbsp;<span class="filter_paragraphs">600-700</span> <br />
                          <input type="checkbox" name="screen_group[]" value="700-800" id="700-800" class="cb" />&nbsp;<span class="filter_paragraphs">700-800</span> <br />
                          <input type="checkbox" name="screen_group[]" value="800-900" id="800-900" class="cb" />&nbsp;<span class="filter_paragraphs">800-900</span>
                          <br />
                          <br />
                          <br />
                          <p class="margin_bottom_5"><b>Brands:</b>
  
                          </p>
                          <input type="checkbox" name="brand_group[]" value="aokhoac" id="z00196" class="cb" />&nbsp;<span class="filter_paragraphs">Áo khoác</span>
  
                          <br />
                          <input type="checkbox" name="brand_group[]" value="quandai" id="z05448" class="cb" />&nbsp;<span class="filter_paragraphs">Quần Dài</span>
  
                          <br />
                          <input type="checkbox" name="brand_group[]" value="aongan" id="z00201" class="cb" />&nbsp;<span class="filter_paragraphs">Áo Ngắn</span>
  
                          <br />
                          <input type="checkbox" name="brand_group[]" value="quanngan" class="cb" id="z00712" />&nbsp;<span class="filter_paragraphs">Quần Ngắn</span>
  
  
                          <br />
                          </p>
                      </div>
                  </div>
                  <div style="clear:both;"></div>
                  <br />
                  <hr />
                  <br />
              </div>
              <div class="col-lg-10">
                  <div class="container text-center">
                      <div class="row">
  
                        <div class="container text-center">
                           <div class="row">
                               <?php 
                               $i=0;
                               foreach ($products as $product) {
                                 $gia;
                                 $price=$product->products_price*(100-$product->products_discount)/100;
   if ( $price> 100000 && $price <= 200000) {
      $gia = "100-200";
   } else  if ($price > 200000 && $price<= 300000) {
      $gia = "200-300";
   } else  if ($price> 300000 && $price <= 400000) {
      $gia = "300-400";
   } else  if ($price > 400000 && $price <= 500000) {
      $gia = "400-500";
   } else  if ($price> 500000 && $price <= 600000) {
      $gia = "500-600";
   } else if ($price > 600000 && $price <= 700000) {
      $gia = "600-700";
   } else if ($price > 700000 && $price <= 800000) {
      $gia = "700-800";
   } else if ($price > 800000 && $price<= 900000) {
      $gia = "800-900";
   } else {
      $gia = 0;
   }
   $dis;
   $noibat = "noibat";
?> 
                            <div class="col-lg-3 spham produkt_gruppe_div" <?php if ($product->products_discount != 0) { $dis = 'data-brand_name2="discount"';echo $dis;} ?> data-money="<?php echo $gia; ?>" data-brand_name="<?php echo $product->products_theloai; ?>" data-brand_name1="<?php if ($product->products_noibat == 1) echo $noibat; ?>">
                              <a href="{{route('productDetail',['id'=>$product->id]);}}" class="delete-btn">
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
                           
                           ?>
                        </div>
  
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