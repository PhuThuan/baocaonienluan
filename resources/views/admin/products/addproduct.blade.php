<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Thêm Sản Phẩm</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
  <a href="/adminhome"> Trở Lại</a>
  <div class="container">
    <div class="row">
      <h4>Sản Phẩm Mới </h4>
      <div class="col-md-4 col-md-offset-4">
        <form action="{{ route('add-products') }}" method="post" enctype="multipart/form-data">
          @if (Session::has('success'))
          <div class="alert alert-success">{{Session::get("success")}}</div>
          @endif
          @if (Session::has('fail'))
          <div class="alert alert-danger">{{Session::get("fail")}}</div>
          @endif
          @csrf
          <div class="mb-3 form-group">
            <label for="noibat" class="form-label">Nổi Bật</label>
            <input type="text" class="form-control" name='noibat' placeholder="Sản Phẩm Có Nổi Bật Không: Có = 1; Không = 0" value="{{old('noibat')}}">
            <span class="text-danger">@error('noibat'){{$message}}

              @enderror</span>
          </div>
          <div class="mb-3 form-group">
            <label for="theloai" class="form-label">Loại Sản Phẩm </label>
            <input type="text" class="form-control" name='theloai' placeholder="Nhập Vào Sản Phẩm Có Loại Gì" value="{{old('theloai')}}">
            <span class="text-danger">@error('theloai'){{$message}}

              @enderror</span>
          </div>
          <div class="mb-3 form-group">
            <label for="name" class="form-label">Tên Sản Phẩm</label>
            <input type="text" class="form-control" name='name' placeholder="Nhập Vào Tên Sản Phẩm" value="{{old('name')}}">
            <span class="text-danger">@error('name'){{$message}}

              @enderror</span>
          </div>
          <div class="mb-3 form-group">
            <label for="noidung" class="form-label">Nội dung</label>
            <input type="text" class="form-control" name='noidung'  placeholder="Nhập Vào Miêu Tả Của Sản Phẩm" value="{{old('noidung')}}">
            <span class="text-danger">@error('noidung'){{$message}}

              @enderror</span>
          </div><div class="mb-3 form-group">
            <label for="soluong" class="form-label">Số Lượng Sản Phẩm</label>
            <input type="text" class="form-control" name='soluong'  placeholder="Nhập Vào Miêu Tả Của Sản Phẩm" value="{{old('soluong')}}">
            <span class="text-danger">@error('soluong'){{$message}}

              @enderror</span>
          </div>
         
         
          <div class="mb-3 form-group">
            <label for="price" class="form-label">Giá của Sản Phẩm</label>
            <input type="text" class="form-control" name='price' placeholder="Nhập Giá Của Sản Phẩm" value="{{old('price')}}">
            <span class="text-danger">@error('price'){{$message}}

              @enderror</span>
          </div>
          <div class="mb-3 form-group">
            <label for="discount" class="form-label">Giảm Giá Sản Phẩm</label>
            <input type="text" class="form-control" name='discount' placeholder="Nhập Giảm Giá Của Sản Phẩm" value="{{old('discount')}}">
            <span class="text-danger">@error('discount'){{$message}}

              @enderror</span>
          </div>
          <div class="mb-3 form-group">
            <label for="image1" class="form-label">image1</label>
            <input type="file" class="form-control" name='image1' id="imgUpload1" value="{{old('image1')}}">
            <span class="text-danger">@error('image1'){{$message}}

              @enderror</span>
          </div>
          <div class="mb-3 form-group">
            <label for="image2" class="form-label">image2</label>
            <input type="file" class="form-control" name='image2' value="{{old('image2')}}">
            <span class="text-danger">@error('image2'){{$message}}

              @enderror</span>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
         
        </form>
      </div>
    </div>
  </div>
  <script>

  </script>


  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>