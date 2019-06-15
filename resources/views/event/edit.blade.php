@extends('layouts.app')

@section('extra-styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
@endsection

@section('content')
    <div class="page">
        <form class="validate" action="{{route('event.update',$data->id)}}" method="post" enctype="multipart/form-data">
            {{ method_field('PUT') }}
            {{csrf_field()}}
            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" name="name" value="{{$data->name}}" required>
                @if($errors->has('name')){{$errors->first('name')}}@endif
            </div>
            <div class="form-group">
                <label>Image (Recomended size: 360px*200px)</label>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <div class="input-container">
                            <span class="upload-text">Choose Image</span>
                            <img class="img-fluid imgTarget imgTarget1" src={{asset('img/event/'.$data->image)}} width="400" alt="{{$data->name}}">
                            <input oldImg="{{$data->image}}" imgTarget="imgTarget1" type="file" class="form-control imgInput" name="image[]">
                        </div>
                    </div>
                </div>
                @if($errors->has('image')){{$errors->first('image')}}@endif
                <div class="imageToDelete">
                    <input type="hidden" name="imageToDelete[]" value="">
                </div>
            </div>
            <div class="form-group">
                <label>Price(€)</label>
                <input type="number" step="0.1" class="form-control" name="price" value="{{$data->price}}" required>
                @if($errors->has('price')){{$errors->first('price')}}@endif
            </div>
            <div class="form-group">
                <label>Event Date</label>
                <input type="text" class="daterange form-control" name="date" value="{{$data->date}}" required>
                @if($errors->has('date')){{$errors->first('date')}}@endif
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Short Description(English)</label>
                        <textarea class="form-control" name="short_description_en" rows="7" maxlength="600" required>{{$data->short_description_en}}</textarea>
                        @if($errors->has('short_description_en')){{$errors->first('short_description_en')}}@endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Short Description(Spanish)</label>
                        <textarea class="form-control" name="short_description_sp" rows="7" maxlength="600" required>{{$data->short_description_sp}}</textarea>
                        @if($errors->has('short_description_sp')){{$errors->first('short_description_sp')}}@endif
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label>Status</label>
                <div>
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                        <label class="btn btn-sm btn-light @if($data->status==1) active @endif">
                            <input type="radio" name="status" value="1" autocomplete="off" @if($data->status==1) Checked @endif>Active
                        </label>
                        <label class="btn btn-sm btn-light @if($data->status==0) active @endif">
                            <input type="radio" name="status" value="0" autocomplete="off" @if($data->status==0) Checked @endif>In Active
                        </label>
                    </div>
                </div>
            </div>
            <input type="submit" value="Update Event" class="btn btn-primary">
        </form>
    </div>
@endsection

@section('extra-scripts')
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    @component('component.validate')@endcomponent
    <script>
        $(document).ready(function () {
            $('input.daterange').daterangepicker();

            $("input.imgInput").change(function() {
                var imgTarget = $(this).attr('imgTarget');
                if (this.files && this.files[0]) {
                    $input = '<input type="hidden" name="imageToDelete[]" value="'+$(this).attr('oldImg')+'">';
                    $('.imageToDelete').append($input);
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $("."+imgTarget).attr("src",e.target.result);
                    }

                    reader.readAsDataURL(this.files[0]);
                }
            });
        });
    </script>
@endsection

