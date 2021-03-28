@extends('layouts.common')
@section('title','Administrator')
@section('style')
    <x-style-common/>
    <link rel="stylesheet" type="text/css" href="{{ asset('js/plugins/datatables/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('js/plugins/datatables/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/datetime/1.0.2/css/dataTables.dateTime.min.css">
@endsection

@section('pre-loader')
    <x-pre-loader/>
@endsection

@section('main-container')
    <div class="main-container">
        <!-- code start -->
        <div class="pd-ltr-20">
            <div class="card-box pd-10 mb-10"><h3 class="text-info">Users List</h3></div>
            <div class="card-box pd-10 mb-10">
                <table id="account" class="data-table display" width="100%">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Full Name</th>
                        <th>Sex</th>
                        <th>BirthDay</th>
                        <th>Address</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th class="datatable-nosort">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($account as $item)
                        <tr>
                            <td>{{ $item->emp_id }}</td>
                            <td>{{ $item->full_name }}</td>
                            <td>{{ $item->sex }}</td>
                            <td>{{ $item->birthday }}</td>
                            <td>{{ $item->address }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->phone }}</td>
                            <td>
                                <div class="dropdown">
                                    <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                        <i class="dw dw-more"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                        <a class="dropdown-item" href="{{ route('adminView',$item->emp_id) }}"><i class="dw dw-eye"></i> View</a>
                                        <a class="dropdown-item" href="#"><i class="dw dw-edit2"></i> Edit</a>
                                        <a class="dropdown-item" href="#"><i class="dw dw-delete-3"></i> Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <x-footer />
        </div>
    </div>
@endsection

@section('script')
    <x-script-common/>
    <script src="{{ asset('js/plugins/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script src="https://cdn.datatables.net/datetime/1.0.2/js/dataTables.dateTime.min.js"></script>
    <script>
        $('document').ready(function() {

            $('#account').DataTable({
                scrollCollapse: true,
                autoWidth: false,
                responsive: true,
                columnDefs: [{
                    targets: "datatable-nosort",
                    orderable: false,
                }],
                "lengthMenu": [[15, 25, 50, -1], [15, 25, 50, "All"]],
                "language": {
                    "info": "_START_-_END_ of _TOTAL_ entries",
                    searchPlaceholder: "Search",
                    paginate: {
                        next: '<i class="ion-chevron-right"></i>',
                        previous: '<i class="ion-chevron-left"></i>'
                    }
                },
            });
        });
    </script>
@endsection
