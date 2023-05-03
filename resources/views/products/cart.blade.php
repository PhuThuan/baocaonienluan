<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Giỏ Hàng</title>
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
    @include('products.components.cart_components');
   
      <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
      <script>
      
        function cartUpdate(event){
          event.preventDefault();
           let urlUpdate = $('.update_cart_url').data('url');
           let id = $(this).data('id');
           let quantity = $(this).parents('tr').find('input.quantity').val();
     
           $.ajax({
            type: "GET",
            url:urlUpdate,
            data: {id: id, quantity: quantity},
            success: function(data) {
             if(data.code === 200){
              $('.car_wrapper').html(data.cart_component);
              alert('Cập nhật thành công');
             }
            },
            error:function(data) {

            },
           });
        }
        function cartDelete(event){
          event.preventDefault();
          let urlDelete = $('.cart').data('url');
          let id = $(this).data('id');
          $.ajax({
            type: "GET",
            url:urlDelete,
            data: {id: id},
            success: function(data) {
             if(data.code === 200){
              $('.car_wrapper').html(data.cart_component);
             }
            },
            error:function(data) {

            },
           });
        }
        function thanhToan(event){
         event.preventDefault();
  
       let total=$("h2.total").text();
       let diachi=$("input.diachicart").val();
       let namecart=$("input.namecart").val();
       let sdtcart=$("input.sdtcart").val();
       let urlthanhtoan = $('.cart-thanhtoan').data('url');
     // alert(total);
       $.ajax({
            type: "GET",
            url:urlthanhtoan,
            data: {total:total, diachi:diachi,namecart:namecart,sdtcart:sdtcart},
             success:function(data){
             console.log(data);
             if(data.code===200)
             {
                 alert('Đã thanh toán thành công');
                 window.location.reload();
             }
             },
             error:function(){
 
             }
           });
        }
        $(function(){
            $(document).on('click','.cart_update',cartUpdate);
            $(document).on('click','.cart_delete',cartDelete);
            $(document).on('click','.cart-thanhtoan',thanhToan);
        })
      </script>
</body>
</html>