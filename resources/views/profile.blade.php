@extends('layouts.common')
@section('title','Staff Profile')
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
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 mb-30">
                    <div class="pd-20 card-box height-100-p">
                        <div class="profile-photo text-center">
                            {!!  Avatar::create(session()->get('account.name'))->toSvg();!!}
                        </div>
                        <h5 class="text-center h5 mb-0">{{ $account->full_name }}</h5>
                        <div class="profile-info">
                            <h5 class="mb-20 h5 text-blue">Profile Information</h5>
                            <ul>
                                <li class="row">
                                    <span class="col-md-3">Sex:</span>
                                    {{ ($account->sex == 'M') ? 'Male' : 'Female' }}
                                </li>
                                <li class="row">
                                    <span class="col-md-3">BirthDay:</span>
                                    {{ $account->birthday }}
                                </li>
                                <li class="row">
                                    <span class="col-md-3">Role:</span>
                                    @switch($account->role)
                                        @case(1)
                                        Admin
                                        @break
                                        @case(2)
                                        Manager
                                        @break
                                        @case(3)
                                        Staff
                                        @break
                                    @endswitch
                                </li>
                                <li class="row">
                                    <span class="col-md-3">Status:</span>
                                    {{ ($account->active == 1) ? 'Active' : 'Deactivated'  }}
                                </li>
                            </ul>
                        </div>
                        <div class="profile-info">
                            <h5 class="mb-20 h5 text-blue">Contact Information</h5>
                            <ul>
                                <li>
                                    <span>Email Address:</span>
                                    {{ $account->email }}
                                </li>
                                <li>
                                    <span>Phone Number:</span>
                                    {{ $account->phone }}
                                </li>
                                <li>
                                    <span>Address:</span>
                                    {{ $account->address }}
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 mb-30">
                    <div class="card-box height-100-p overflow-hidden">
                        <div class="profile-tab height-100-p">
                            <!-- Setting Tab start -->
                            <div>
                                    <div class="profile-setting pt-4">
                                        <form action="{{ route('updatePost',$account->emp_id) }}" method="post">
                                            @csrf
                                            <h4 class="text-info h2 ml-2 pd-10">Edit Account</h4>
                                            <ul class="profile-edit-list row p-0">
                                                <li class="weight-500 col-md-6">
                                                    <div class="form-group">
                                                        <label for="first_name">First Name</label>
                                                        <input id="first_name" name="first_name" class="form-control form-control-lg" type="text" value="{{$account->first_name}}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="last_name">Last Name</label>
                                                        <input id="last_name" name="last_name" class="form-control form-control-lg" type="text" value="{{$account->last_name}}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="email">Email</label>
                                                        <input id="email" name="email" class="form-control form-control-lg" type="email" value="{{$account->email}}">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="datepicker1">Date of birth</label>
                                                        <input name="birthday"
                                                               class="form-control form-control-lg datepicker-here"
                                                               value = "{{$account->birthday}}"
                                                               type="date" data-date-format="yyyy-mm-dd">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Gender</label>
                                                        <div class="d-flex">
                                                            <div class="custom-control custom-radio mb-5 mr-20">
                                                                <input type="radio" id="customRadio4" name="sex"
                                                                       class="custom-control-input"
                                                                       value="M" {{ $account->sex == 'M' ? 'checked' : '' }}>
                                                                <label class="custom-control-label weight-400" for="customRadio4">Male</label>
                                                            </div>
                                                            <div class="custom-control custom-radio mb-5">
                                                                <input type="radio" id="customRadio5" name="sex"
                                                                       class="custom-control-input"
                                                                       value="F" {{ $account->sex == 'F' ? 'checked' : '' }}>
                                                                <label class="custom-control-label weight-400" for="customRadio5">Female</label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="address">Address</label>
                                                            <input id="address" name="address" class="form-control form-control-lg" type="text" value="{{$account->address}}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="phone">phone</label>
                                                            <input id="phone" name="phone" class="form-control form-control-lg" type="text" value="{{$account->phone}}">
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="weight-500 col-md-6">
                                                    <div class="form-group">
                                                        <label for="role">Role</label>
                                                        <select disabled id="role" class="custom-select" name="role">
                                                            <option {{ $account->role == 1 ? 'selected=selected' : '' }} value="1">Admin</option>
                                                            <option {{ $account->role == 2 ? 'selected=selected' : '' }} value="2">Manager</option>
                                                            <option {{ $account->role == 3 ? 'selected=selected' : '' }} value="3">staff</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="password">Password</label>
                                                        <input id="password" name="password" class="form-control form-control-lg" type="password" value="{{$account->password}}">
                                                    </div>
                                                    <div class="form-group">
                                                        <button type="submit" class="btn btn-info">Save</button>
                                                    </div>
                                                </li>
                                            </ul>
                                        </form>
                                    </div>
                                </div>
                            <!-- Setting Tab End -->
                        </div>
                    </div>
                </div>
            </div>
            <x-footer />
        </div>
    </div>
    <!-- Success modal -->
    @if(session('updateSuccess'))
        <button id="btn_success" class="btn-block d-none" data-toggle="modal" data-target="#success-modal" type="button"></button>
        <div class="modal fade" id="success-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body text-center font-18">
                        <h3 class="mb-20">Form Submitted!</h3>
                        <div class="mb-30 text-center"><img src="{{asset('images/success.png')}}" alt="Successes"></div>
                        {{ session('updateSuccess') }}
                    </div>
                    <div class="modal-footer justify-content-center">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Done</button>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <!-- Warning modal -->
    @if(session('updateErr'))
        <button id="btn_warning" class="btn-block d-none" data-toggle="modal" data-target="#warning-modal" type="button"></button>
        <div class="modal fade" id="warning-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm modal-dialog-centered">
                <div class="modal-content bg-warning">
                    <div class="modal-body text-center">
                        <h3 class="mb-15"><i class="fa fa-exclamation-triangle"></i> Warning</h3>
                        <p>{{ session('updateErr') }}</p>
                        <button type="button" class="btn btn-dark" data-dismiss="modal">Ok</button>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection

@section('script')
    <x-script-common/>
    <script>
        $(document).ready(function() {

            setTimeout(function (){
                $('#btn_success').trigger('click');
                $('#btn_warning').trigger('click');
            },1000)

            // Date Object
            let maxDate = new Date();
            maxDate.setDate(maxDate.getMonth() - 7645);
            let minDate = new Date();
            minDate.setDate(minDate.getMonth() - 14645);
            $('#datepicker1').datepicker({
                language: 'en',
                autoClose: 'true',
                maxDate: maxDate,
                minDate : minDate

            })
        });
    </script>
@endsection
