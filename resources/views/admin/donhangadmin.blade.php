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
        @include('admin.adminheader')

        <div class="admin-shopping-cart " style="margin-top: 10%">
            <table class="container">
                   <thead>
                      <th>ID</th>
                      <th>TÊN</th>
                      <th>ĐỊA CHỈ</th>
                      <th>SDT</th>
                      <th>TRẠNG THÁI</th>
                      <th>TỔNG TIỀN</th>
                      <th>CHI TIẾT</th>
                      <th>CẬP NHẬT</th>
                      <th>XÓA</th>
                   </thead>
                   <?php 
                     foreach ($products as $product) {?>
                     <tr>
                      <td>{{$product->cart_id}} </td>
                      <td>{{$product->cart_name}} </td>
                      <td>{{$product->cart_diachi}} </td>
                      <td>{{$product->cart_phone}} </td>
                      <td><?php if($product->cart_trangthai==0) {
                         echo("Chưa xử lý");
                      }
                      else{
                         echo("đã xử lý");
                      } 
                      ?></td>
                        <td>{{$product->cart_total}} </td>
                        <td><a href="{{route('admindetaidonhang',['id'=>$product->cart_id]);}}" class="delete-btn">Chi tiết</a></td>
                        <td><a href="/adminhome/admindonhang/{{$product->cart_id}}" name="capnhat"class="delete-btn" >Cập nhật trạng thái</a></td>
                     <td><a href="/adminhome/admindonhang-delete/{{$product->cart_id}}" class="delete-btn" onclick="return confirm('remove item from cart?');">Xóa</a></td>
                     </tr>
              <?php         }
                   ?>
            </table>
        </div>

     <script src="{{asset('js/index.js')}}">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

    </body>
</html>