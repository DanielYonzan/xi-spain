@extends('layouts.app')

@section('content')
    @php($auth = \Illuminate\Support\Facades\Auth::user())
    <ol class="breadcrumb">
        <li class="breadcrumb-item active">Welcome to {{config('app.name')}} Admin Panel!</li>
    </ol>

    <div class="page overview">
        <h3>Overview</h3>
        <div class="row text-center">
            @if($auth->role=='admin')
            <div class="col-lg-3 col-md-4">
                <a href="{{route('adminAccount.index')}}" class="mb-3">
                    <div class="card bg-primary">
                        <div class="card-body">
                            <div class="row shrink">
                                <div class="col-3"><i class="fa fa-users"></i></div>
                                <div class="col-9 count"><strong>+{{$count['partners']}}</strong> Partners</div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-4">
                <a href="{{route('category.index')}}" class="mb-3">
                    <div class="card bg-primary">
                        <div class="card-body">
                            <div class="row shrink">
                                <div class="col-3"><i class="fa fa-shopping-bag"></i></div>
                                <div class="col-9 count"><strong>+{{$count['categorys']}}</strong> Categorys</div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            @endif
            <div class="col-lg-3 col-md-4">
                <a href="{{route('product.index')}}" class="mb-3">
                    <div class="card bg-primary text-white">
                        <div class="card-body">
                            <div class="row shrink">
                                <div class="col-3"><i class="fa fa-briefcase"></i></div>
                                <div class="col-9 count"><strong>+{{$count['products']}}</strong> Products</div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
                @if($auth->role=='admin')
            <div class="col-lg-3 col-md-4">
                <a href="{{route('event.index')}}" class="mb-3">
                    <div class="card bg-primary text-white">
                        <div class="card-body">
                            <div class="row shrink">
                                <div class="col-3"><i class="fa fa-star"></i></div>
                                <div class="col-9 count"><strong>+{{$count['events']}}</strong> Events</div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
                    @endif
        </div>
    </div>

    @if($auth->role=='admin')
    <div class="page overview">
        <div class="row">
            <div class="col"><h3>Recent Checkouts</h3></div>
            <div class="col text-right"><a href="{{route('checkout.index')}}" class="text-primary"><strong>View All</strong></a></div>
        </div>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th width="10">S.N.</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Event</th>
                    <th>Price(€)</th>
                    <th>Checkout Date</th>
                </tr>
                </thead>
                <tbody>
                @php($i=1)
                @foreach($checkouts as $d)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$d->name}}</td>
                        <td>{{$d->email}}</td>
                        <td>{{$d->eventdata->name}}</td>
                        <td>{{$d->price}}</td>
                        <td>{{$d->created_at}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endif
@endsection
