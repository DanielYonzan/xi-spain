@php
    $uriArr = explode('/',$_SERVER['REQUEST_URI']);
    switch (count($uriArr)){
        case 3:
        $title = $uriArr[2].' List';
        break;

        case 4:
        if (filter_var($uriArr[3], FILTER_VALIDATE_INT)){
            $title = 'View '.$uriArr[2];
        }else{
            $title = $uriArr[3].' '.$uriArr[2];
        }
        break;

        case 5:
        $title = $uriArr[4].' '.$uriArr[2];
        break;

        default:
        $title = 'Admin';
    }
    $title = ucwords($title);
@endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$title}} | {{ config('app.name') }}</title>

    <!--favicon-->
    <link rel="icon" href="{{asset('img/favicon.png')}}">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,500" rel="stylesheet">
    
    {{--Favicon--}}
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('img/favicon.png')}}">

    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    @yield('extra-styles')
    <link rel="stylesheet" href="{{asset('css/app.css')}}" />
</head>
<body>
<header class="fixed-top">
    <nav class="navbar navbar-expand">
        <button class="sidebar-toggler" type="button"><i class="fa fa-bars"></i></button>
        <a class="navbar-brand" href="{{route('admin.dashboard')}}"><img src="{{asset('img/logo.png')}}" height="40" alt="{{config('app.name')}} logo"></a>
        <div class="navbar-collapse">
            <ul class="navbar-nav ml-auto">
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('admin.logout') }}">
                                {{ __('Logout') }}
                            </a>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </nav>
</header>

<aside class="sidebar">
    <nav class="navbar navbar-expand">
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.dashboard')}}"><i class="fa fa-home"></i> <span>Dashboard</span></a>
                </li>
                @php($auth = \Illuminate\Support\Facades\Auth::user())
                @if($auth->role=='admin')
                <li class="nav-item tree">
                    <a class="nav-link" href="#"><i class="fa fa-user"></i> <span>Partners</span></a>
                    <ul>
                        <li><a href="{{route('adminAccount.create')}}"><i class="fa fa-plus"></i> Create Account</a></li>
                        <li><a href="{{route('adminAccount.index')}}"><i class="fa fa-list-alt"></i>Account List</a></li>
                    </ul>
                </li>
                    <li class="nav-item tree">
                        <a class="nav-link" href="#"><i class="fa fa-user"></i> <span>Partners (Agents)</span></a>
                        <ul>
                            <li><a href="{{route('agent.create')}}"><i class="fa fa-plus"></i> Create Agent</a></li>
                            <li><a href="{{route('agent.index')}}"><i class="fa fa-list-alt"></i>Agent List</a></li>
                        </ul>
                    </li>
                <li class="nav-item tree">
                    <a class="nav-link" href="#"><i class="fa fa-book"></i> <span>Feature</span></a>
                    <ul>
                        <li><a href="{{route('feature.create')}}"><i class="fa fa-plus"></i> Create Feature</a></li>
                        <li><a href="{{route('feature.index')}}"><i class="fa fa-list-alt"></i>Feature List</a></li>
                    </ul>
                </li>
                <li class="nav-item tree">
                    <a class="nav-link" href="#"><i class="fa fa-book"></i> <span>Category</span></a>
                    <ul>
                        <li><a href="{{route('category.create')}}"><i class="fa fa-plus"></i> Create Category</a></li>
                        <li><a href="{{route('category.index')}}"><i class="fa fa-list-alt"></i>Category List</a></li>
                    </ul>
                </li>
                @endif
                <li class="nav-item tree">
                    <a class="nav-link" href="#"><i class="fa fa-book"></i> <span>Product</span></a>
                    <ul>
                        <li><a href="{{route('product.create')}}"><i class="fa fa-plus"></i> Create Product</a></li>
                        <li><a href="{{route('product.index')}}"><i class="fa fa-list-alt"></i>Product List</a></li>
                    </ul>
                </li>
                <li class="nav-item tree">
                    <a class="nav-link" href="#"><i class="fa fa-book"></i> <span>Brochure</span></a>
                    <ul>
                        <li><a href="{{route('brochure.create')}}"><i class="fa fa-plus"></i> Upload Brochure</a></li>
                        <li><a href="{{route('brochure.index')}}"><i class="fa fa-list-alt"></i>Brochure List</a></li>
                    </ul>
                </li>
                @if($auth->role=='admin')
                <li class="nav-item tree">
                    <a class="nav-link" href="#"><i class="fa fa-book"></i> <span>Event</span></a>
                    <ul>
                        <li><a href="{{route('event.create')}}"><i class="fa fa-plus"></i> Create Event</a></li>
                        <li><a href="{{route('event.index')}}"><i class="fa fa-list-alt"></i>Event List</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('checkout.index')}}"><i class="fa fa-book"></i> <span>Checkout List</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('code.edit',1)}}"><i class="fa fa-book"></i> <span>Catalogue Code</span></a>
                </li>
                @endif
            </ul>
        </div>
    </nav>
</aside>

<div class="content">
    <div class="content-header">
        <h2>{{$title}}</h2>
        {{--<ol class="breadcrumb">--}}
            {{--<li class="breadcrumb-item"><a href="#">Highdmin</a></li>--}}
            {{--<li class="breadcrumb-item"><a href="#">Email</a></li>--}}
            {{--<li class="breadcrumb-item active">Inbox</li>--}}
        {{--</ol>--}}
    </div>
    @yield('content')
</div>

<footer>
    <strong>Copyright © 2019 <a href="{{config('app.url')}}">{{config('app.name')}}</a>.</strong> All rights
    reserved.
</footer>


<script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('js/popper.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/app.js')}}"></script>
@yield('extra-scripts')
</body>
</html>
