<?php 
if($carts){

  
?>
<div class="car_wrapper" style="margin-top:50px ">
  <div class="cart" data-url="{{route('deleteCart')}}">
    <div class="container">
      <div class="row">
        <table class="table update_cart_url" data-url="{{route('updateCart')}}">
          <thead>
            <tr>
              <th scope="col">#</th>

              <th scope="col">Tên Sản Phẩm</th>

              <th scope="col">Giá Sản Phẩm</th>
              <th scope="col">Ảnh Sản Phẩm</th>
              <th scope="col">Số Lượng Sản Phẩm</th>
              <th colspan="2">Hàng Động</th>
            </tr>
          </thead>
          <tbody>
            @php
            $total=0;
            $i=0;
            @endphp
            @foreach($carts as $id => $cartItem)
            @php
            $total+=((int)$cartItem['price']*$cartItem['quantity']);
            $i++;
            @endphp
            <tr>
              <td colspan="">{{$i}}</td>
              <td colspan="">{{$cartItem['name']}}</td>
              <td colspan="">{{number_format((int)$cartItem['price'])}}</td>
              <td><img src="{{asset('images/sanpham/'.$cartItem['image'])}}" style="height: 50px;" alt=""></td>
              <td><input type="number" class="quantity" value="{{$cartItem['quantity']}}"></td>
              <td><a href="" data-id="{{$id}}" class='cart_update'>Cập Nhật</a></td>
              <td> <a href="" data-id="{{$id}}" class="cart_delete">Xóa </a></td>
            </tr>

            @endforeach
          </tbody>
        </table>
        <div class="col-md-12">
          <h2 class="col-md-5">Tổng tiền </h2><h2 class='total col-md-5'>{{$total;}}</h2>
        </div>
        <div class="cart-btn">
          <table>
            <thead>
              <th><label>Tên người nhận <input name=name class="namecart"> </label><br></th>
              <th><label>Địa chỉ nhận hàng <input name=diachi class="diachicart">  </label><br></th>
              <th><label>Số điện thoại của bạn<input name=sdt class="sdtcart"></label><br></th>
            </thead>
          </table>
        <a href="" class="cart-thanhtoan " data-url="{{route('thanhtoan')}}">  <button class=" 
          <?php
          echo ($total > 1) ? '' : 'd-none';
          ?>
        ">Thanh toán</button></a>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
}else {
  # code...?>
  <H1 style="margin: 50px 250px">Hiện tại không có sản phẩm trong giỏ hàng</H1>
  <?php
}
?>

