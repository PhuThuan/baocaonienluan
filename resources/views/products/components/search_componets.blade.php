
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

