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
      <div class="mx-auto">
         <div id="content-form" style='min-height: 560px;'>                 
            <form action="{{route('search-sp')}}" method="post" id="search">
               @csrf
               <div class="mb-3">
                   <label for="password" class="form-label">Tìm Sản Phẩm</label>
                   <input type="text" name="txtsearch"  placeholder="Sản phẩm cần tìm">
   
               </div>
               <div class="col-12">
                   <button type="submit" name="search" value="Search" class="btn btn-primary">Tìm Sản Phẩm</button>
               </div>

           </form>
           <?php 
           if ($products==null) {
                        
                             echo "";
            } else {?>
             @include('products.components.search_componets')  <?php }?>
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