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

                </div>
                <div class="col-xl-8 mb-30 ">
                    <div class="row justify-content-between pl-2 pr-2">

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
