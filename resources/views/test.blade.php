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

            <x-footer />
        </div>
    </div>
@endsection

@section('script')
    <x-script-common/>
@endsection
