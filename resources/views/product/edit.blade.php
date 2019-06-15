@extends('layouts.app')

@section('extra-styles')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')
    <div class="page">
        <form class="validate" action="{{route('product.update',$data->id)}}" method="post" enctype="multipart/form-data">
            {{ method_field('PUT') }}
            {{csrf_field()}}
            <div class="form-group">
                <label>Category</label>
                <select class="form-control formSelect2" name="category[]" multiple required>
                    <option value="">Choose Category</option>
                    @foreach($categorys as $category)
                        <option value="{{$category->id}}" @if(in_array($category->id,$productCategorys)) selected @endif>{{$category->name_en}}</option>
                    @endforeach
                </select>
                @if($errors->has('category')){{$errors->first('category')}}@endif
            </div>
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
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Size</label>
                        <div class="input-group">
                            <input type="number" step="0.0001" class="form-control" name="size" value="{{$data->size}}" required>
                            <select name="unit" class="input-group-append form-control" style="max-width: 90px" required>
                                <option value="">Unit</option>
                                <option value="ml" @if($data->unit=='ml') selected @endif>ml</option>
                                <option value="grs" @if($data->unit=='grs') selected @endif>grs</option>
                            </select>
                        </div>
                        @if($errors->has('size')){{$errors->first('size')}}@endif
                        @if($errors->has('unit')){{$errors->first('unit')}}@endif
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Exworks price(€)</label>
                        <input type="number" step="0.0001" class="form-control" name="price" value="{{$data->price}}" required>
                        @if($errors->has('price')){{$errors->first('price')}}@endif
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Units per case</label>
                        <input type="number" step="0.0001" class="form-control" name="units_per_case" value="{{$data->units_per_case}}" required>
                        @if($errors->has('units_per_case')){{$errors->first('units_per_case')}}@endif
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Cases per palet</label>
                        <input type="number" step="0.0001" class="form-control" name="cases_per_palet" value="{{$data->cases_per_palet}}" required>
                        @if($errors->has('cases_per_palet')){{$errors->first('cases_per_palet')}}@endif
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Cases per palet layer</label>
                        <input type="number" step="0.0001" class="form-control" name="cases_per_palet_layer" value="{{$data->cases_per_palet_layer}}" required>
                        @if($errors->has('cases_per_palet_layer')){{$errors->first('cases_per_palet_layer')}}@endif
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Palets per 20 container</label>
                        <input type="number" step="0.0001" class="form-control" name="palets_per_20_container" value="{{$data->palets_per_20_container}}" required>
                        @if($errors->has('palets_per_20_container')){{$errors->first('palets_per_20_container')}}@endif
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Self life</label>
                        <input type="number" step="0.0001" class="form-control" name="self_life" value="{{$data->self_life}}" required>
                        @if($errors->has('self_life')){{$errors->first('self_life')}}@endif
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="form-group">
                        <label>City of Origin</label>
                        <input type="text" class="form-control" name="origin" value="{{$data->origin}}" required>
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
                            <img class="img-fluid imgTarget imgTarget1" src={{asset('img/product/'.$data->image)}} width="400" alt="{{$data->name}}">
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
                <label>Minimal Order Quantity</label>
                <input type="number" class="form-control" name="min_order" value="{{$data->min_order}}" required>
                @if($errors->has('min_order')){{$errors->first('min_order')}}@endif
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Short Description(English)</label>
                        <textarea class="form-control" name="short_description_en" rows="5" maxlength="100" required>{{$data->short_description_en}}</textarea>
                        @if($errors->has('short_description_en')){{$errors->first('short_description_en')}}@endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Short Description(Spanish)</label>
                        <textarea class="form-control" name="short_description_sp" rows="5" maxlength="100" required>{{$data->short_description_sp}}</textarea>
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
            <input type="submit" value="Update Product" class="btn btn-primary">
        </form>
    </div>
@endsection

@section('extra-scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
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

            $('.formSelect2').select2({
                placeholder: 'Select Multiple'
            });
        });
    </script>
@endsection

