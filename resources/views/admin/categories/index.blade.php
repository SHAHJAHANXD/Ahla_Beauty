@extends('admin.layout')
@section('title')
Admin | All Users
@endsection
@section('extra-heads')
<link rel="stylesheet" href="{{ asset('admin') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="{{ asset('admin') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="{{ asset('admin') }}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
@endsection
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Category DataTables</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Category DataTables</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">All Category DataTable</h3>
                            <div class="card-body" style="text-align: end;">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">
                                    Add Category
                                </button>
                            </div>
                        </div>

                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center">Category Id</th>
                                        <th class="text-center">Category Image</th>
                                        <th class="text-center">Category Name</th>
                                        <th class="text-center">Category Status</th>
                                        <th class="text-center">Category Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($category as $category)
                                    <tr>
                                        <td class="text-center">{{ $category->id }}</td>
                                        <td class="text-center">
                                            @if ($category->category_image == true)
                                            <img src="{{$category->category_image; }}" style=" border-radius: 100px; width: 50px; height: 50px;" alt="User Image">
                                            @else
                                            <img src="{{ asset('images/guest.png') }}" style=" border-radius: 100px; height: 50px; width: 50px;" alt="User Image">
                                            @endif
                                        </td>
                                        <td class="text-center">{{ $category->category_name }}</td>
                                        @if ($category->category_status == 1)
                                        <td class="text-center">
                                            <span class="badge badge-success">Active</span>
                                        </td>
                                        @else
                                        <td class="text-center">
                                            <span class="badge badge-danger">Block</span>
                                        </td>
                                        @endif
                                        <td class="text-center">
                                            <span class="badge badge-success">Active</span>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>
</div>
<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">New Category</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.post_categories') }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <label for="name">Category name</label>
                    <input type="text" class="form-control" id="name" name="category_name" placeholder="Enter Category Name">
                    @if ($errors->has('category_name'))
                    <span class="text-danger">{{ $errors->first('category_name') }}</span>
                    @endif
                    <label for="file">Category Image</label>
                    <input type="file" name="category_image" class="form-control" id="file" multiple>
                    @if ($errors->has('category_image'))
                    <span class="text-danger">{{ $errors->first('category_image') }}</span>
                    @endif
                    <div class="div" style="margin-top: 20px; ">
                        <button type="submit" class="btn btn-primary form-control">Save</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>

        </div>

    </div>

</div>
@endsection
@section('extra-scripts')
<script src="{{ asset('admin') }}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{ asset('admin') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ asset('admin') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{ asset('admin') }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="{{ asset('admin') }}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{ asset('admin') }}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="{{ asset('admin') }}/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="{{ asset('admin') }}/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="{{ asset('admin') }}/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true
            , "lengthChange": false
            , "autoWidth": false
            , "buttons": ["copy", "csv", "excel", "pdf", "print"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true
            , "lengthChange": false
            , "searching": false
            , "ordering": true
            , "info": true
            , "autoWidth": false
            , "responsive": true
        , });
    });

</script>
<script>
    @if(Session::has('success'))
    toastr.options = {
        "closeButton": true
        , "progressBar": true
    }
    toastr.success("{{ session('success') }}");
    @endif

</script>
@endsection
