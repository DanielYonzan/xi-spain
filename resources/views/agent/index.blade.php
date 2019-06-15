@extends('layouts.app')

@section('content')
    <div class="page">
        @component('component.alert')@endcomponent
            <table class="table table-bordered advanced-table" style="width:100%">
                <thead>
                <tr>
                    <th width="10">S.N.</th>
                    <th>Name</th>
                    <th>Logo/Image</th>
                    <th>Email</th>
                    <th>Website</th>
                    <th>Skype</th>
                    <th>Whatsapp</th>
                    <th>Country</th>
                    <th>City</th>
                    <th>Speciality</th>
                    <th width="90">Action</th>
                </tr>
                </thead>
                <tbody>
                @php($i=1)
                @foreach($data as $d)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$d->name}}</td>
                        <td><img class="img-fluid" src={{asset('img/agent/'.$d->image)}} width="100" alt="{{$d->name}}"></td>
                        <td>{{$d->email}}</td>
                        <td>{{$d->website}}</td>
                        <td>{{$d->skype}}</td>
                        <td>{{$d->whatsapp}}</td>
                        <td>{{$countries[$d->country-1]}}</td>
                        <td>{{$d->city}}</td>
                        <td>{{$d->categorydata->name_en}}</td>
                        <td>
                            <a href="{{route('agent.edit',$d->id)}}" class="btn btn-sm btn-success">Edit</a>
                            <form class="d-inline-block" action="{{route('agent.destroy',$d->id)}}" method="post">
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