@extends('layouts.app')

@section('content')
    <div class="page">
        <form class="validate" action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="form-group">
                    <label>Category</label>
                    <select class="form-control" name="category" required>
                        <option value="">Choose Category</option>
                        @foreach($categorys as $category)
                            <option value="{{$category->id}}">{{$category->name_en}}</option>
                        @endforeach
                    </select>
                    @if($errors->has('category')){{$errors->first('category')}}@endif
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Name(English)</label>
                        <input type="text" class="form-control" name="name_en" required>
                        @if($errors->has('name_en')){{$errors->first('name_en')}}@endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Name(Spanish)</label>
                        <input type="text" class="form-control" name="name_sp" required>
                        @if($errors->has('name_sp')){{$errors->first('name_sp')}}@endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Size(ml)</label>
                        <input type="number" step="0.0001" class="form-control" name="size" required>
                        @if($errors->has('size')){{$errors->first('size')}}@endif
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Exworks price(€)</label>
                        <input type="number" step="0.0001" class="form-control" name="price" required>
                        @if($errors->has('price')){{$errors->first('price')}}@endif
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="form-group">
                        <label>City of Origin</label>
                        <input type="text" class="form-control" name="origin" required>
                        @if($errors->has('origin')){{$errors->first('origin')}}@endif
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label>Image (Recomended size: 400px*296px)</label>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <div class="input-container">
                            <span class="upload-text">Choose Image</span>
                            <img class="img-fluid imgTarget imgTarget0" src={{asset('img/placeholder.jpg')}} width="400" alt="Placeholder Image">
                            <input imgTarget="imgTarget0" type="file" class="form-control imgInput" name="image[]" required>
                        </div>
                    </div>
                </div>
                @if($errors->has('image')){{$errors->first('image')}}@endif
            </div>
            <div class="form-group">
                <label>Minimal Order Quantity</label>
                <input type="number" class="form-control" name="min_order" required>
                @if($errors->has('min_order')){{$errors->first('min_order')}}@endif
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Short Description(English)</label>
                        <textarea class="form-control" name="short_description_en" rows="5" maxlength="100" required></textarea>
                        @if($errors->has('short_description_en')){{$errors->first('short_description_en')}}@endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Short Description(Spanish)</label>
                        <textarea class="form-control" name="short_description_sp" rows="5" maxlength="100" required></textarea>
                        @if($errors->has('short_description_sp')){{$errors->first('short_description_sp')}}@endif
                    </div>
                </div>
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
            <input type="submit" value="Create Product" class="btn btn-primary">
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
