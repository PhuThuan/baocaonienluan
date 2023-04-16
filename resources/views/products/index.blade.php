<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>
    <div class="products mt-4">
        <div class="container">
            <div class="col-md-12">
                <a href="{{route('showCart')}}" class="'btn btn-primary">card</a>
            </div>
            <div class="row">
                <?php 
                 foreach ($products as $product) {
                    # code...
                     ?> 
                <div class="col-md-4">
                   
                    <div class="card" style="width: 18rem;">
                        <img src="{{$product->products_image}}" >
                        <div class="card-body">
                            <h5 class="card-title">{{$product->products_name}}</h5>
                            <p class="card-text">{{number_format($product->products_price)}}</p>
                            <p class="card-text">{{$product->products_description}}</p>
                            <a href="#" data-url="{{route('addToCart',['id'=>$product->id]);}}" class="btn btn-primary add-to-cart">Add to cart</a>
                        </div>
                    </div>
                </div>
                <?php }
                 ?> 
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
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
                alert('them san pham vao gio hang thanh cong');
            }
            },
            error:function(){

            }
           });
        }
      $( ".add-to-cart" ).click(addToCart);
    </script>
</body>

</html>