@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="page">
                <form class="validate" action="{{route('adminAccount.store')}}" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" required>
                        @if($errors->has('name')){{$errors->first('name')}}@endif
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" required>
                        @if($errors->has('email')){{$errors->first('email')}}@endif
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" required>
                        @if($errors->has('password')){{$errors->first('password')}}@endif
                    </div>
                    <input type="submit" value="Create AdminAccount" class="btn btn-primary">
                </form>
            </div>
        </div>
    </div>
@endsection

@section('extra-scripts')
    @component('component.validate')@endcomponent
@endsection

