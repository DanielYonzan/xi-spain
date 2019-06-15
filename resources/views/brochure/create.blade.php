@extends('layouts.app')

@section('content')
    <div class="page">
        <form class="validate" action="{{route('brochure.store')}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control" name="title" required>
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
                            <img class="img-fluid imgTarget imgTarget0" src={{asset('img/placeholder.jpg')}} width="800" alt="Placeholder Image">
                            <input imgTarget="imgTarget0" type="file" class="form-control imgInput" name="file[]" required>
                        </div>
                    </div>
                </div>
                @if($errors->has('file')){{$errors->first('file')}}@endif
            </div>
            <div class="form-group">
                <label>Status</label>
                <div>
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                        <label class="btn btn-sm btn-light active">
                            <input type="radio" name="status" value="1" autocomplete="off" checked>Active
                        </label>
                        <label class="btn btn-sm btn-light">
                            <input type="radio" name="status" value="0" autocomplete="off">In Active
                        </label>
                    </div>
                </div>
            </div>
            <input type="submit" value="Upload Brochure" class="btn btn-primary">
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
