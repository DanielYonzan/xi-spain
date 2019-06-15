<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login | {{ config('app.name') }}</title>

    <!--favicon-->
    <link rel="icon" href="{{asset('img/favicon.png')}}">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,500" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('css/app.css')}}" />
    <style>
        body{background: #ffd900}
    </style>
</head>
<body >
<div class="login">
    <div class="logo text-center"><img src="{{asset('img/logo.png')}}" height="50" style="filter: brightness(0) invert(1);"></div>
    <div class="login-body">
        <form method="POST" action="{{ route('admin.login.submit') }}">
            @csrf

            <div class="form-group">
                <label for="email">{{ __('E-Mail Address') }}</label>
                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                @endif
            </div>

            <div class="form-group">
                <label for="password">{{ __('Password') }}</label>
                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                @endif
            </div>

            <button type="submit" class="btn btn-primary btn-block">
                {{ __('Login') }}
            </button>
        </form>
    </div>
</div>

<script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
</body>
</html>