@extends('layouts.common')
@section('title','Dash Board')
@section('style')
    <x-style-common />
@endsection

@section('pre-loader')
    <x-pre-loader />
@endsection

@section('main-container')
    <div class="main-container">
        <div class="pd-ltr-20">
            <div class="row">

            </div>
            <div class="row">
                <div class="col-xl-4 mb-30">
                    <div class="row">
                        <div class="col-xl-6 mb-30">
                            <div class="card-box height-100-p widget-style1">
                                <div class="d-flex flex-wrap align-items-center">
                                    <div class="progress-data">
                                        <div id="chart"></div>
                                    </div>
                                    <div class="widget-data">
                                        <div class="weight-600 font-14">EFFORT</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 mb-30">
                            <div class="card-box height-100-p widget-style1">
                                <div class="d-flex flex-wrap align-items-center">
                                    <div class="progress-data">
                                        <div id="chart2"></div>
                                    </div>
                                    <div class="widget-data">
                                        <div class="weight-600 font-14">TASK</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-11 bg-white card-box mb-30 ml-auto mr-auto">
                            <h4 class="h4 text-blue pt-10">EFFORT</h4>
                            <div id="chart5"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-11 bg-white card-box mb-30 ml-auto mr-auto">
                            <h4 class="h4 text-blue pt-10">TASK</h4>
                            <div id="chart55"></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8 mb-30 ">
                    <div class="row justify-content-between pl-2 pr-2">
                        <div class="col-xl-4 mb-4 mb-md-0">
                            <div class="card-box overflow-auto pl-0 pr-0">
                                <h2 class="h4 pl-10 pt-10 pb-10 bg-light-green m-0" >TO DO</h2>
                                <div class="overflow-auto tv-task-col pt-2 pb-3">
                                    <div class="card-box p-2 m-2 h-task-item" >
                                        <a href="">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <span class="bg-warning pt-1 pb-1 pl-3 pr-3 rounded"></span>
                                                <span class="text-dark"> <i class="icon-copy dw dw-calendar-6"></i> 2021</span>
                                            </div>
                                            <h4 class="h5">Task [] Change size at btn</h4>
                                        </a>
                                    </div>
                                    <div class="card-box p-2 m-2 h-task-item" >
                                        <a href="">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <span class="bg-warning pt-1 pb-1 pl-3 pr-3 rounded"></span>
                                                <span class="text-dark"> <i class="icon-copy dw dw-calendar-6"></i> 2021</span>
                                            </div>
                                            <h4 class="h5">Task [] Change size at btn</h4>
                                        </a>
                                    </div>
                                    <div class="card-box p-2 m-2 h-task-item" >
                                        <a href="">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <span class="bg-warning pt-1 pb-1 pl-3 pr-3 rounded"></span>
                                                <span class="text-dark"> <i class="icon-copy dw dw-calendar-6"></i> 2021</span>
                                            </div>
                                            <h4 class="h5">Task [] Change size at btn</h4>
                                        </a>
                                    </div>
                                    <div class="card-box p-2 m-2 h-task-item" >
                                        <a href="">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <span class="bg-warning pt-1 pb-1 pl-3 pr-3 rounded"></span>
                                                <span class="text-dark"> <i class="icon-copy dw dw-calendar-6"></i> 2021</span>
                                            </div>
                                            <h4 class="h5">Task [] Change size at btn</h4>
                                        </a>
                                    </div>
                                    <div class="card-box p-2 m-2 h-task-item" >
                                        <a href="">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <span class="bg-warning pt-1 pb-1 pl-3 pr-3 rounded"></span>
                                                <span class="text-dark"> <i class="icon-copy dw dw-calendar-6"></i> 2021</span>
                                            </div>
                                            <h4 class="h5">Task [] Change size at btn</h4>
                                        </a>
                                    </div>
                                    <div class="card-box p-2 m-2 h-task-item" >
                                        <a href="">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <span class="bg-warning pt-1 pb-1 pl-3 pr-3 rounded"></span>
                                                <span class="text-dark"> <i class="icon-copy dw dw-calendar-6"></i> 2021</span>
                                            </div>
                                            <h4 class="h5">Task [] Change size at btn</h4>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 mb-4 mb-md-0">
                            <div class="card-box overflow-auto pl-0 pr-0">
                                <h2 class="h4 pl-10 pt-10 pb-10 bg-light-green m-0">PROCESS</h2>
                                <div class="overflow-auto tv-task-col pt-2 pb-3">
                                    <div class="card-box p-2 m-2 h-task-item" >
                                        <a href="">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <span class="bg-warning pt-1 pb-1 pl-3 pr-3 rounded"></span>
                                                <span class="text-dark"> <i class="icon-copy dw dw-calendar-6"></i> 2021</span>
                                            </div>
                                            <h4 class="h5">Task [] Change size at btn</h4>
                                        </a>
                                    </div>
                                    <div class="card-box p-2 m-2 h-task-item" >
                                        <a href="">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <span class="bg-warning pt-1 pb-1 pl-3 pr-3 rounded"></span>
                                                <span class="text-dark"> <i class="icon-copy dw dw-calendar-6"></i> 2021</span>
                                            </div>
                                            <h4 class="h5">Task [] Change size at btn</h4>
                                        </a>
                                    </div>
                                    <div class="card-box p-2 m-2 h-task-item" >
                                        <a href="">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <span class="bg-warning pt-1 pb-1 pl-3 pr-3 rounded"></span>
                                                <span class="text-dark"> <i class="icon-copy dw dw-calendar-6"></i> 2021</span>
                                            </div>
                                            <h4 class="h5">Task [] Change size at btn</h4>
                                        </a>
                                    </div>
                                    <div class="card-box p-2 m-2 h-task-item" >
                                        <a href="">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <span class="bg-warning pt-1 pb-1 pl-3 pr-3 rounded"></span>
                                                <span class="text-dark"> <i class="icon-copy dw dw-calendar-6"></i> 2021</span>
                                            </div>
                                            <h4 class="h5">Task [] Change size at btn</h4>
                                        </a>
                                    </div>
                                    <div class="card-box p-2 m-2 h-task-item" >
                                        <a href="">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <span class="bg-warning pt-1 pb-1 pl-3 pr-3 rounded"></span>
                                                <span class="text-dark"> <i class="icon-copy dw dw-calendar-6"></i> 2021</span>
                                            </div>
                                            <h4 class="h5">Task [] Change size at btn</h4>
                                        </a>
                                    </div>
                                    <div class="card-box p-2 m-2 h-task-item" >
                                        <a href="">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <span class="bg-warning pt-1 pb-1 pl-3 pr-3 rounded"></span>
                                                <span class="text-dark"> <i class="icon-copy dw dw-calendar-6"></i> 2021</span>
                                            </div>
                                            <h4 class="h5">Task [] Change size at btn</h4>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 mb-5 mb-md-0">
                            <div class="card-box overflow-auto pl-0 pr-0">
                                <h2 class="h4 pl-10 pt-10 pb-10 bg-light-green m-0">DONE</h2>
                                <div class="overflow-auto tv-task-col pt-2 pb-3">
                                    <div class="card-box p-2 m-2 h-task-item" >
                                        <a href="">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <span class="bg-warning pt-1 pb-1 pl-3 pr-3 rounded"></span>
                                                <span class="text-dark"> <i class="icon-copy dw dw-calendar-6"></i> 2021</span>
                                            </div>
                                            <h4 class="h5">Task [] Change size at btn</h4>
                                        </a>
                                    </div>
                                    <div class="card-box p-2 m-2 h-task-item" >
                                        <a href="">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <span class="bg-warning pt-1 pb-1 pl-3 pr-3 rounded"></span>
                                                <span class="text-dark"> <i class="icon-copy dw dw-calendar-6"></i> 2021</span>
                                            </div>
                                            <h4 class="h5">Task [] Change size at btn</h4>
                                        </a>
                                    </div>
                                    <div class="card-box p-2 m-2 h-task-item" >
                                        <a href="">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <span class="bg-warning pt-1 pb-1 pl-3 pr-3 rounded"></span>
                                                <span class="text-dark"> <i class="icon-copy dw dw-calendar-6"></i> 2021</span>
                                            </div>
                                            <h4 class="h5">Task [] Change size at btn</h4>
                                        </a>
                                    </div>
                                    <div class="card-box p-2 m-2 h-task-item" >
                                        <a href="">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <span class="bg-warning pt-1 pb-1 pl-3 pr-3 rounded"></span>
                                                <span class="text-dark"> <i class="icon-copy dw dw-calendar-6"></i> 2021</span>
                                            </div>
                                            <h4 class="h5">Task [] Change size at btn</h4>
                                        </a>
                                    </div>
                                    <div class="card-box p-2 m-2 h-task-item" >
                                        <a href="">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <span class="bg-warning pt-1 pb-1 pl-3 pr-3 rounded"></span>
                                                <span class="text-dark"> <i class="icon-copy dw dw-calendar-6"></i> 2021</span>
                                            </div>
                                            <h4 class="h5">Task [] Change size at btn</h4>
                                        </a>
                                    </div>
                                    <div class="card-box p-2 m-2 h-task-item" >
                                        <a href="">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <span class="bg-warning pt-1 pb-1 pl-3 pr-3 rounded"></span>
                                                <span class="text-dark"> <i class="icon-copy dw dw-calendar-6"></i> 2021</span>
                                            </div>
                                            <h4 class="h5">Task [] Change size at btn</h4>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-wrap pd-20 mb-20 card-box">
                DeskApp
            </div>
        </div>
    </div>
@endsection

@section('script')
    <x-script-common />
    <script src="{{ asset('js/plugins/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('js/vendors/scripts/dashboard.js') }}"></script>
@endsection
