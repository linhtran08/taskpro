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
                <form action="{{ url('tasks') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-xl-2">
                            <div class="form-group">
                                <label >Job Type</label>
                                <select name="task_job_type_id" class="custom-select col-12">
                                    @foreach($job_types ?? '' as $jb_tp)
                                        <option {{ $jb_tp->task_job_type_id == $tasks[0]->task_job_type_id ? 'selected=selected' : '' }} value="{{ $jb_tp->task_job_type_id }}"> {{ $jb_tp->desc }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="">Project</label>
                                <select name="project_id" class="custom-select col-12">
                                    @foreach($projects as $pj)
                                        <option
                                            {{ $pj->project_id  == $tasks[0]->project_id ? 'selected=selected' : '' }}
                                            value="{{ $pj->project_id }}">{{$pj->project_name}}
                                        </option>
                                    @endforeach
                                </select>
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
                                <label for="">Assignee</label>
                                <select id="assginee_id" name="assignee_id" class="custom-select2" style="width: 100%">
                                    @foreach($assignees as $as)
                                        <option
                                                value="{{ $as->emp_id }}">{{ $as->full_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Due Date</label>
                                <input class="form-control date-picker" placeholder="{{ $tasks[0]->due_date }}" type="text" name="due_date">
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
                                <input class="form-control" name="effort" type="text" value="{{ $tasks[0]->effort }}">
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
                                <input class="form-control" name="task_title" type="text" value="{{ $tasks[0]->task_title }}">
                                @error('task_title')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Description</label>
                                <textarea name="task_detail" class="textarea_editor form-control border-radius-0">{{ $tasks[0]->task_detail }}</textarea>
                                @error('task_detail')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer border-0">
                        <a href="{{ route('dashboard') }}" class="btn btn-secondary" data-dismiss="modal">Back</a>
                        <button type="submit" class="btn btn-info">Save</button>
                    </div>
                </form>
            </div>
            <div class="card-box mb-20">
                <div class="chat-detail">
                    <div class="chat-profile-header clearfix">
                        <div class="left">
                            <div class="clearfix">
                                <div class="chat-profile-photo">
                                    <img src="vendors/images/profile-photo.jpg" alt="">
                                </div>
                                <div class="chat-profile-name">
                                    <h3>{{ session()->get('account.name') }}</h3>
                                    <span>Assigned</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="chat-box">
                        <div class="chat-desc customscroll">
                            <ul>
                                <li class="clearfix admin_chat">
                                    <div class="text-right mb-2">
                                        <span class="badge-info p-1">{{ session()->get('account.name') }}</span>
                                    </div>
                                    <div class="chat-body clearfix mr-0">
                                        <p>Maybe you already have additional info?</p>
                                        <div class="chat_time">09:40PM</div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="chat-footer">
                            <div class="file-upload"><a href="#"><i class="fa fa-paperclip"></i></a></div>
                            <div class="chat_text_area">
                                <textarea placeholder="Type your message…"></textarea>
                            </div>
                            <div class="chat_send">
                                <button class="btn btn-link" type="submit"><i class="icon-copy ion-paper-airplane"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <x-footer />
        </div>
    </div>
@endsection

@section('script')
    <x-script-common/>
    <script>
        $('#assginee_id').val(<?php echo session()->get('account.emp_id'); ?>).trigger("change");
    </script>
@endsection