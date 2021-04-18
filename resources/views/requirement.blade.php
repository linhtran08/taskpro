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
    @if(request()->route()->uri == 'create-task')
        <div class="main-container">
            <div class="pd-ltr-20">
                <div class="mb-30">
                    <div class="modal-content">
                        <div class="pd-20 card-box">
                            <div class="pt-20">
                                <h2 class="text-light-orange">Create Task</h2>
                                <hr>
                                <div class="modal-body mt-15">
                                    <div class="" >
                                        <form action="{{ url('tasks') }}" method="post" enctype="multipart/form-data">
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
                                                        <label for="" class="d-block">Assignee</label>
                                                        <select name="assignee_id" class="custom-select2 w-100">
                                                            <option selected="" value="">Choose...</option>
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
                                            <div class="row">
                                                <div class="form-group">
                                                    <label for="">File</label>
                                                    <input class="form-control" name="attachments[]" type="file" multiple>
                                                    @error('fileTest')
                                                    <div class="text-danger">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="modal-footer border-0">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-info">Create</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <x-footer />
            </div>
        </div>
    @elseif(request()->route()->uri == 'create-project')
        <div class="main-container">
            <div class="pd-ltr-20">
                <div class="mb-30">
                    <div class="modal-content">
                        <div class="pd-20 card-box">
                            <div class="pt-20">
                                <h2 class="text-light-orange">Create Project</h2>
                                <hr>
                                <div class="modal-body mt-15">
                                    <div class="" >
                                        <form action="{{url('project')}}" method="post">
                                            @csrf
                                            <div class="row">
                                                <div class="html-editor pd-20 w-100 col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Project name</label>
                                                        <input class="form-control" name="project_title" type="text">
                                                        @error('task_title')
                                                        <div class="text-danger">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="html-editor pd-20 w-100 col-md-3">
                                                    <div class="form-group">
                                                        <label>Start Date</label>
                                                        <input class="form-control date-picker" placeholder="Select Date" type="text" name="prj_start_date" autocomplete="off">
                                                        @error('prj_start_date')
                                                        <div class="text-danger">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="html-editor pd-20 w-100 col-md-3">
                                                    <div class="form-group">
                                                        <label>End Date</label>
                                                        <input class="form-control date-picker" placeholder="Select Date" type="text" name="prj_due_date" autocomplete="off">
                                                        @error('prj_due_date')
                                                        <div class="text-danger">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Description</label>
                                                <textarea name="project_detail" class="textarea_editor form-control border-radius-0" placeholder="Enter project description ..."></textarea>
                                                @error('project_detail')
                                                <div class="text-danger">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                            <div class="modal-footer border-0">
                                                <a href="/" class="btn btn-secondary" data-dismiss="modal">Back</a>
                                                <button type="submit" class="btn btn-info">Create</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <x-footer />
            </div>
        </div>
    @else
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
                                    <form action="{{ url('tasks') }}" method="post" enctype="multipart/form-data">
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
                                                        <option selected="" value="">Choose...</option>
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
                                        <div class="row">
                                            <div class="form-group">
                                                <label for="">File</label>
                                                <input class="form-control" name="attachments[]" type="file" multiple>
                                                @error('fileTest')
                                                <div class="text-danger">
                                                    {{ $message }}
                                                </div>
                                                @enderror
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
                                                <div class="html-editor pd-20 w-100 col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Project name</label>
                                                        <input class="form-control" name="project_title" type="text">
                                                        @error('task_title')
                                                        <div class="text-danger">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="html-editor pd-20 w-100 col-md-3">
                                                    <div class="form-group">
                                                        <label>Start Date</label>
                                                        <input class="form-control date-picker" placeholder="Select Date" type="text" name="prj_start_date" autocomplete="off">
                                                        @error('prj_start_date')
                                                        <div class="text-danger">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="html-editor pd-20 w-100 col-md-3">
                                                    <div class="form-group">
                                                        <label>End Date</label>
                                                        <input class="form-control date-picker" placeholder="Select Date" type="text" name="prj_due_date" autocomplete="off">
                                                        @error('prj_due_date')
                                                        <div class="text-danger">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Description</label>
                                                <textarea name="project_detail" class="textarea_editor form-control border-radius-0" placeholder="Enter project description ..."></textarea>
                                                @error('project_detail')
                                                <div class="text-danger">
                                                    {{ $message }}
                                                </div>
                                                @enderror
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
                <div class="pd-5 requirement-input">
                    <div class="card-box mb-30">
                        <div class="pd-10">
                            <div class="row pd-20 ">
                                <div class="col-md-4">
                                    <h2 class="text-light-orange">The Requirements</h2>
                                </div>
                                <div class="col-md-8 d-flex justify-content-end">
                                    <div class="form-group mr-3">
                                        <input type="text" class="form-control"  id="min" name="min" placeholder="Registered Date">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control"   id="max" name="max" placeholder="To">
                                    </div>
                                    <div class="from-group ml-4">
                                      <button id="reset-filter" class="btn form-control btn-light">Reset</button>
                                    </div>
                                    @if($flag_my_requirements == "Y")
                                        <div class="from-group ml-4">
                                            <a href="{{ url('requirement') }}" class="btn form-control btn-warning text-white">Show All Requirements</a>
                                        </div>
                                    @else
                                        <div class="from-group ml-4">
                                            <a href="{{ url('requirement2') }}" class="btn form-control btn-success text-white">Show My Requirements</a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <table class="data-table display w-100">
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
    @endif
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

            $('.data-table tbody').on('click','tr',function (){
                window.location.href = '/tasks/'+$(this).data('task');
            })

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
