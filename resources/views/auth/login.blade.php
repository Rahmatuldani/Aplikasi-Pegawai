<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" class="h-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login</title>

    <!-- Style -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body class="h-100 bg-info d-flex align-items-center">
<div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-4 mx-auto bg-light p-4">
                <h3 class="text-center text-info pb-3 mb-3 border-bottom">LOGIN</h3>

                <form action="{{ route('login') }}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group p-0 {{ $errors->has('email') ? 'has-error' : '' }}">
                        <input type="email" id="email" class="form-control form-control-lg mb-3" placeholder="Email" name="email" autofocus>
                        @if ($errors->has('email'))
                        <span class="help-block text-danger"><strong>{{ $errors->first('email') }}</strong></span>
                        @endif
                    </div>

                    <div class="form-group p-0 {{ $errors->has('password') ? 'has-error' : '' }}">
                        <input type="password" id="password" class="form-control form-control-lg mb-3" placeholder="Password" name="password">
                        @if ($errors->has('password'))
                        <span class="help-block text-danger"><strong>{{ $errors->first('password') }}</strong></span>
                        @endif
                    </div>

                    <input type="submit" class="btn btn-info btn-lg btn-block" value="Login">
                </form>
            </div>
        </div>
    </div>
</body>
</html>