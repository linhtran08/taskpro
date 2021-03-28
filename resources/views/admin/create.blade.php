@extends('layouts.common')
@section('title','Administrator')
@section('style')
    <x-style-common/>
    <link rel="stylesheet" href="{{ asset('js/plugins/jquery-steps/jquery.steps.css') }}">
@endsection

@section('pre-loader')
    <x-pre-loader/>
@endsection

@section('main-container')
    <div class="main-container">
        <!-- code start -->
        <div class="pd-ltr-20">
            <div class="card-box pd-10 mb-10"><h3 class="text-info">Create User </h3></div>
            <div class="card-box pd-10 mb-10">
                <div class="register-box bg-white box-shadow border-radius-10">
                    <div class="wizard-content">
                        <form action="{{ url('admin/create') }}" method="post" class="tab-wizard2 wizard-circle wizard">
                            @csrf
                            <h5>Basic Account Credentials</h5>
                            <section>
                                <div class="form-wrap max-width-600 mx-auto">
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Email Address*</label>
                                        <div class="col-sm-8">
                                            <input name="email" type="email" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Username*</label>
                                        <div class="col-sm-8">
                                            <input name="user_id" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Password*</label>
                                        <div class="col-sm-8">
                                            <input name="password" type="password" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Confirm Password*</label>
                                        <div class="col-sm-8">
                                            <input type="password" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Role</label>
                                        <div class="col-sm-8">
                                            <select class="custom-select" name="role">
                                                <option value="1">Admin</option>
                                                <option value="2">Manager</option>
                                                <option selected value="3">staff</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <!-- Step 2 -->
                            <h5>Personal Information</h5>
                            <section>
                                <div class="form-wrap max-width-600 mx-auto">
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">First Name</label>
                                        <div class="col-sm-8">
                                            <input name="first_name" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Last Name</label>
                                        <div class="col-sm-8">
                                            <input name="last_name" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row align-items-center">
                                        <label class="col-sm-4 col-form-label">Gender*</label>
                                        <div class="col-sm-8">
                                            <div class="custom-control custom-radio custom-control-inline pb-0">
                                                <input type="radio" value="M" id="male" name="sex" class="custom-control-input">
                                                <label class="custom-control-label" for="male">Male</label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline pb-0">
                                                <input type="radio" value="F" id="female" name="sex" class="custom-control-input">
                                                <label class="custom-control-label" for="female">Female</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Address</label>
                                        <div class="col-sm-8">
                                            <input name="address" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Birth Day</label>
                                        <div class="col-sm-8">
                                            <input type="text" id="bdo" name="birthday" class="form-control datepicker-here" data-date-format="yyyy/mm/dd">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Phone</label>
                                        <div class="col-sm-8">
                                            <input name="phone" type="text" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <!-- Step 3 -->
                            <h5>Overview Information</h5>
                            <section>
                                <div class="form-wrap max-width-600 mx-auto">
                                    <ul class="register-info">
                                        <li>
                                            <div class="row">
                                                <div class="col-sm-4 weight-600">Email Address</div>
                                                <div id="email" class="col-sm-8"></div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="row">
                                                <div class="col-sm-4 weight-600">Username</div>
                                                <div id="user_id" class="col-sm-8"></div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="row">
                                                <div class="col-sm-4 weight-600">First Name</div>
                                                <div id="first_name" class="col-sm-8"></div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="row">
                                                <div class="col-sm-4 weight-600">Last Name</div>
                                                <div id="last_name" class="col-sm-8"></div>
                                            </div>

                                        </li>
                                        <li>
                                            <div class="row">
                                                <div class="col-sm-4 weight-600">Phone</div>
                                                <div id="phone" class="col-sm-8"></div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="row">
                                                <div class="col-sm-4 weight-600">Role</div>
                                                <div id="role" class="col-sm-8"></div>
                                            </div>
                                        </li>
                                    </ul>
                                    <div class="custom-control custom-checkbox mt-4">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                                        <label class="custom-control-label" for="customCheck1">I have read and agreed to the terms of services and privacy policy</label>
                                    </div>
                                </div>
                            </section>
                        </form>
                    </div>
                </div>
            </div>
            <x-footer />
        </div>
    </div>

    <!-- Success modal -->
    @if(session('insertSuccess'))
    <button id="btn_success" class="btn-block d-none" data-toggle="modal" data-target="#success-modal" type="button"></button>
    <div class="modal fade" id="success-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body text-center font-18">
                    <h3 class="mb-20">Form Submitted!</h3>
                    <div class="mb-30 text-center"><img src="{{asset('images/success.png')}}" alt="Successes"></div>
                    {{ session('insertSuccess') }}
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Done</button>
                </div>
            </div>
        </div>
    </div>
    @endif

    <!-- Warning modal -->
    @if(session('insertErr'))
    <button id="btn_warning" class="btn-block d-none" data-toggle="modal" data-target="#warning-modal" type="button"></button>
    <div class="modal fade" id="warning-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content bg-warning">
                <div class="modal-body text-center">
                    <h3 class="mb-15"><i class="fa fa-exclamation-triangle"></i> Warning</h3>
                    <p>{{ session('insertErr') }}</p>
                    <button type="button" class="btn btn-dark" data-dismiss="modal">Ok</button>
                </div>
            </div>
        </div>
    </div>
    @endif

@endsection

@section('script')
    <x-script-common/>
    <script src="{{asset('js/plugins/jquery-steps/jquery.steps.js')}}"></script>
    <script src="{{asset('js/vendors/scripts/steps-setting.js')}}"></script>
    <script>

        function roleName (role){
            switch (role) {
                case '1':
                    return 'admin';
                case '2':
                    return 'Manager';
                case '3':
                    return 'Staff';
            }
        }

        $(document).ready(function (){

            let maxDate = new Date();
            maxDate.setDate(maxDate.getMonth() - 7645);
            let minDate = new Date();
            minDate.setDate(minDate.getMonth() - 14645);
            $('#bdo').datepicker({
                language: 'en',
                autoClose: 'true',
                maxDate: maxDate,
                minDate : minDate
            })

            setTimeout(function (){
                $('#btn_success').trigger('click');
                $('#btn_warning').trigger('click');
            },1000)

            $( "input[name='email']" )
                .change(function() {
                    var value = $( this ).val();
                    $('#email').html(value);
                });
            $( "input[name='user_id']" )
                .change(function() {
                    var value = $( this ).val();
                    $('#user_id').html(value);
                });

            $( "input[name='first_name']" )
                .change(function() {
                    var value = $( this ).val();
                    $('#first_name').html(value);
                });

            $( "input[name='last_name']" )
                .change(function() {
                    var value = $( this ).val();
                    $('#last_name').html(value);
                });

            $( "input[name='phone']" )
                .change(function() {
                    var value = $( this ).val();
                    $('#phone').html(value);
                });

            let role = $("select[name='role']").val();
            $('#role').html(roleName(role));
            $( "select[name='role']" )
                .change(function() {
                    var value = $( this ).val();
                    $('#role').html(roleName(value));
                });
        });
    </script>
@endsection
