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
                        <h1>User DataTables</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">User DataTables</li>
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
                                <h3 class="card-title">All Users DataTable</h3>
                            </div>

                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Id</th>
                                            <th class="text-center">Image</th>
                                            <th class="text-center">Name</th>
                                            <th class="text-center">Email</th>
                                            <th class="text-center">Phone</th>
                                            <th class="text-center">Role</th>
                                            <th class="text-center">Code</th>

                                            <th class="text-center">Salon Name En</th>
                                            <th class="text-center">Salon Name Ar</th>
                                            <th class="text-center">Commercial Registration Number</th>
                                            <th class="text-center">Certificate</th>
                                            <th class="text-center">Category</th>
                                            <th class="text-center">Iban</th>
                                            <th class="text-center">Country</th>
                                            <th class="text-center">City</th>
                                            <th class="text-center">Average_orders</th>
                                            <th class="text-center">Service_type</th>
                                            <th class="text-center">Monday</th>
                                            <th class="text-center">Tuesday</th>
                                            <th class="text-center">Wednesday</th>
                                            <th class="text-center">Thursday</th>
                                            <th class="text-center">Friday</th>
                                            <th class="text-center">Saturday</th>
                                            <th class="text-center">Sunday</th>
                                            <th class="text-center">Shift</th>
                                            <th class="text-center">Email Status</th>
                                            <th class="text-center">Account Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($salon as $users)
                                            <tr>
                                                <td class="text-center">{{ $users->id }}</td>
                                                <td class="text-center">
                                                    @if ($users->profile_image == true)
                                                        <img src="{{ env('APP_URL') . 'images/users/' . $users->profile_image }}"
                                                            style=" border-radius: 100px; width: 50px; height: 50px;"
                                                            alt="User Image">
                                                    @else
                                                        <img src="{{ asset('images/guest.png') }}"
                                                            style=" border-radius: 100px; width: 50px;  height: 50px;"
                                                            alt="User Image">
                                                    @endif
                                                </td>
                                                <td class="text-center">{{ $users->name }}</td>
                                                <td class="text-center">{{ $users->email }}</td>
                                                <td class="text-center">{{ $users->phone }}</td>
                                                <td class="text-center">{{ $users->role }}</td>
                                                <td class="text-center">{{ $users->code }}</td>

                                                <td class="text-center">{{ $users->salon_name_en }}</td>
                                                <td class="text-center">{{ $users->salon_name_ar }}</td>
                                                <td class="text-center">{{ $users->commercial_registration_number }}</td>
                                                <td class="text-center">{{ $users->certificate }}</td>
                                                <td class="text-center">{{ $users->category }}</td>
                                                <td class="text-center">{{ $users->iban }}</td>
                                                <td class="text-center">{{ $users->country }}</td>
                                                <td class="text-center">{{ $users->city }}</td>
                                                <td class="text-center">{{ $users->average_orders }}</td>
                                                <td class="text-center">{{ $users->service_type }}</td>
                                                <td class="text-center">{{ $users->monday }}</td>
                                                <td class="text-center">{{ $users->tuesday }}</td>
                                                <td class="text-center">{{ $users->wednesday }}</td>
                                                <td class="text-center">{{ $users->thursday }}</td>
                                                <td class="text-center">{{ $users->friday }}</td>
                                                <td class="text-center">{{ $users->saturday }}</td>
                                                <td class="text-center">{{ $users->sunday }}</td>
                                                <td class="text-center">{{ $users->shift }}</td>
                                                @if ($users->email_status == 1)
                                                    <td class="text-center">
                                                        <span class="badge badge-success">Verified</span>
                                                    </td>
                                                @else
                                                    <td class="text-center">
                                                        <span class="badge badge-danger">Not Verified</span>
                                                    </td>
                                                @endif
                                                @if ($users->account_status == 1)
                                                    <td class="text-center">
                                                        <span class="badge badge-success">Active</span>
                                                    </td>
                                                @else
                                                    <td class="text-center">
                                                        <span class="badge badge-danger">Blocked</span>
                                                    </td>
                                                @endif


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
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
@endsection
