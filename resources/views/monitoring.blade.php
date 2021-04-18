@extends('layouts.common')
@section('title','Project Monitoring')
@section('style')
    <x-style-common/>
    <link rel="stylesheet" type="text/css"
          href="{{ asset('js/plugins/datatables/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css"
          href="{{ asset('js/plugins/datatables/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css"
          href="{{ asset('js/plugins/datatables.net-datetime/dist/dataTables.dateTime.css') }}">
    <style>
        .dataTables_wrapper .row:first-child {
            display: none;
        }
    </style>
@endsection

@section('pre-loader')
    <x-pre-loader/>
@endsection

@section('main-container')
    <div class="main-container">
        <div class="pd-ltr-20">

            <div class="row">
                <div class="col-md-5 mb-30">
                    <div class="card-box p-2 h-100">
                        <div class="d-flex align-items-center">
                            <h2 class="pl-2 text-light-orange">List Staff</h2>
                            <label class="d-block ml-auto mb-0" for="">
                                <input id="table_search" class="form-control my-3" type="text" placeholder="Search">
                            </label>
                        </div>
                        <table id="table_data" class="table">
                            <thead>
                            <tr>
                                <th scope="col">#ID</th>
                                <th scope="col">Full name</th>
                                <th scope="col" data-toggle="tooltip" data-placement="top" title="OPEN">OP</th>
                                <th scope="col" data-toggle="tooltip" data-placement="top" title="PROCESSING">PG</th>
                                <th scope="col" data-toggle="tooltip" data-placement="top" title="FINISH">FN</th>
                                <th scope="col" data-toggle="tooltip" data-placement="top" title="ON TIME">OT</th>
                                <th scope="col" data-toggle="tooltip" data-placement="top" title="ON PROCESSING">BD</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($user_data as $u)
                                <tr data-task="{{$u['emp_id']}}">
                                    <td>{{ $u['emp_id'] }}</td>
                                    <td>{{ $u['full_name'] }}</td>
                                    <td>{{ $u['open_tickets'] }}</td>
                                    <td>{{ $u['processing_tickets'] }}</td>
                                    <td>{{ $u['finished_tickets'] }}</td>
                                    <td>{{ $u['on_time'] }}</td>
                                    <td>{{ $u['breached_dl'] }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-7 mb-30 ">
                    <div class="card-box mb-30 w-100 d-flex align-items-center p-3">
                        <div id="user_avt" class="col-md-2 text-center pt-10">

                            {!!  Avatar::create(session()->get('account.name'))->toSvg();!!}
                            <p id="uname" class="font-weight-bold mt-16">{{ session()->get('account.name') }}</p>
                        </div>
                        <div class="col-md-10">
                            <h2 class="text-light-orange">Your Statistics</h2>
                            <table class="table mt-30">
                                <tbody>
                                    <tr>
                                        <th class="w-25" scope="row">Most recent task:</th>
                                        <td id="latest_title">
                                            @if($my_stats['latest_task']['id'] != "Not available")
                                            Task ID [{{$my_stats['latest_task']['id']}}] - {{$my_stats['latest_task']['title']}}
                                                <a href="{{ route('task_detail', $my_stats['latest_task']['id']) }}"
                                                   class="btn btn-success ml-3"
                                                    target="_blank">Go to</a>
                                            @else
                                                No information available
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="w-25" scope="row">Total tasks:</th>
                                        <td id="total_tasks">{{$my_stats['total_tasks']}}</td>
                                    </tr>
                                    <tr>
                                        <th class="w-25" scope="row">On time rate:</th>
                                        <td id="on_time">{{$my_stats['on_time_rate']}}</td>
                                    </tr>
                                    <tr>
                                        <th class="w-25" scope="row">Breach rate:</th>
                                        <td id="breached">{{$my_stats['breached_rate']}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-box w-100">
                        <div class="table-responsive" style="max-height: 540px">
                            <table id="table_data2" class="table mb-0 ">

                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col" class="w-30">Title</th>
                                    <th scope="col">Progress</th>
                                    <th scope="col">Start Date</th>
                                    <th scope="col">End Date</th>
                                    <th scope="col">Days</th>
                                </tr>
                                </thead>
                                <tbody id="tbody">
                                @foreach($tasks as $t)
                                    <tr>
                                        <td>{{ $t->task_id }}</td>
                                        {{--                                        <td>{{ $t->task_job_type }}</td>--}}
                                        <td>{{
                                          $t->task_title
                                             }}
                                        </td>
                                        <td>{{ $t->phase }}</td>
                                        <td>{{ $t->start_date }}</td>
                                        <td>{{ $t->due_date }}</td>
                                        {{--                                        <td>{{ $t->effort }}</td>--}}
                                        <td>{{ $t->duration }}</td>
                                        {{--                                        <td><span class="badge badge-primary">Primary</span></td>--}}
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <x-footer/>
        </div>
    </div>
@endsection

@section('script')
    <x-script-common/>
    <script src="{{ asset('js/plugins/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('js/plugins/moment/moment.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables.net-datetime/dist/dataTables.dateTime.js') }}"></script>
    <script src="{{ \ArielMejiaDev\LarapexCharts\LarapexChart::cdn() }}"></script>
    {{--    {{ $ticketChart->script()$task->task_id }}--}}
    {{--    {{ $effortChart->script() }}--}}
    <script>`<td></td>`
        $(document).ready(function () {
            let tableData = $('#table_data').DataTable({
                autoWidth: false,
                columnDefs: [
                    {"width": "25%", "targets": 1},
                    {"width": "7%", "targets": 0},
                ],
                responsive: true,
                ordering: false,
                pageLength : 12,
                bLengthChange: false,
                language: {
                    paginate: {
                        next: '<i class="ion-chevron-right"></i>',
                        previous: '<i class="ion-chevron-left"></i>'
                    }
                },
            });

            $('#table_data tbody').on('click', 'tr', function () {
                $('#table_data tbody tr').removeClass('bg-gray-200');
                $(this).addClass('bg-gray-200');
                let user_ids = $(this).data('task');
                let urls = '/api/last/';
                axios({
                    method: 'get',
                    url: urls + user_ids,
                }).then(function (res) {
                    $('#tbody').html('');
                    let data = res.data;
                    data.tasks.forEach(item => $('#tbody').append("<tr>" +
                        "<td>" + item.task_id + "</td>" +
                        "<td>" + item.task_title + "</td>" +
                        "<td>" + item.phase + "</td>" +
                        "<td>" + item.start_date + "</td>" +
                        "<td>" + item.due_date + "</td>" +
                        "<td>" + item.duration + "</td>" +
                        "</tr>"));
                    let str = (data.user.full_name.toLocaleUpperCase()).match(/\b(\w)/g);
                    let avt = str.join('');
                    let randomColor = Math.floor(Math.random()*16777215).toString(16);
                    $('#user_avt svg text').html(avt);
                    $('#user_avt svg circle').attr('fill','#'+randomColor).attr('stroke','#'+randomColor);
                    $('#uname').html(data.user.full_name);
                    let my_stats = data.my_stats;
                    if(my_stats.latest_task.id !== 'Not available'){
                        $('#latest_title').html("Task["+my_stats.latest_task.id+"] - "+my_stats.latest_task.title+"" +
                        "<a href='/tasks/"+my_stats.latest_task.id+"' class='btn btn-success ml-3' target='_blank'>Go to</a>")
                    }else {
                        $('#latest_title').html('No information available');
                    }
                    $('#total_tasks').html(my_stats.total_tasks);
                    $('#on_time').html(my_stats.on_time_rate);
                    $('#breached').html(my_stats.breached_rate);
                }).catch(function (error) {
                    console.log(error);
                });
            })

            $('#table_search').on('keyup', function () {
                tableData.search($(this).val()).draw();
            })

        });
    </script>

@endsection
