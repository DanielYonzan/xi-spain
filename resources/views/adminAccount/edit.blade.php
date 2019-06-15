@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="page">
                <form class="validate" action="{{route('adminAccount.update',$data->id)}}" method="post">
                    {{ method_field('PUT') }}
                    {{csrf_field()}}
                    <div class="form-group">
                        <label>Name</label>
                        <input id="name" type="text" class="form-control" name="name" value="{{$data->name}}" required>
                        @if($errors->has('name')){{$errors->first('name')}}@endif
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" value="{{$data->email}}" required>
                        @if($errors->has('email')){{$errors->first('email')}}@endif
                    </div>
                    <div class="form-group">
                        <label>New Password</label>
                        <input type="password" class="form-control" name="password" required>
                        @if($errors->has('password')){{$errors->first('password')}}@endif
                    </div>
                    <input type="submit" value="Update AdminAccount" class="btn btn-primary">
                </form>
            </div>
        </div>
    </div>
@endsection

@section('extra-scripts')
    @component('component.validate')@endcomponent
@endsection

