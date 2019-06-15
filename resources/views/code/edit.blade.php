@extends('layouts.app')

@section('content')
    <div class="page">
        @component('component.alert')@endcomponent
        <form class="validate" action="{{route('code.update',$data->id)}}" method="post">
            {{ method_field('PUT') }}
            {{csrf_field()}}
            <div class="form-group">
                <label>Catalogue access code</label>
                <input type="text" class="form-control" name="value" value="{{$data->value}}" required>
                @if($errors->has('value')){{$errors->first('value')}}@endif
            </div>
            <input type="submit" value="Update Code" class="btn btn-primary">
        </form>
    </div>
@endsection

@section('extra-scripts')
    @component('component.validate')@endcomponent
@endsection

