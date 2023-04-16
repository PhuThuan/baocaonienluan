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
              alert('cap nhat thanh cong');
             }
            },
            error:function(data) {

            },
           });
        }
        function cartDelet(event){
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
        $(function(){
            $(document).on('click','.cart_update',cartUpdate);
            $(document).on('click','.cart_delete',cartDelet);
        })
      </script>
</body>
</html>