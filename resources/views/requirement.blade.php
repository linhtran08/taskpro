@extends('layouts.common')
@section('title','Management')
@section('style')
    <x-style-common />
    <link rel="stylesheet" type="text/css" href="{{ asset('js/plugins/datatables/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('js/plugins/datatables/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('js/plugins/datatables.net-datetime/dist/dataTables.dateTime.css') }}">
@endsection

@section('pre-loader')
    <x-pre-loader />
@endsection

@section('main-container')
    <a href="#" class="btn-block position-fixed rounded-circle p-2 tv-btn-create" data-toggle="modal" data-target="#Medium-modal" type="button">
        <i class="icon-copy fi-plus"></i>
    </a>
    <div class="modal fade z-99999" id="Medium-modal" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">
                <div class="pd-20 card-box">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <div class="tab pt-20">
                        <ul class="nav nav-tabs customtab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#home2" role="tab" aria-selected="true">Create Task</a>
                            </li>
                            @if(session('account.role') == 2)
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#profile2" role="tab" aria-selected="false">Create Project</a>
                                </li>
                            @endif
                        </ul>
                        <div class="tab-content modal-body mt-15">
                            <div class="tab-pane fade show active" id="home2" role="tabpanel">
                                <form action="{{ url('tasks') }}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-xl-2">
                                            <div class="form-group">
                                                <label >Job Type</label>
                                                <select name="task_job_type_id" class="custom-select col-12">
                                                    <option selected="">Choose...</option>
                                                    @foreach($job_types ?? '' as $jb_tp)
                                                        <option value="{{ $jb_tp->task_job_type_id }}"> {{ $jb_tp->desc }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="">Project</label>
                                                <select name="project_id" class="custom-select col-12">
                                                    <option selected="">Choose...</option>
                                                    @foreach($projects as $pj)
                                                        <option value="{{ $pj->project_id }}">{{$pj->project_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="">Priority</label>
                                                <select name="priority_id" class="custom-select col-12">
                                                    <option selected="">Choose...</option>
                                                    @foreach($priorities as $p)
                                                        <option value="{{ $p->priority_id }}">{{ $p->desc }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="">Assignee</label>
                                                <select name="assignee_id" class="custom-select">
                                                    <option selected="">Choose...</option>
                                                    @foreach($assignees as $as)
                                                        <option value="{{ $as->emp_id }}">{{ $as->full_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>Due Date</label>
                                                <input class="form-control date-picker" placeholder="Select Date" type="text" name="due_date" autocomplete="off">
                                                @error('due_date')
                                                <div class="text-danger">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="">Effort</label>
                                                <input class="form-control" name="effort" type="text" placeholder="Ex: 200">
                                                @error('effort')
                                                <div class="text-danger">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="html-editor pd-20 w-100">
                                            <div class="form-group">
                                                <label for="">Title</label>
                                                <input class="form-control" name="task_title" type="text" placeholder="Task title">
                                                @error('task_title')
                                                <div class="text-danger">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="">Description</label>
                                                <textarea name="task_detail" class="textarea_editor form-control border-radius-0" placeholder="Enter task description ..."></textarea>
                                                @error('task_detail')
                                                <div class="text-danger">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer border-0">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-info">Create</button>
                                    </div>
                                </form>
                            </div>
                            @if(session('account.role') == 2)
                                <div class="tab-pane fade h-100" id="profile2" role="tabpanel">
                                    <form action="{{url('project')}}" method="post">
                                        @csrf
                                        <div class="row">
                                            <div class="html-editor pd-20 w-100">
                                                <div class="form-group">
                                                    <label for="">Title</label>
                                                    <input class="form-control" name="project_title" type="text" placeholder="project title">
                                                    @error('task_title')
                                                    <div class="text-danger">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer border-0">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-info">Create</button>
                                        </div>
                                    </form>
                                </div>
                            @endif
                        </div>
                    </div>
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
            {{-- Table data --}}
            <div class="pd-5">
                <div class="card-box mb-30">
                    <div class="pd-10">
                        <div class="row pd-20">
                            <div class="form-group mr-3">
                                <input type="text" class="form-control"  id="min" name="min" placeholder="Registered Date">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control"   id="max" name="max" placeholder="To">
                            </div>
                        </div>
                        <table class="data-table display">
                            <thead>
                            <tr>
                                <th id="removeIcon" class="datatable-nosort w-4">#</th>
                                <th>Project</th>
                                <th>State</th>
                                <th>Job type</th>
                                <th>Phase</th>
                                <th>Assignee</th>
                                <th>Registered User</th>
                                <th>Registered Date</th>
                                <th>Due Date</th>
                                <th>Effort</th>
                                <th class="w-20">Title</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($tasks as $task)
                                <tr class="tv-task-row" data-task="{{$task->task_id}}">
                                    <td class="pl-1">{{ $task->task_id }}</td>
                                    <td>{{ $task->project_name }}</td>
                                    <td >{{ $task->task_state }}</td>
                                    <td>{{ $task->task_job_type }}</td>
                                    <td>{{ $task->phase }}</td>
                                    <td>{{ $task->assignee_fname }}</td>
                                    <td>{{ $task->created_by_fname }}</td>
                                    <td>{{ substr($task->created_at,0,10) }}</td>
                                    <td>{{ $task->due_date }}</td>
                                    <td>{{ $task->effort }}</td>
                                    <td>{{ $task->task_title }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot class="border-top">
                            <tr>
                                <th class="datatable-nosort"></th>
                                <th>Project</th>
                                <th>State</th>
                                <th>Job type</th>
                                <th></th>
                                <th>Assignee</th>
                                <th>Registered User</th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
            {{-- End Table data --}}
            <x-footer />
        </div>
    </div>
@endsection

@section('script')
    <x-script-common />
    <script src="{{ asset('js/plugins/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('js/plugins/moment/moment.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables.net-datetime/dist/dataTables.dateTime.js') }}"></script>
    <script src="{{asset('js/vendors/scripts/datatable-setting.js')}}"></script>
    <script>
        let taskType = {!! json_encode($job_types->toArray()) !!};
        let taskState = {!! json_encode($task_state->toArray()) !!};
        let project = {!! json_encode($projects->toArray()) !!};
        let assignee = {!! json_encode($assignees->toArray()) !!};
        function replace(array,Class,atr){
            $(Class).children().remove();
            $(Class).append('<option value="">Show All</option>');
            array.map((item)=>{
                if(item[atr] !== ''){
                    $(Class).append('<option value="'+item[atr]+'">'+item[atr]+'</option>')
                }
            });
        }
        $(document).ready(function (){

            $('#removeIcon').removeClass('sorting_asc');

            $('.tv-task-row').on('click',function (event){
                window.location.href = '/tasks/'+$(this).data('task');
            });

            replace(taskType,'.sl3','desc');
            replace(taskState,'.sl2','desc');
            replace(project,'.sl1','project_name');
            replace(assignee,'.sl5','full_name');

        });
    </script>
    <script type="text/javascript">
        @if (count($errors) > 0)
        $('#Medium-modal').modal('show');
        @endif
    </script>
@endsection
