@extends('layouts.common')
@section('title','Project Monitoring')
@section('style')
    <x-style-common/>
@endsection

@section('pre-loader')
    <x-pre-loader/>
@endsection

@section('main-container')
    <div class="main-container">
        <div class="pd-ltr-20">
            <div class="row">
                <div class="col-xl-4 mb-30">
                    <div class="card-box">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">#ID</th>
                                <th scope="col">Full name</th>
                                <th scope="col">OP</th>
                                <th scope="col">PG</th>
                                <th scope="col">FN</th>
                                <th scope="col">OT</th>
                                <th scope="col">BD</th>
                            </tr>
                            </thead>
                            <tbody>
{{--                            {{ dd($user_data) }}--}}
                            @foreach($user_data as $u)
                                <tr>
                                    <td> {{ $u['emp_id'] }}</td>
                                    <td>{{ $u['full_name'] }}</td>
                                    <td>{{ $u['open_tickets'] }}</td>
                                    <td>{{ $u['processing_tickets'] }}</td>
                                    <td>{{ $u['finished_tickets'] }}</td>
                                    {{--                                <td>Otto</td>--}}
                                    {{--                                <td>@mdo</td>--}}
                                    {{--                                <td><span class="badge badge-primary">Primary</span></td>--}}
                                    <td>{{ $u['on_time'] }}</td>
                                    <td>{{ $u['breached_dl'] }}</td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-xl-8 mb-30 ">
                    <div class="row mb-30">
                        <div class="col-md-2">
                            <div class="profile-photo bg-white">
                                <img src="{{ Avatar::create(session()->get('account.name'))->toBase64() }}" />
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="card-box h-100">
                                CHART
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="card-box w-100">
                            <table class="table table-striped">

                                <thead>
                                <tr>
                                    <th scope="col">#</th>
{{--                                    <th scope="col">Job</th>--}}
                                    <th scope="col">Title</th>
                                    <th scope="col">Progress</th>
                                    <th scope="col">Start Date</th>
                                    <th scope="col">End Date</th>
{{--                                    <th scope="col">Effort</th>--}}
                                    <th scope="col">Days</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($tasks as $t)
                                    <tr>
                                        <td>{{ $t->task_id }}</td>
{{--                                        <td>{{ $t->task_job_type }}</td>--}}
                                        <td>{{
                                            strlen($t->task_title) > 30 ?
                                    substr($t->task_title, 0, 30) . " ..." : $t->task_title
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
            <x-footer />
        </div>
    </div>
@endsection

@section('script')
    <x-script-common/>
    <script src="{{ \ArielMejiaDev\LarapexCharts\LarapexChart::cdn() }}"></script>
{{--    {{ $ticketChart->script() }}--}}
{{--    {{ $effortChart->script() }}--}}

@endsection
