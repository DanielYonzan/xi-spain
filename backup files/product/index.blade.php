@extends('layouts.app')

@section('content')
    <div class="page">
        @component('component.alert')@endcomponent
        <div class="table-tools form-group text-right"></div>
            <table class="table table-bordered advanced-table" style="width:100%">
                <thead>
                <tr>
                    <th width="10">S.N.</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Size(ml)</th>
                    <th>Price(€)</th>
                    <th>Origin</th>
                    <th>Min Order</th>
                    <th>Short Description</th>
                    <th>Status</th>
                    <th width="150">Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $i=1;
                $images = [];
                foreach($data as $d){
                    array_push($images,asset('img/product/'.$d->image));?>
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$d->name_en}}</td>
                        <td><img class="img-fluid" src={{asset('img/product/'.$d->image)}} width="100" alt="{{$d->name}}"></td>
                        <td>{{$d->size}}</td>
                        <td>{{$d->price}}</td>
                        <td>{{$d->origin}}</td>
                        <td>{{$d->min_order}}</td>
                        <td>{{$d->short_description_en}}</td>
                        <td>
                            @if($d->status)
                                <div class="badge badge-success badge-pill">Active</div>
                            @else
                                <div class="badge badge-light badge-pill">In Active</div>
                            @endif
                        </td>
                        <td>
                            <a href="{{route('product.edit',$d->id)}}" class="btn btn-sm btn-success">Edit</a>
                            <form class="d-inline-block" action="{{route('product.destroy',$d->id)}}" method="post">
                                {{csrf_field()}}
                                {{method_field('delete')}}
                                <button type="submit" class="btn btn-sm btn-link text-danger" onclick="return  confirm('Are you sure want to delete?')"><u>Delete</u></button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
    </div>
@endsection

@section('extra-scripts')
    <!-- DataTables with exporting -->
    <script src="{{asset('dataTable/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('dataTable/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('dataTable/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('dataTable/js/buttons.bootstrap.min.js')}}"></script>
    <script src="{{asset('dataTable/js/pdfmake.min.js')}}"></script>
    <script src="{{asset('dataTable/js/vfs_fonts.js')}}"></script>
    <script src="{{asset('dataTable/js/buttons.html5.min.js')}}"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script>
        function getBase64Image(img) {
            var canvas = document.createElement("canvas");
            canvas.width = img.width;
            canvas.height = img.height;
            var ctx = canvas.getContext("2d");
            ctx.drawImage(img, 0, 0, 400, img.height * (400/img.width));
            return canvas.toDataURL("image/png");
        }

        var images = <?php echo json_encode($images) ?>;

        var myGlyph = new Image();

        $(document).ready(function () {
            var table = $('.advanced-table').dataTable( {
                "responsive": true,
                "order": [],
                "columnDefs": [ {
                    "targets"  : [0],
                    "orderable": false,
                    "className": "text-center",
                }]
            });

            if(table.length) {
                new $.fn.dataTable.Buttons(table, {
                    buttons: [{
                        extend: 'pdfHtml5',
                        text: '<i class="fa fa-file-pdf-o"></i> Generate PDF',
                        title: 'Product Catalogue',
                        titleAttr: 'Generate PDF',
                        customize: function (doc) {
                            doc.images = doc.images || {};
                            console.log(getBase64Image(myGlyph));
                            for (var i = 1; i < doc.content[1].table.body.length; i++) {
                                doc.content[1].table.body[i][2].width = 70;
                                myGlyph.src = images[i - 1];
                                delete doc.content[1].table.body[i][2].text;
                                doc.content[1].table.body[i][2].image = getBase64Image(myGlyph);
                            }
                        },
                        exportOptions: {
                            stripHtml: false,
                            columns: [0,1,2,3,4,5,6,7],
                        }
                    }]
                }).container().appendTo('.table-tools');
            }
        });
    </script>
@endsection