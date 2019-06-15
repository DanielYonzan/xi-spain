@extends('layouts.app')

@section('content')
    <div class="page">
        <form class="validate" action="{{route('feature.update',$data->id)}}" method="post" enctype="multipart/form-data">
            {{ method_field('PUT') }}
            {{csrf_field()}}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                        <label>Name(English)</label>
                        <input type="text" class="form-control" name="name_en" value="{{$data->name_en}}" required>
                        @if($errors->has('name_en')){{$errors->first('name_en')}}@endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                        <label>Name(Spanish)</label>
                        <input type="text" class="form-control" name="name_sp" value="{{$data->name_sp}}" required>
                        @if($errors->has('name_sp')){{$errors->first('name_sp')}}@endif
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label>Image (Recomended size: 400px*296px)</label>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <div class="input-container">
                            <span class="upload-text">Choose Image</span>
                            <img class="img-fluid imgTarget imgTarget1" src={{asset('img/feature/'.$data->image)}} width="800" alt="{{$data->name}}">
                            <input oldImg="{{$data->image}}" imgTarget="imgTarget1" type="file" class="form-control imgInput" name="image[]">
                        </div>
                    </div>
                </div>
                @if($errors->has('image')){{$errors->first('image')}}@endif
                <div class="imageToDelete">
                    <input type="hidden" name="imageToDelete[]" value="">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Short Description(English)</label>
                        <textarea class="form-control" name="short_description_en" rows="5" maxlength="300" required>{{$data->short_description_en}}</textarea>
                        @if($errors->has('short_description_en')){{$errors->first('short_description_en')}}@endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Short Description(Spanish)</label>
                        <textarea class="form-control" name="short_description_sp" rows="5" maxlength="300" required>{{$data->short_description_sp}}</textarea>
                        @if($errors->has('short_description_sp')){{$errors->first('short_description_sp')}}@endif
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label>Rank</label>
                <input type="number" class="form-control" name="rank" value="{{$data->rank}}" required>
                @if($errors->has('rank')){{$errors->first('rank')}}@endif
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
            <input type="submit" value="Update Feature" class="btn btn-primary">
        </form>
    </div>
@endsection

@section('extra-scripts')
    @component('component.validate')@endcomponent
    <script>
        $(document).ready(function () {
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

