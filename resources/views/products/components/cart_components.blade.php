<div class="car_wrapper">
    <div class="cart" data-url="{{route('deleteCart')}}">
        <div class="container">
            <div class="row">
                <table class="table update_cart_url" data-url="{{route('updateCart')}}">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                       
                        <th scope="col">ten</th>
                              
                        <th scope="col">gia</th>
                        <th scope="col">anh san pham</th>
                        <th scope="col">sl</th>
                        <th scope="col">action</th>
                      </tr>
                    </thead>
                    <tbody>
                     @php
                        $total=0;
                        @endphp
                    @foreach($carts as $id => $cartItem)
                    @php
                    $total+=((int)$cartItem['price']*$cartItem['quantity']);
                
                    @endphp
                    <tr>
                        <td colspan="">{{$id}}</td>
                        <td colspan="">{{$cartItem['name']}}</td>
                        <td colspan="">{{number_format((int)$cartItem['price'])}}</td>
                        <td><img src="{{$cartItem['image']}}" style="height: 50px;" alt=""></td>
                        <td><input type="number" class ="quantity" value="{{$cartItem['quantity']}}"></td>
                        <td>
                            <a href="" data-id="{{$id}}"class='cart_update'>cap nhat  </a>
                            <a href="" data-id="{{$id}}" class="cart_delete">xoa</a>
                        </td>
                    </tr>            
                    @endforeach
                    </tbody>
                  </table>
                  <div class="col-md-12">
                    <h2>total:{{number_format($total);}}</h2>
                  </div>
            </div>
        </div>
    </div>
</div>