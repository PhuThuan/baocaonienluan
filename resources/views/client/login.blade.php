<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Đăng nhập</title>
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
    <div class="container" style="margin-top: 50px">
        <div class="row">
            <h4>ĐĂNG NHẬP</h4>
            <div class="col-md-4 col-md-offset-4">
                <form action="{{route('login-user')}}" method="post">
                    @if (Session::has('success'))
                    <div class="alert alert-success">{{Session::get("success")}}</div> 
                @endif
                @if (Session::has('fail'))
                <div class="alert alert-danger">{{Session::get("fail")}}</div>
                @endif
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">TÀI KHOẢN</label>
                        <input type="text"  name='email' class="form-control" placeholder="NHẬP TÀI KHOẢN">
                        <span class="text-danger">@error('email'){{$message}} @enderror</span>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">MẬT KHẨU</label>
                        <input type="text" name='password' class="form-control"  placeholder="NHẬP MẬT KHẨU">
                        <span class="text-danger">@error('password'){{$message}}  @enderror</span>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Đăng nhập</button>
                      </div>
                      <a href="registration">Đăng Ký</a>
                </form>
            </div>
        </div>
    </div>

    <script src="{{asset('js/index.js')}}">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    
    
</body>
</html>