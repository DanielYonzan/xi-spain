@extends('layouts.app')

@section('content')
    <div class="page">
        @component('component.alert')@endcomponent
            <table class="table table-bordered advanced-table" style="width:100%">
                <thead>
                <tr>
                    <th width="10">S.N.</th>
                    <th>title</th>
                    <th>File</th>
                    <th>Status</th>
                    <th width="90">Action</th>
                </tr>
                </thead>
                <tbody>
                @php($i=1)
                @foreach($data as $d)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$d->title}}</td>
                        <td><img class="img-fluid" src={{asset('img/brochure/'.$d->file)}} width="100" alt="{{$d->name}}"></td>
                        <td>
                            @if($d->status)
                                <div class="badge badge-success badge-pill">Active</div>
                            @else
                                <div class="badge badge-light badge-pill">In Active</div>
                            @endif
                        </td>
                        <td>
                            <a href="{{route('brochure.edit',$d->id)}}" class="btn btn-sm btn-success">Edit</a>
                            <form class="d-inline-block" action="{{route('brochure.destroy',$d->id)}}" method="post">
                                {{csrf_field()}}
                                {{method_field('delete')}}
                                <button type="submit" class="btn btn-sm btn-link text-danger" onclick="return  confirm('Are you sure want to delete? All the products in this category will also be deleted.')"><u>Delete</u></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
    </div>
@endsection

@section('extra-scripts')
    @component('component.datatable')@endcomponent
@endsection