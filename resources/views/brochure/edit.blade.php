@extends('layouts.app')

@section('content')
    <div class="page">
        <form class="validate" action="{{route('brochure.update',$data->id)}}" method="post" enctype="multipart/form-data">
            {{ method_field('PUT') }}
            {{csrf_field()}}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control" name="title" value="{{$data->title}}" required>
                        @if($errors->has('title')){{$errors->first('title')}}@endif
                        </div>
                    </div>
            </div>
            <div class="form-group">
                <label>File</label>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <div class="input-container">
                            <span class="upload-text">Choose File</span>
                            <img class="img-fluid imgTarget imgTarget1" src={{asset('img/brochure/'.$data->file)}} width="800" alt="{{$data->name}}">
                            <input oldImg="{{$data->file}}" imgTarget="imgTarget1" type="file" class="form-control imgInput" name="file[]">
                        </div>
                    </div>
                </div>
                @if($errors->has('file')){{$errors->first('file')}}@endif
                <div class="imageToDelete">
                    <input type="hidden" name="imageToDelete[]" value="">
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
            <input type="submit" value="Update Brochure" class="btn btn-primary">
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

