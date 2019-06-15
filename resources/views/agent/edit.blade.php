@extends('layouts.app')

@section('content')
    <div class="page">
        <form class="validate" action="{{route('agent.update',$data->id)}}" method="post" enctype="multipart/form-data">
            {{ method_field('PUT') }}
            {{csrf_field()}}
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Country</label>
                        <select class="form-control" name="country" required>
                            <option value="">Choose Country</option>
                            @php($i=1)
                            @foreach($countries as $country)
                                <option value="{{$i++}}" @if($i-1==$data->country) selected @endif>{{$country}}</option>
                            @endforeach
                        </select>
                        @if($errors->has('country')){{$errors->first('country')}}@endif
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>City</label>
                        <input type="text" class="form-control" name="city" value="{{$data->city}}" required>
                        @if($errors->has('city')){{$errors->first('city')}}@endif
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Category</label>
                        <select class="form-control" name="category" required>
                            <option value="">Choose Category</option>
                            @foreach($categorys as $category)
                                <option value="{{$category->id}}" @if($category->id==$data->category) selected @endif>{{$category->name_en}}</option>
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
                        <input type="text" class="form-control" name="name" value="{{$data->name}}" required>
                        @if($errors->has('name')){{$errors->first('name')}}@endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" value="{{$data->email}}" required>
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
                            <img style="width: 200px; height: 200px" class="img-fluid imgTarget imgTarget1" src={{asset('img/agent/'.$data->image)}} width="200" alt="{{$data->name}}">
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
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Website</label>
                        <input type="text" class="form-control" name="website" value="{{$data->website}}">
                        @if($errors->has('website')){{$errors->first('website')}}@endif
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Skype</label>
                        <input type="text" class="form-control" name="skype" value="{{$data->skype}}">
                        @if($errors->has('skype')){{$errors->first('skype')}}@endif
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Whatsapp</label>
                        <input type="text" class="form-control" name="whatsapp" value="{{$data->whatsapp}}" required>
                        @if($errors->has('whatsapp')){{$errors->first('whatsapp')}}@endif
                    </div>
                </div>
            </div>
            <input type="submit" value="Update Agent" class="btn btn-primary">
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

