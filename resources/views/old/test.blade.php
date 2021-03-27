@extends('layouts.common')
@section('title','Management')
@section('style')
    <x-style-common />
@endsection

@section('pre-loader')
    <x-pre-loader />
    <link rel="stylesheet" type="text/css" href="{{ asset('js/plugins/datatables/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('js/plugins/datatables/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/datetime/1.0.2/css/dataTables.dateTime.min.css">
@endsection

@section('main-container')
    <a href="#" class="btn-block position-fixed rounded-circle p-2 tv-btn-create" data-toggle="modal" data-target="#Medium-modal" type="button">
        <i class="icon-copy fi-plus"></i>
    </a>
    <div class="modal fade z-99999" id="Medium-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">Create task</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <form action="">
                        <div class="row">
                            <div class="col-xl-2">
                                <div class="form-group">
                                    <label >JOB TYPE</label>
                                    <select class="custom-select col-12">
                                        <option selected="">Choose...</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="">IMPORTANT</label>
                                    <select class="custom-select col-12">
                                        <option selected="">Choose...</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="">ITERATION</label>
                                    <select class="custom-select col-12">
                                        <option selected="">Choose...</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="">Process</label>
                                    <select class="custom-select col-12">
                                        <option selected="">Choose...</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Default Datedpicker</label>
                                    <input class="form-control date-picker" placeholder="Select Date" type="text">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="">Phase</label>
                                    <select class="custom-select col-12">
                                        <option selected="">Choose...</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="html-editor pd-20 mb-30 w-100">
                                <div class="form-group">
                                    <label for="">Title</label>
                                    <input class="form-control" type="text" placeholder="Task title">
                                </div>
                                <div class="form-group">
                                    <label for="">Content</label>
                                    <textarea class="textarea_editor form-control border-radius-0" placeholder="Enter text ..."></textarea>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Create</button>
                </div>
            </div>
        </div>
    </div>
    <div class="main-container">
        <div class="pd-ltr-20">
            <!-- Select-2 Start tam thoi xoa -->
            <!-- <div class="pd-5 mb-30">
                <form>
                    <div class="row">
                        <div class="col-xl-2">
                            <div class="form-group">
                                <label for="sl1"></label>
                                <select id="sl1" class="custom-select2 form-control" name="state"
                                        style="width: 100%; height: 38px;">
                                    <optgroup label="Alaskan/Hawaiian Time Zone">
                                        <option value="AK">Alaska</option>
                                        <option value="HI">Hawaii</option>
                                    </optgroup>
                                    <optgroup label="Pacific Time Zone">
                                        <option value="CA">California</option>
                                        <option value="NV">Nevada</option>
                                        <option value="OR">Oregon</option>
                                        <option value="WA">Washington</option>
                                    </optgroup>
                                    <optgroup label="Mountain Time Zone">
                                        <option value="AZ">Arizona</option>
                                        <option value="CO">Colorado</option>
                                        <option value="ID">Idaho</option>
                                        <option value="MT">Montana</option>
                                        <option value="NE">Nebraska</option>
                                        <option value="NM">New Mexico</option>
                                        <option value="ND">North Dakota</option>
                                        <option value="UT">Utah</option>
                                        <option value="WY">Wyoming</option>
                                    </optgroup>
                                </select>
                            </div>
                        </div>
                        <div class="col-xl-2">
                            <div class="form-group">
                                <label for="sl2"></label>
                                <select id="sl2" class="custom-select2 form-control" name="state"
                                        style="width: 100%; height: 38px;">
                                    <optgroup label="Alaskan/Hawaiian Time Zone">
                                        <option value="AK">Alaska</option>
                                        <option value="HI">Hawaii</option>
                                    </optgroup>
                                    <optgroup label="Pacific Time Zone">
                                        <option value="CA">California</option>
                                        <option value="NV">Nevada</option>
                                        <option value="OR">Oregon</option>
                                        <option value="WA">Washington</option>
                                    </optgroup>
                                    <optgroup label="Mountain Time Zone">
                                        <option value="AZ">Arizona</option>
                                        <option value="CO">Colorado</option>
                                        <option value="ID">Idaho</option>
                                        <option value="MT">Montana</option>
                                        <option value="NE">Nebraska</option>
                                        <option value="NM">New Mexico</option>
                                        <option value="ND">North Dakota</option>
                                        <option value="UT">Utah</option>
                                        <option value="WY">Wyoming</option>
                                    </optgroup>
                                </select>
                            </div>
                        </div>
                        <div class="col-xl-2">
                            <div class="form-group">
                                <label for="sl3"></label>
                                <select id="sl3" class="custom-select2 form-control" name="state"
                                        style="width: 100%; height: 38px;">
                                    <optgroup label="Alaskan/Hawaiian Time Zone">
                                        <option value="AK">Alaska</option>
                                        <option value="HI">Hawaii</option>
                                    </optgroup>
                                    <optgroup label="Pacific Time Zone">
                                        <option value="CA">California</option>
                                        <option value="NV">Nevada</option>
                                        <option value="OR">Oregon</option>
                                        <option value="WA">Washington</option>
                                    </optgroup>
                                    <optgroup label="Mountain Time Zone">
                                        <option value="AZ">Arizona</option>
                                        <option value="CO">Colorado</option>
                                        <option value="ID">Idaho</option>
                                        <option value="MT">Montana</option>
                                        <option value="NE">Nebraska</option>
                                        <option value="NM">New Mexico</option>
                                        <option value="ND">North Dakota</option>
                                        <option value="UT">Utah</option>
                                        <option value="WY">Wyoming</option>
                                    </optgroup>
                                </select>
                            </div>
                        </div><script src="{{ asset('') }}"></script>
                        <div class="col-xl-2">
                            <div class="form-group">
                                <label for="sl4"></label>
                                <select id="sl4" class="custom-select2 form-control" multiple="multiple"
                                        style="width: 100%;">
                                    <optgroup label="Alaskan/Hawaiian Time Zone">
                                        <option value="AK">Alaska</option>
                                        <option value="HI">Hawaii</option>
                                    </optgroup>
                                    <optgroup label="Pacific Time Zone">
                                        <option value="CA">California</option>
                                        <option value="NV">Nevada</option>
                                        <option value="OR">Oregon</option>
                                        <option value="WA">Washington</option>
                                    </optgroup>
                                    <optgroup label="Mountain Time Zone">
                                        <option value="AZ">Arizona</option>
                                        <option value="CO">Colorado</option>
                                        <option value="ID">Idaho</option>
                                        <option value="MT">Montana</option>
                                        <option value="NE">Nebraska</option>
                                        <option value="NM">New Mexico</option>
                                        <option value="ND">North Dakota</option>
                                        <option value="UT">Utah</option>
                                        <option value="WY">Wyoming</option>
                                    </optgroup>
                                </select>
                            </div>
                        </div>
                        <div class="col-xl-2">
                            <div class="form-group">
                                <label for="sl5"></label>
                                <input id="sl5" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-xl-2">
                            <div class="form-group">
                                <label></label>
                                <button class="btn btn-info form-control">Search</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div> -->
           <!-- Select-2 end -->
            <div class="pd-5">
                <div class="card-box">

                </div>
            </div>
            {{-- Table data --}}
            <div class="pd-5">
                <div class="card-box mb-30">
                    <div class="pd-10">
                        <div class="row pd-20">
                            <div class="mr-3">
                            <input type="text" id="min" name="min" placeholder="Registered Date" style="width: 150px">
                            </div>
                            <div class="">
                            <input type="text" id="max" name="max" placeholder="To" style="width: 150px">
                            </div>
                        </div>
                        <table class="data-table display" width="100%">
                            <thead>
                            <tr>
                                <th class="datatable-nosort">#</th>
                                <th>Project</th>
                                <th>State</th>
                                <th>Job type</th>
                                <th>Process</th>
                                <th>Assignee</th>
                                <th>Registered User</th>
                                <th>Registered Date</th>
                                <th>Due Date</th>
                                <th>Effort</th>
                                <th>Title</th>
                                <th class="datatable-nosort">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($tasks as $task)
                                <tr>
                                <td>{{ $task->task_id }}</td>
                                <td>{{ $task->project_name }}</td>
                                <td>{{ $task->task_state }}</td>
                                <td>{{ $task->task_job_type }}</td>
                                <td>abc</td>
                                <td>{{ $task->assignee_fname }}</td>
                                <td>{{ $task->created_by_fname }}</td>
                                <td>{{ $task->start_date }}</td>
                                <td>{{ $task->due_date }}</td>
                                <td>{{ $task->effort }}</td>
                                <td>{{ $task->task_title }}</td>
                                <td>
                                    <div class="dropdown">
                                        <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                            <i class="dw dw-more"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                            <a class="dropdown-item" href="#"><i class="dw dw-eye"></i> View</a>
                                            <a class="dropdown-item" href="#"><i class="dw dw-edit2"></i> Edit</a>
                                            <a class="dropdown-item" href="#"><i class="dw dw-delete-3"></i> Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                            <tfoot class="mt-4">
                            <tr>
                                <th class="datatable-nosort"></th>
                                <th>Project</th>
                                <th>State</th>
                                <th>Job type</th>
                                <th></th>
                                <th>Assignee</th>
                                <th>Registered User</th>
                                <th>Registered Date</th>
                                <th>Due Date</th>
                                <th>Effort</th>
                                <th></th>
                                <th class="datatable-nosort"></th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
            {{-- End Table data --}}
            <div class="footer-wrap pd-20 mb-20 card-box">
                DeskApp
            </div>
            <div id="data-table"></div>
        </div>
    </div>
@endsection

@section('script')
    <x-script-common />
    <script src="{{ asset('js/plugins/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script src="https://cdn.datatables.net/datetime/1.0.2/js/dataTables.dateTime.min.js"></script>
    <script src="{{asset('js/vendors/scripts/datatable-setting.js')}}"></script>
@endsection
