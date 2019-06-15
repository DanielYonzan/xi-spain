@extends('layouts.app')
@section('content')
    <div class="page">
        @component('component.alert')@endcomponent
        <table class="table table-bordered advanced-table" style="width:100%">
            <thead>
            <tr>
                <th width="10">S.N.</th>
                <th>Name</th>
                <th>Email</th>
                <th>Registered At</th>
                <th width="90"></th>
            </tr>
            </thead>
            <tbody>
            @php($i=1)
            @foreach($data as $d)
                <tr>
                    <td>{{$i++}}</td>
                    <td>{{$d->name}}</td>
                    <td>{{$d->email}}</td>
                    <td>{{date("d M Y",strtotime($d->created_at))}}</td>
                    <td>
                        <a href="{{route('adminAccount.edit',$d->id)}}" class="btn btn-sm btn-success">Edit</a>
                        <form class="d-inline-block" action="{{route('adminAccount.destroy',$d->id)}}" method="post">
                                {{csrf_field()}}
                                {{method_field('delete')}}
                                <button type="submit" class="btn btn-sm btn-link text-danger" onclick="return  confirm('Are you sure want to delete?')"><u>Delete</u></button>
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