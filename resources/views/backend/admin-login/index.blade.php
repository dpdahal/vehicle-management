<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> VMS : : Login Page</title>
    <link href="{{url('backend-assets/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{url('backend-assets/custom/login.css')}}" rel="stylesheet">
</head>
<body>
<div class="wrapper">
    <div class="container">
        <div class="col-left">
            <div class="login-text">
                <h2>Welcome Back</h2>
                <p>VMS Nepal</p>

            </div>
        </div>
        <div class="col-right">
            <div class="login-form">
                @if(session('error'))
                    <h2 style="color: red;">{{session('error')}}</h2>
                @else
                    <h2>Login</h2>
                @endif
                <form method="post" action="{{route('admin-login')}}">
                    @csrf
                    <div class="form-group">
                        <label for="username">Username<span>*
                            <a style="color: red;text-decoration: none;">
                                {{$errors->first('username')}}
                            </a>
                            </span></label>
                        <input type="text" id="username" name="username" placeholder="Username">
                    </div>
                    <div class="form-group">
                        <label for="password">Password<span>*
                             <a style="color: red;text-decoration: none;">
                                {{$errors->first('password')}}
                            </a>
                            </span></label>
                        <input type="password" name="password" id="password" placeholder="Password">

                    </div>
                    <div class="form-group">
                        <button>Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
</body>
</html>
