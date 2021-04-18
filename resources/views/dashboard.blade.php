@extends('layouts.common')
@section('title','Dash Board')
@section('style')
    <x-style-common/>
@endsection

@section('pre-loader')
    <x-pre-loader/>
@endsection

@section('main-container')
    <div class="main-container">
        <div class="pd-ltr-20">
            @if($breached_tasks != null)
                <div class="mb-30 card-box">
                    <h2 class="h4 pl-10 pt-10 pb-10 bg-red-700 m-0 text-white text-center rounded">BREACHED DEADLINE TASKS</h2>
                    <div class="overflow-auto pl-0 pr-0" style="max-height: 300px">
                        <div class="tv-task-col pt-2 pb-3">
                            @foreach($breached_tasks as $bt)
                                <div class="card-box p-2 m-2 h-task-item">
                                    <a href="{{ route('task_detail', $bt->task_id) }}" target="_blank">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="d-flex justify-content-start">
                                                <span class="bg-warning pt-1 pb-1 pl-3 pr-3 rounded">Task id: {{ $bt->task_id }}</span>
                                                <span class="bg-info ml-3 pt-1 pb-1 pl-3 pr-3 text-white rounded">{{ $bt->project_name }}</span>
                                                <h4 class="h5 pl-3 mb-0 d-flex align-items-center">{{ $bt->task_title }}</h4>
                                            </div>
                                            <div>
                                                <span class="bg-success pt-1 pb-1 pl-3 pr-3 rounded text-white">{{ $bt->full_name }}</span>
                                                <span class="text-dark pl-3"> <i class="icon-copy dw dw-calendar-6"></i>{{ $bt->due_date }}</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif
            <div class="row">
                <div class="col-xl-4 mb-30">
                    <div class="row">
                        <div class="col-11 mb-30 ml-auto mr-auto d-flex justify-content-between pd-0">
                            <div class="card-box col-xl-5 height-100-p widget-style1">
                                <div class="d-flex flex-wrap align-items-center">
                                    <div class="progress-data">

                                        <div id="chart2">
                                            <h4>{{ round($avgScore[0]->average_score, 2) }}</h4>
                                        </div>
                                    </div>
                                    <div class="widget-data">
                                        <div class="weight-600 font-14">SCORE</div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-box col-xl-5 height-100-p widget-style1">
                                <div class="d-flex flex-wrap align-items-center">
                                    <div class="progress-data">
                                        <div id="chart2">
                                            <h4>{{ $totalEffort[0]->effort }}</h4>
                                        </div>
                                    </div>
                                    <div class="widget-data">
                                        <div class="weight-600 font-14">EFFORT</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-11 bg-white card-box mb-30 ml-auto mr-auto">
                            <h4 class="h4 text-blue pt-10">EFFORT</h4>
                            <div id="chart5">
                                {!! $effortChart->container() !!}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-11 bg-white card-box mb-30 ml-auto mr-auto">
                            <h4 class="h4 text-blue pt-10">TASK</h4>
                            <div id="chart55">
                                {!! $ticketChart->container() !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8 mb-30 ">
                    <div class="row justify-content-between pl-2 pr-2">
                        <div class="col-xl-4 mb-4 mb-md-0">
                            <div class="card-box overflow-auto pl-0 pr-0">
                                <h2 class="h4 pl-10 pt-10 pb-10 bg-blue-200 m-0">TO DO</h2>
                                <div class="overflow-auto tv-task-col pt-2 pb-3">
                                    @foreach($open_tasks as $op)
                                        <div class="card-box p-2 m-2 h-task-item">
                                            <a href="{{ route('task_detail', $op->task_id) }}" target="_blank">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <span class="bg-warning pt-1 pb-1 pl-3 pr-3 rounded">Task id: {{ $op->task_id }}</span>
                                                    <span class="text-dark"> <i class="icon-copy dw dw-calendar-6"></i> {{ $op->due_date }}</span>
                                                </div>
                                                <h4 class="h5">{{ $op->task_title }}</h4>
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 mb-4 mb-md-0">
                            <div class="card-box overflow-auto pl-0 pr-0">
                                <h2 class="h4 pl-10 pt-10 pb-10 bg-red-300 m-0">PROCESS</h2>
                                <div class="overflow-auto tv-task-col pt-2 pb-3">
                                    @foreach($processing_tasks as $pt)
                                        <div class="card-box p-2 m-2 h-task-item">
                                            <a href="{{ route('task_detail', $pt->task_id) }}" target="_blank">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <span class="bg-warning pt-1 pb-1 pl-3 pr-3 rounded">Task id: {{ $pt->task_id }}</span>
                                                    <span class="text-dark"> <i class="icon-copy dw dw-calendar-6"></i>{{ $pt->due_date }}</span>
                                                </div>
                                                <h4 class="h5">{{ $pt->task_title }}</h4>
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 mb-5 mb-md-0">
                            <div class="card-box overflow-auto pl-0 pr-0">
                                <h2 class="h4 pl-10 pt-10 pb-10 bg-green-300 m-0">DONE</h2>
                                <div class="overflow-auto tv-task-col pt-2 pb-3">
                                    @foreach($finished_tasks as $ft)
                                        <div class="card-box p-2 m-2 h-task-item">
                                            <a href="{{ route('task_detail', $ft->task_id) }}" target="_blank">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <span class="bg-warning pt-1 pb-1 pl-3 pr-3 rounded">Task id: {{ $ft->task_id }} </span>
                                                    <span class="text-dark"> <i class="icon-copy dw dw-calendar-6"></i> {{ $ft->finish_date }}</span>
                                                </div>
                                                <h4 class="h5">{{ $ft->task_title }}</h4>
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
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
    <script src="{{ \ArielMejiaDev\LarapexCharts\LarapexChart::cdn() }}"></script>
    {{ $ticketChart->script() }}
    {{ $effortChart->script() }}

@endsection
