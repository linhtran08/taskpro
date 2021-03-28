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
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 mb-30">
                    <div class="pd-20 card-box height-100-p">
                        <div class="profile-photo">
                            <img src="{{asset('images/photo1.jpg')}}" alt="" class="avatar-photo">
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
                            @if(request()->route()->getName() == 'adminUpdate')
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
                                                        <input name="birthday" id="datepicker1"
                                                               class="form-control form-control-lg datepicker-here"
                                                               type="text" data-date-format="yyyy-mm-dd">
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
                                                        <select id="role" class="custom-select" name="role">
                                                            <option {{ $account->role == 1 ? 'selected=selected' : '' }} value="1">Admin</option>
                                                            <option {{ $account->role == 2 ? 'selected=selected' : '' }} value="2">Manager</option>
                                                            <option {{ $account->role == 3 ? 'selected=selected' : '' }} value="3">staff</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="password">Password</label>
                                                        <input id="password" name="password" class="form-control form-control-lg" type="text" value="{{$account->password}}">
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
                            @else
                            <div class="tab height-100-p">
                                <ul class="nav nav-tabs customtab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#timeline" role="tab">Timeline</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#tasks" role="tab">Tasks</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#setting" role="tab">Settings</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <!-- Timeline Tab start -->
                                    <div class="tab-pane fade show active" id="timeline" role="tabpanel">
                                        <div class="pd-20">
                                            <div class="profile-timeline">
                                                <div class="timeline-month">
                                                    <h5>August, 2020</h5>
                                                </div>
                                                <div class="profile-timeline-list">
                                                    <ul>
                                                        <li>
                                                            <div class="date">12 Aug</div>
                                                            <div class="task-name"><i class="ion-android-alarm-clock"></i> Task Added</div>
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                                            <div class="task-time">09:30 am</div>
                                                        </li>
                                                        <li>
                                                            <div class="date">10 Aug</div>
                                                            <div class="task-name"><i class="ion-ios-chatboxes"></i> Task Added</div>
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                                            <div class="task-time">09:30 am</div>
                                                        </li>
                                                        <li>
                                                            <div class="date">10 Aug</div>
                                                            <div class="task-name"><i class="ion-ios-clock"></i> Event Added</div>
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                                            <div class="task-time">09:30 am</div>
                                                        </li>
                                                        <li>
                                                            <div class="date">10 Aug</div>
                                                            <div class="task-name"><i class="ion-ios-clock"></i> Event Added</div>
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                                            <div class="task-time">09:30 am</div>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="timeline-month">
                                                    <h5>July, 2020</h5>
                                                </div>
                                                <div class="profile-timeline-list">
                                                    <ul>
                                                        <li>
                                                            <div class="date">12 July</div>
                                                            <div class="task-name"><i class="ion-android-alarm-clock"></i> Task Added</div>
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                                            <div class="task-time">09:30 am</div>
                                                        </li>
                                                        <li>
                                                            <div class="date">10 July</div>
                                                            <div class="task-name"><i class="ion-ios-chatboxes"></i> Task Added</div>
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                                            <div class="task-time">09:30 am</div>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="timeline-month">
                                                    <h5>June, 2020</h5>
                                                </div>
                                                <div class="profile-timeline-list">
                                                    <ul>
                                                        <li>
                                                            <div class="date">12 June</div>
                                                            <div class="task-name"><i class="ion-android-alarm-clock"></i> Task Added</div>
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                                            <div class="task-time">09:30 am</div>
                                                        </li>
                                                        <li>
                                                            <div class="date">10 June</div>
                                                            <div class="task-name"><i class="ion-ios-chatboxes"></i> Task Added</div>
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                                            <div class="task-time">09:30 am</div>
                                                        </li>
                                                        <li>
                                                            <div class="date">10 June</div>
                                                            <div class="task-name"><i class="ion-ios-clock"></i> Event Added</div>
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                                            <div class="task-time">09:30 am</div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Timeline Tab End -->
                                    <!-- Tasks Tab start -->
                                    <div class="tab-pane fade" id="tasks" role="tabpanel">
                                        <div class="pd-20 profile-task-wrap">
                                            <div class="container pd-0">
                                                <!-- Open Task start -->
                                                <div class="task-title row align-items-center">
                                                    <div class="col-md-8 col-sm-12">
                                                        <h5>Open Tasks (4 Left)</h5>
                                                    </div>
                                                    <div class="col-md-4 col-sm-12 text-right">
                                                        <a href="task-add" data-toggle="modal" data-target="#task-add" class="bg-light-blue btn text-blue weight-500"><i class="ion-plus-round"></i> Add</a>
                                                    </div>
                                                </div>
                                                <div class="profile-task-list pb-30">
                                                    <ul>
                                                        <li>
                                                            <div class="custom-control custom-checkbox mb-5">
                                                                <input type="checkbox" class="custom-control-input" id="task-1">
                                                                <label class="custom-control-label" for="task-1"></label>
                                                            </div>
                                                            <div class="task-type">Email</div>
                                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id ea earum.
                                                            <div class="task-assign">Assigned to Ferdinand M. <div class="due-date">due date <span>22 February 2019</span></div></div>
                                                        </li>
                                                        <li>
                                                            <div class="custom-control custom-checkbox mb-5">
                                                                <input type="checkbox" class="custom-control-input" id="task-2">
                                                                <label class="custom-control-label" for="task-2"></label>
                                                            </div>
                                                            <div class="task-type">Email</div>
                                                            Lorem ipsum dolor sit amet.
                                                            <div class="task-assign">Assigned to Ferdinand M. <div class="due-date">due date <span>22 February 2019</span></div></div>
                                                        </li>
                                                        <li>
                                                            <div class="custom-control custom-checkbox mb-5">
                                                                <input type="checkbox" class="custom-control-input" id="task-3">
                                                                <label class="custom-control-label" for="task-3"></label>
                                                            </div>
                                                            <div class="task-type">Email</div>
                                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                                            <div class="task-assign">Assigned to Ferdinand M. <div class="due-date">due date <span>22 February 2019</span></div></div>
                                                        </li>
                                                        <li>
                                                            <div class="custom-control custom-checkbox mb-5">
                                                                <input type="checkbox" class="custom-control-input" id="task-4">
                                                                <label class="custom-control-label" for="task-4"></label>
                                                            </div>
                                                            <div class="task-type">Email</div>
                                                            Lorem ipsum dolor sit amet. Id ea earum.
                                                            <div class="task-assign">Assigned to Ferdinand M. <div class="due-date">due date <span>22 February 2019</span></div></div>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <!-- Open Task End -->
                                                <!-- Close Task start -->
                                                <div class="task-title row align-items-center">
                                                    <div class="col-md-12 col-sm-12">
                                                        <h5>Closed Tasks</h5>
                                                    </div>
                                                </div>
                                                <div class="profile-task-list close-tasks">
                                                    <ul>
                                                        <li>
                                                            <div class="custom-control custom-checkbox mb-5">
                                                                <input type="checkbox" class="custom-control-input" id="task-close-1" checked="" disabled="">
                                                                <label class="custom-control-label" for="task-close-1"></label>
                                                            </div>
                                                            <div class="task-type">Email</div>
                                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id ea earum.
                                                            <div class="task-assign">Assigned to Ferdinand M. <div class="due-date">due date <span>22 February 2018</span></div></div>
                                                        </li>
                                                        <li>
                                                            <div class="custom-control custom-checkbox mb-5">
                                                                <input type="checkbox" class="custom-control-input" id="task-close-2" checked="" disabled="">
                                                                <label class="custom-control-label" for="task-close-2"></label>
                                                            </div>
                                                            <div class="task-type">Email</div>
                                                            Lorem ipsum dolor sit amet.
                                                            <div class="task-assign">Assigned to Ferdinand M. <div class="due-date">due date <span>22 February 2018</span></div></div>
                                                        </li>
                                                        <li>
                                                            <div class="custom-control custom-checkbox mb-5">
                                                                <input type="checkbox" class="custom-control-input" id="task-close-3" checked="" disabled="">
                                                                <label class="custom-control-label" for="task-close-3"></label>
                                                            </div>
                                                            <div class="task-type">Email</div>
                                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                                            <div class="task-assign">Assigned to Ferdinand M. <div class="due-date">due date <span>22 February 2018</span></div></div>
                                                        </li>
                                                        <li>
                                                            <div class="custom-control custom-checkbox mb-5">
                                                                <input type="checkbox" class="custom-control-input" id="task-close-4" checked="" disabled="">
                                                                <label class="custom-control-label" for="task-close-4"></label>
                                                            </div>
                                                            <div class="task-type">Email</div>
                                                            Lorem ipsum dolor sit amet. Id ea earum.
                                                            <div class="task-assign">Assigned to Ferdinand M. <div class="due-date">due date <span>22 February 2018</span></div></div>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <!-- Close Task start -->
                                                <!-- add task popup start -->
                                                <div class="modal fade customscroll" id="task-add" tabindex="-1" role="dialog">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLongTitle">Tasks Add</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Close Modal">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body pd-0">
                                                                <div class="task-list-form">
                                                                    <ul>
                                                                        <li>
                                                                            <form>
                                                                                <div class="form-group row">
                                                                                    <label class="col-md-4">Task Type</label>
                                                                                    <div class="col-md-8">
                                                                                        <input type="text" class="form-control">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group row">
                                                                                    <label class="col-md-4">Task Message</label>
                                                                                    <div class="col-md-8">
                                                                                        <textarea class="form-control"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group row">
                                                                                    <label class="col-md-4">Assigned to</label>
                                                                                    <div class="col-md-8">
                                                                                        <select class="selectpicker form-control" data-style="btn-outline-primary" title="Not Chosen" multiple="" data-selected-text-format="count" data-count-selected-text= "{0} people selected">
                                                                                            <option>Ferdinand M.</option>
                                                                                            <option>Don H. Rabon</option>
                                                                                            <option>Ann P. Harris</option>
                                                                                            <option>Katie D. Verdin</option>
                                                                                            <option>Christopher S. Fulghum</option>
                                                                                            <option>Matthew C. Porter</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group row mb-0">
                                                                                    <label class="col-md-4">Due Date</label>
                                                                                    <div class="col-md-8">
                                                                                        <input type="text" class="form-control date-picker">
                                                                                    </div>
                                                                                </div>
                                                                            </form>
                                                                        </li>
                                                                        <li>
                                                                            <a href="javascript:;" class="remove-task"  data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Remove Task"><i class="ion-minus-circled"></i></a>
                                                                            <form>
                                                                                <div class="form-group row">
                                                                                    <label class="col-md-4">Task Type</label>
                                                                                    <div class="col-md-8">
                                                                                        <input type="text" class="form-control">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group row">
                                                                                    <label class="col-md-4">Task Message</label>
                                                                                    <div class="col-md-8">
                                                                                        <textarea class="form-control"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group row">
                                                                                    <label class="col-md-4">Assigned to</label>
                                                                                    <div class="col-md-8">
                                                                                        <select class="selectpicker form-control" data-style="btn-outline-primary" title="Not Chosen" multiple="" data-selected-text-format="count" data-count-selected-text= "{0} people selected">
                                                                                            <option>Ferdinand M.</option>
                                                                                            <option>Don H. Rabon</option>
                                                                                            <option>Ann P. Harris</option>
                                                                                            <option>Katie D. Verdin</option>
                                                                                            <option>Christopher S. Fulghum</option>
                                                                                            <option>Matthew C. Porter</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group row mb-0">
                                                                                    <label class="col-md-4">Due Date</label>
                                                                                    <div class="col-md-8">
                                                                                        <input type="text" class="form-control date-picker">
                                                                                    </div>
                                                                                </div>
                                                                            </form>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                                <div class="add-more-task">
                                                                    <a href="#" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Add Task"><i class="ion-plus-circled"></i> Add More Task</a>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-primary">Add</button>
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- add task popup End -->
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Tasks Tab End -->
                                    <!-- Setting Tab start -->
                                    <div class="tab-pane fade height-100-p" id="setting" role="tabpanel">
                                        <div class="profile-setting">
                                            <form>
                                                <ul class="profile-edit-list row">
                                                    <li class="weight-500 col-md-6">
                                                        <h4 class="text-blue h5 mb-20">Edit Your Personal Setting</h4>
                                                        <div class="form-group">
                                                            <label>Full Name</label>
                                                            <input class="form-control form-control-lg" type="text">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Title</label>
                                                            <input class="form-control form-control-lg" type="text">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Email</label>
                                                            <input class="form-control form-control-lg" type="email">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Date of birth</label>
                                                            <input class="form-control form-control-lg date-picker" type="text">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Gender</label>
                                                            <div class="d-flex">
                                                                <div class="custom-control custom-radio mb-5 mr-20">
                                                                    <input type="radio" id="customRadio4" name="customRadio" class="custom-control-input">
                                                                    <label class="custom-control-label weight-400" for="customRadio4">Male</label>
                                                                </div>
                                                                <div class="custom-control custom-radio mb-5">
                                                                    <input type="radio" id="customRadio5" name="customRadio" class="custom-control-input">
                                                                    <label class="custom-control-label weight-400" for="customRadio5">Female</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Country</label>
                                                            <select class="selectpicker form-control form-control-lg" data-style="btn-outline-secondary btn-lg" title="Not Chosen">
                                                                <option>United States</option>
                                                                <option>India</option>
                                                                <option>United Kingdom</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>State/Province/Region</label>
                                                            <input class="form-control form-control-lg" type="text">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Postal Code</label>
                                                            <input class="form-control form-control-lg" type="text">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Phone Number</label>
                                                            <input class="form-control form-control-lg" type="text">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Address</label>
                                                            <textarea class="form-control"></textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Visa Card Number</label>
                                                            <input class="form-control form-control-lg" type="text">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Paypal ID</label>
                                                            <input class="form-control form-control-lg" type="text">
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="custom-control custom-checkbox mb-5">
                                                                <input type="checkbox" class="custom-control-input" id="customCheck1-1">
                                                                <label class="custom-control-label weight-400" for="customCheck1-1">I agree to receive notification emails</label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group mb-0">
                                                            <input type="submit" class="btn btn-primary" value="Update Information">
                                                        </div>
                                                    </li>
                                                    <li class="weight-500 col-md-6">
                                                        <h4 class="text-blue h5 mb-20">Edit Social Media links</h4>
                                                        <div class="form-group">
                                                            <label>Facebook URL:</label>
                                                            <input class="form-control form-control-lg" type="text" placeholder="Paste your link here">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Twitter URL:</label>
                                                            <input class="form-control form-control-lg" type="text" placeholder="Paste your link here">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Linkedin URL:</label>
                                                            <input class="form-control form-control-lg" type="text" placeholder="Paste your link here">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Instagram URL:</label>
                                                            <input class="form-control form-control-lg" type="text" placeholder="Paste your link here">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Dribbble URL:</label>
                                                            <input class="form-control form-control-lg" type="text" placeholder="Paste your link here">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Dropbox URL:</label>
                                                            <input class="form-control form-control-lg" type="text" placeholder="Paste your link here">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Google-plus URL:</label>
                                                            <input class="form-control form-control-lg" type="text" placeholder="Paste your link here">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Pinterest URL:</label>
                                                            <input class="form-control form-control-lg" type="text" placeholder="Paste your link here">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Skype URL:</label>
                                                            <input class="form-control form-control-lg" type="text" placeholder="Paste your link here">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Vine URL:</label>
                                                            <input class="form-control form-control-lg" type="text" placeholder="Paste your link here">
                                                        </div>
                                                        <div class="form-group mb-0">
                                                            <input type="submit" class="btn btn-primary" value="Save & Update">
                                                        </div>
                                                    </li>
                                                </ul>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- Setting Tab End -->
                                </div>
                            </div>
                            @endif
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
