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
    <a href="{{route('addproduct')}}"> <button class="themsp" style="margin-bottom: 30px; margin-top: 5% ;">THÊM SẢN PHẨM</button></a>
    <table class="container table table-striped">
        <thead >
           <th scope="col">ID</th>
           <th scope="col">LOẠI</th>
           <th scope="col">NỔI BẬT</th>
           <th scope="col">TÊN</th>
           <th scope="col">NỘI DUNG</th>
           <th scope="col">SỐ LƯỢNG</th>
           <th scope="col">DISCOUNT</th>
           <th scope="col">HÌNH 1</th>
           <th scope="col">HÌNH 2</th>
        </thead>
        <?php $i=1;
        foreach ($products as $product) {
           # code...
            ?> 
        <tr>
            <td>{{$i}}</td>
            <td> {{$product->products_noibat}} </td>
            <td>{{$product->products_theloai}}</td>
            <td>{{$product->products_name}}</td>
            <td>{{$product->products_description}}</td>
            <td>{{$product->products_soluong}}</td>
            <td>{{number_format($product->products_price)}}</td>
            <td>    <img src="{{asset('images/sanpham/'.$product->products_image)}}" height="100"></td>
            <td> <img src="{{asset('images/sanpham/'.$product->products_image2)}}" height="100"></td>
            <td><a href="/adminproduct/update/{{$product->id}}"  class="delete-btn">Chỉnh sửa</a></td>
            <td><a href="/delete-products/{{$product->id}}" class="delete-btn" onclick="return confirm('BẠN MUỐN XÓA SẢN PHẨM NÀY');">remove</a></td>
         </tr>
         <?php  $i++;
        }
        ?>
    </table>
    <script src="{{asset('js/index.js')}}">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    
</body>
</html>