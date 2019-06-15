@extends('layouts.app')

@section('content')
    <div class="page">
        <form class="validate" action="{{route('agent.store')}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Country</label>
                        <select class="form-control" name="country" required>
                            <option value="">Choose Country</option>
                            @php($i=1)
                            @foreach($countries as $country)
                                <option value="{{$i++}}">{{$country}}</option>
                            @endforeach
                        </select>
                        @if($errors->has('country')){{$errors->first('country')}}@endif
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>City</label>
                        <input type="text" class="form-control" name="city" required>
                        @if($errors->has('city')){{$errors->first('city')}}@endif
                    </div>
                </div>
                <div class="col-md-4">
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
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" required>
                        @if($errors->has('name')){{$errors->first('name')}}@endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" required>
                        @if($errors->has('email')){{$errors->first('email')}}@endif
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label>Logo/Image (Recomended size: 200px*200px)</label>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <div class="input-container" style="width: 200px; height: 200px">
                            <span class="upload-text">Choose Image</span>
                            <img style="width: 200px; height: 200px" class="img-fluid imgTarget imgTarget0" src={{asset('img/placeholder.jpg')}} width="200" alt="Placeholder Image">
                            <input imgTarget="imgTarget0" type="file" class="form-control imgInput" name="image[]" required>
                        </div>
                    </div>
                </div>
                @if($errors->has('image')){{$errors->first('image')}}@endif
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Website</label>
                        <input type="text" class="form-control" name="website">
                        @if($errors->has('website')){{$errors->first('website')}}@endif
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Skype</label>
                        <input type="text" class="form-control" name="skype">
                        @if($errors->has('skype')){{$errors->first('skype')}}@endif
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Whatsapp</label>
                        <input type="text" class="form-control" name="whatsapp" required>
                        @if($errors->has('whatsapp')){{$errors->first('whatsapp')}}@endif
                    </div>
                </div>
            </div>
            <input type="submit" value="Create Agent" class="btn btn-primary">
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
