@extends('layouts.common')
@section('title','Task Detail')
@section('style')
    <x-style-common/>
@endsection

@section('pre-loader')
    <x-pre-loader/>
@endsection

@section('main-container')
    <div class="main-container">
        <div class="pd-ltr-20">
            <div class="card-box pd-20 mb-20">
{{--            <form action="{{ url("tasksupdate/{$tasks[0]->task_id}") }}" method="post">--}}
                <form action="{{ route('task_update', $tasks[0]->task_id) }}" method="post" enctype="multipart/form-data">
                    <fieldset {{$tasks[0]->task_state_id == 5 | $tasks[0]->task_state_id == 4 ? 'disabled="disabled"' : ''}}>
                        @csrf
                        @if($is_breached == "Y")
                            <div class="row">
                                <div class="text text-danger text-center">
                                    <h2 class="text-danger text-center">WARNING: THIS TASK IS BEHIND DEADLINE</h2>
                                </div>
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Job Type</label>
                                    <input readonly class="form-control" type="text"
                                           value="{{ $tasks[0]->task_job_type }}">
                                    <select hidden name="task_job_type_id" class="custom-select col-12">
                                        @foreach($job_types ?? '' as $jb_tp)
                                            <option {{ $jb_tp->task_job_type_id == $tasks[0]->task_job_type_id ? 'selected=selected' : '' }}
                                                    value="{{ $jb_tp->task_job_type_id }}"> {{ $jb_tp->desc }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Project</label>
                                    <input readonly class="form-control" type="text"
                                           value="{{ $tasks[0]->project_name }}">
                                    <select hidden name="project_id" class="custom-select col-12">
                                        @foreach($projects as $pj)
                                            <option
                                                    {{ $pj->project_id  == $tasks[0]->project_id ? 'selected=selected' : '' }}
                                                    value="{{ $pj->project_id }}">{{$pj->project_name}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Start Date</label>
                                    <input disabled class="form-control date-picker"
                                           @if(!empty($tasks[0]->start_date))
                                           type="date"
                                           value="{{ $tasks[0]->start_date }}"
                                           @else
                                           type="text"
                                           value = "Not started"
                                            @endif
                                    >
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Finish Date</label>
                                    <input readonly class="form-control date-picker"
                                           @if(!empty($tasks[0]->finish_date))
                                           type="date"
                                           value="{{ $tasks[0]->finish_date }}"
                                           @else
                                           type="text"
                                           value = "Not finished yet"
                                            @endif
                                    >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
{{--                                    {{ dd($tasks[0]->task_state_id) }}--}}
                                    <label for="">State</label>
                                    <select name="task_state_id" class="custom-select col-12">
                                        @foreach($task_state as $ts)
                                            <option
                                                    {{ $ts->task_state_id  == $tasks[0]->task_state_id ? 'selected=selected' : '' }}
                                                    value="{{ $ts->task_state_id  }}">{{$ts->desc}}
                                            </option>
                                        @endforeach
                                    </select>
                                    <input hidden type="text" name="prev_state_id" value="{{ $tasks[0]->task_state_id }}">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="">Priority</label>
                                    <select name="priority_id" class="custom-select col-12">
                                        @foreach($priorities as $p)
                                            <option
                                                    {{ $p->desc  == $tasks[0]->priority ? 'selected=selected' : ''}}
                                                    value="{{ $p->priority_id }}">{{ $p->desc }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="">Phase</label>
                                    <select name="task_phase_id" class="custom-select col-12">
                                        @foreach($phases as $phase)
                                            <option
                                                    {{ $phase->desc  == $tasks[0]->phase ? 'selected=selected' : ''}}
                                                    value="{{ $phase->task_phase_id}}">{{ $phase->desc }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="">Assignee</label>
                                    <select id="assginee_id" name="assignee_id" class="custom-select col-12">
                                        @if(empty($tasks[0]->assignee_id))
                                            <option readonly selected="selected" value=""> - Empty -</option>
                                        @else
                                            <option value=""> - Empty -</option>
                                        @endif
                                        @foreach($assignees as $as)
                                            <option
                                                    {{ $as->emp_id == $tasks[0]->assignee_id ? 'selected=selected' : '' }}
                                                    value="{{ $as->emp_id }}">{{ $as->full_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Due Date</label>
{{--                                    {{ dd($tasks[0]->due_date) }}--}}
                                    <input {{ session()->get('account.role') != 2 ? 'disabled':'' }}  class="form-control date-picker"
                                           value="{{ $tasks[0]->due_date }}"
                                           type="date" name="due_date">
                                    <input hidden
                                           value="{{ $tasks[0]->due_date }}"
                                           type="date" name="prev_due_date">
                                    @error('due_date')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="form-group">
                                    <label for="">Effort</label>
                                    <input class="form-control" name="effort" type="text"
                                           value="{{ $tasks[0]->effort }}">
                                    @error('effort')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="form-group">
                                    <label for="">Score</label>
                                    <select {{ session()->get('account.role') != 2 ? 'disabled':'' }}  name="score" class="custom-select col-12">
                                        @if(empty($tasks[0]->satisfaction))
                                            <option readonly selected="selected" value="">--</option>
                                        @else
                                            <option value="">--</option>
                                        @endif
                                            <option {{ $tasks[0]->satisfaction == 1 ? 'selected=selected' : '' }} value="1" >1</option>
                                            <option {{ $tasks[0]->satisfaction == 2 ? 'selected=selected' : '' }} value="2" >2</option>
                                            <option {{ $tasks[0]->satisfaction == 3 ? 'selected=selected' : '' }} value="3" >3</option>
                                            <option {{ $tasks[0]->satisfaction == 4 ? 'selected=selected' : '' }} value="4" >4</option>
                                            <option {{ $tasks[0]->satisfaction == 5 ? 'selected=selected' : '' }} value="5" >5</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="html-editor pd-20 w-100">
                                <div class="form-group">
                                    <label for="">Title</label>
                                    <input class="form-control" name="task_title" type="text"
                                           value="{{ $tasks[0]->task_title }}">
                                    @error('task_title')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Description</label>
                                    <textarea name="task_detail"
                                              class="textarea_editor form-control border-radius-0">{{ $tasks[0]->task_detail }}</textarea>
                                    @error('task_detail')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
{{--                        <div class="row">--}}

{{--                        </div>--}}
{{--                        <div>--}}
{{--                            <h4>Attachments</h4>--}}
{{--                            @foreach($attachments as $attachment)--}}
{{--                                <a href="{{ route('download_file',$attachment->file_name ) }}"--}}
{{--                                >{{ substr(strstr($attachment->file_name, "."), 1)}}</a>--}}
{{--                                <a href="{{ route('delete_file', $attachment->id) }}"><span class="text-danger">Delete</span></a>--}}
{{--                                <label for="">Delete</label>--}}
{{--                                <br>--}}
{{--                            @endforeach--}}
{{--                        </div>--}}
                        <div class="modal-footer border-0">
                            <div class="form-group mr-auto">
                                <label for="">Attach more files</label>
                                <input class="form-control" name="attachments[]" type="file" multiple>
                                @error('attachments[]')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <a href="{{ url()->previous() }}" class="btn btn-secondary" data-dismiss="modal">Back</a>
                            <button type="submit" class="btn btn-info">Save</button>
                        </div>
                    </fieldset>
                </form>
                <div id="delete_form">
                    <form action="{{ route('delete_file') }}" method="post">
                        <fieldset {{$tasks[0]->task_state_id == 5 | $tasks[0]->task_state_id == 4 ? 'disabled="disabled"' : ''}}>
                            @csrf
                            <h4>Attachments</h4>
                            <div id="attachments_list" data-taskid="{{ $tasks[0]->task_id }}">
                            </div>
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </fieldset>
                    </form>
                </div>
            </div>
            <div class="card-box mb-20">
                <div class="chat-detail">
                    <div class="chat-profile-header clearfix">
                        <div class="left">
                            <div class="clearfix">
{{--                                <div class="chat-profile-photo">--}}
{{--                                    <img src="{{ Avatar::create(session()->get('account.name'))->toBase64() }}" />--}}
{{--                                </div>--}}
                                <div class="chat-profile-name">
{{--                                    <h3>{{ session()->get('account.name') }}</h3>--}}
                                    <h2>Discussion</h2>
{{--                                    <span>Assigned</span>--}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="chat-box">
                        <div class="chat-desc customscroll">
                            <ul>
                                @foreach($comments as $cm)
                                    @if(session()->get('account.emp_id') == $cm->created_by_id)
                                        <li class="clearfix admin_chat">
                                            <div class="text-right mb-2">
                                                <span class="badge-info p-1">{{ $cm->full_name }}</span>
                                            </div>
                                            <div class="chat-body clearfix mr-0">
                                                <p>{{ $cm->body }}</p>
                                                <div class="chat_time">{{ $cm->created_at }}</div>
                                            </div>
                                        </li>
                                    @else
                                        <li class="clearfix">
                                            <div class="text-left mb-2">
                                                <span class="badge-info p-1">{{ $cm->full_name }}</span>
                                            </div>
                                            <div class="chat-body clearfix ml-0">
                                                <p>{{ $cm->body }}</p>
                                                <div class="chat_time">{{ $cm->created_at }}</div>
                                            </div>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                        <form action="{{ url('comment') }}" method="post">
                            @csrf
                            <div class="chat-footer">
                                <input type="text" hidden name="comment_task_id" value="{{ $tasks[0]->task_id }}">
                                <div class="file-upload"><a href="#"><i class="fa fa-paperclip"></i></a></div>
                                <div class="chat_text_area">
                                    <textarea name="body" placeholder="Type your message…"></textarea>
                                </div>
                                <div class="chat_send">
                                    <button class="btn btn-link" type="submit"><i class="icon-copy ion-paper-airplane"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <x-footer/>
        </div>
    </div>
@endsection

@section('script')
    <x-script-common/>
    <script>
        $(document).ready(function (){

            const taskId = $('#attachments_list').data('taskid');
            function getAttachmentList(taskId){
                axios.get('/api/attachment/list/'+taskId)
                .then((response)=>{
                    let data = response.data;
                    if(data.length > 0){
                        data.forEach(item => $('#attachments_list').append(
                            "<input class='checkBoxClass' type='checkbox' name='deleted_files[]' value='"+item.id+"'>" +
                            "<a href='/get/"+item.file_name+"'> "+item.file_name.substring(item.file_name.indexOf('.') + 1)+"</a>" +
                            "<br>"
                        ));
                    }else {
                        $('#attachments_list').html('');
                    }
                })
                .catch((error)=>{
                    console.log(error);
                });
            }
            getAttachmentList(taskId);

            let deleteArr = [];
            $('#delete_form form').submit(function (event){
                event.preventDefault();
                $("input[name='deleted_files[]']:checked").each(function (){
                    deleteArr.push(parseInt($(this).val()));
                })
                if(deleteArr.length>0){
                    axios({
                        method: 'post',
                        data: deleteArr,
                        url: '/api/attachment',
                    }).then((response)=>{
                        $('#attachments_list').html('');
                        getAttachmentList(taskId);
                    }).catch(function (error){
                        console.log(error);
                    });
                }
            })
        })
        {{--$("form").on( "submit", function(e) {--}}
        {{--    var deleted_arr= [];--}}

        {{--    $.each($("input[class='checkBoxClass']:checked"), function(){--}}
        {{--        deleted_arr.push($(this).val());--}}
        {{--    });--}}
        {{--    //alert(deleted_arr);--}}
        {{--    // var myJsonString = JSON.stringify(deleted_arr);--}}
        {{--    // var json_del = { "deleted_files": myJsonString};--}}
        {{--    var join_selected_values = deleted_arr.join(",");--}}
        {{--    // data: 'deleted_files='+join_selected_values--}}
        {{--    //alert('deleted_files='+join_selected_values);--}}
        {{--    $.ajax({--}}
        {{--        type: "DELETE",--}}
        {{--        url: "{{ route('delete_file') }}",--}}
        {{--        data: { deleted_files:deleted_arr},--}}
        {{--        success: function () {--}}
        {{--            $("#delete_form").html("<div id='message'></div>");--}}
        {{--            $("#message")--}}
        {{--                .html("<h2>Contact Form Submitted!</h2>")--}}
        {{--                .append("<p>We will be in touch soon.</p>")--}}
        {{--                .hide()--}}
        {{--                .fadeIn(1500, function () {--}}
        {{--                    $("#message").append(--}}
        {{--                        "<img id='checkmark' src='images/check.png' />"--}}
        {{--                    );--}}
        {{--                });--}}
        {{--        },--}}
        {{--        error: function (data) {--}}
        {{--            alert(data.responseText);--}}
        {{--        }--}}
        {{--    });--}}

        {{--    e.preventDefault();--}}
        {{--});--}}
    </script>
@endsection
