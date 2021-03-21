@extends('layout.common')
@section('title','Management')
@section('style')
    <x-style-common/>
@endsection

@section('pre-loader')
    <x-pre-loader/>
@endsection

@section('main-container')
    <a href="#" class="btn-block position-fixed rounded-circle p-2 tv-btn-create" data-toggle="modal" data-target="#Medium-modal" type="button">
        <i class="icon-copy fi-plus"></i>
    </a>
    <div class="modal fade z-99999" id="Medium-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">Create task</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <form action="">
                        <div class="row">
                            <div class="col-xl-2">
                                <div class="form-group">
                                    <label >JOB TYPE</label>
                                    <select class="custom-select col-12">
                                        <option selected="">Choose...</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="">IMPORTANT</label>
                                    <select class="custom-select col-12">
                                        <option selected="">Choose...</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="">ITERATION</label>
                                    <select class="custom-select col-12">
                                        <option selected="">Choose...</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="">Process</label>
                                    <select class="custom-select col-12">
                                        <option selected="">Choose...</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Default Datedpicker</label>
                                    <input class="form-control date-picker" placeholder="Select Date" type="text">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="">Phase</label>
                                    <select class="custom-select col-12">
                                        <option selected="">Choose...</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="html-editor pd-20 mb-30 w-100">
                                <div class="form-group">
                                    <label for="">Title</label>
                                    <input class="form-control" type="text" placeholder="Task title">
                                </div>
                                <div class="form-group">
                                    <label for="">Content</label>
                                    <textarea class="textarea_editor form-control border-radius-0" placeholder="Enter text ..."></textarea>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Create</button>
                </div>
            </div>
        </div>
    </div>
    <div class="main-container">
        <div class="pd-ltr-20">
            <!-- Select-2 Start -->
            <div class="pd-5 mb-30">
                <form>
                    <div class="row">
                        <div class="col-xl-2">
                            <div class="form-group">
                                <label for="sl1"></label>
                                <select id="sl1" class="custom-select2 form-control" name="state"
                                        style="width: 100%; height: 38px;">
                                    <optgroup label="Alaskan/Hawaiian Time Zone">
                                        <option value="AK">Alaska</option>
                                        <option value="HI">Hawaii</option>
                                    </optgroup>
                                    <optgroup label="Pacific Time Zone">
                                        <option value="CA">California</option>
                                        <option value="NV">Nevada</option>
                                        <option value="OR">Oregon</option>
                                        <option value="WA">Washington</option>
                                    </optgroup>
                                    <optgroup label="Mountain Time Zone">
                                        <option value="AZ">Arizona</option>
                                        <option value="CO">Colorado</option>
                                        <option value="ID">Idaho</option>
                                        <option value="MT">Montana</option>
                                        <option value="NE">Nebraska</option>
                                        <option value="NM">New Mexico</option>
                                        <option value="ND">North Dakota</option>
                                        <option value="UT">Utah</option>
                                        <option value="WY">Wyoming</option>
                                    </optgroup>
                                </select>
                            </div>
                        </div>
                        <div class="col-xl-2">
                            <div class="form-group">
                                <label for="sl2"></label>
                                <select id="sl2" class="custom-select2 form-control" name="state"
                                        style="width: 100%; height: 38px;">
                                    <optgroup label="Alaskan/Hawaiian Time Zone">
                                        <option value="AK">Alaska</option>
                                        <option value="HI">Hawaii</option>
                                    </optgroup>
                                    <optgroup label="Pacific Time Zone">
                                        <option value="CA">California</option>
                                        <option value="NV">Nevada</option>
                                        <option value="OR">Oregon</option>
                                        <option value="WA">Washington</option>
                                    </optgroup>
                                    <optgroup label="Mountain Time Zone">
                                        <option value="AZ">Arizona</option>
                                        <option value="CO">Colorado</option>
                                        <option value="ID">Idaho</option>
                                        <option value="MT">Montana</option>
                                        <option value="NE">Nebraska</option>
                                        <option value="NM">New Mexico</option>
                                        <option value="ND">North Dakota</option>
                                        <option value="UT">Utah</option>
                                        <option value="WY">Wyoming</option>
                                    </optgroup>
                                </select>
                            </div>
                        </div>
                        <div class="col-xl-2">
                            <div class="form-group">
                                <label for="sl3"></label>
                                <select id="sl3" class="custom-select2 form-control" name="state"
                                        style="width: 100%; height: 38px;">
                                    <optgroup label="Alaskan/Hawaiian Time Zone">
                                        <option value="AK">Alaska</option>
                                        <option value="HI">Hawaii</option>
                                    </optgroup>
                                    <optgroup label="Pacific Time Zone">
                                        <option value="CA">California</option>
                                        <option value="NV">Nevada</option>
                                        <option value="OR">Oregon</option>
                                        <option value="WA">Washington</option>
                                    </optgroup>
                                    <optgroup label="Mountain Time Zone">
                                        <option value="AZ">Arizona</option>
                                        <option value="CO">Colorado</option>
                                        <option value="ID">Idaho</option>
                                        <option value="MT">Montana</option>
                                        <option value="NE">Nebraska</option>
                                        <option value="NM">New Mexico</option>
                                        <option value="ND">North Dakota</option>
                                        <option value="UT">Utah</option>
                                        <option value="WY">Wyoming</option>
                                    </optgroup>
                                </select>
                            </div>
                        </div>
                        <div class="col-xl-2">
                            <div class="form-group">
                                <label for="sl4"></label>
                                <select id="sl4" class="custom-select2 form-control" multiple="multiple"
                                        style="width: 100%;">
                                    <optgroup label="Alaskan/Hawaiian Time Zone">
                                        <option value="AK">Alaska</option>
                                        <option value="HI">Hawaii</option>
                                    </optgroup>
                                    <optgroup label="Pacific Time Zone">
                                        <option value="CA">California</option>
                                        <option value="NV">Nevada</option>
                                        <option value="OR">Oregon</option>
                                        <option value="WA">Washington</option>
                                    </optgroup>
                                    <optgroup label="Mountain Time Zone">
                                        <option value="AZ">Arizona</option>
                                        <option value="CO">Colorado</option>
                                        <option value="ID">Idaho</option>
                                        <option value="MT">Montana</option>
                                        <option value="NE">Nebraska</option>
                                        <option value="NM">New Mexico</option>
                                        <option value="ND">North Dakota</option>
                                        <option value="UT">Utah</option>
                                        <option value="WY">Wyoming</option>
                                    </optgroup>
                                </select>
                            </div>
                        </div>
                        <div class="col-xl-2">
                            <div class="form-group">
                                <label for="sl5"></label>
                                <input id="sl5" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-xl-2">
                            <div class="form-group">
                                <label></label>
                                <button class="btn btn-info form-control">Search</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- Select-2 end -->
            {{-- Table data --}}
            <div class="pd-5">
                <!-- Striped table start -->
                <div class="p-md-2 card-box mb-30">
                    <table class="table table-striped m-0">
                        <thead class="tv-table-th">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Job</th>
                            <th scope="col">Status</th>
                            <th scope="col">Category</th>
                            <th scope="col">Title</th>
                            <th scope="col" class="d-none d-sm-table-cell">Process</th>
                            <th scope="col" class="d-none d-xl-table-cell">Assignee</th>
                            <th scope="col" class="d-none d-xl-table-cell">Registered User</th>
                            <th scope="col" class="d-none d-xl-table-cell">Registered Date</th>
                            <th scope="col" class="d-none d-xl-table-cell">Due Date</th>
                            <th scope="col" class="d-none d-xl-table-cell">Effort</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <th>5861</th>
                            <td><span class="badge-info rounded p-2 ">New</span></td>
                            <td>In Process</td>
                            <td>On Lab</td>
                            <td>Lorem ipsum dolor sit amet.</td>
                            <td class="d-none d-sm-table-cell">
                                <div class="progress tv-progress ">
                                    <div class="progress-bar progress-bar-striped bg-info" role="progressbar"
                                         style="width: 30%" aria-valuenow="10" aria-valuemin="0"
                                         aria-valuemax="100"></div>
                                </div>
                            </td>
                            <td class="d-none d-xl-table-cell">Duc le</td>
                            <td class="d-none d-xl-table-cell">Truong Do</td>
                            <td class="d-none d-xl-table-cell">Mar 03,2021</td>
                            <td class="d-none d-xl-table-cell">Mar 09,2021</td>
                            <td class="d-none d-xl-table-cell">30</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <!-- Striped table End -->
            </div>
            {{-- End Table data --}}
            <div class="footer-wrap pd-20 mb-20 card-box">
                DeskApp
            </div>
        </div>
    </div>
@endsection

@section('script')
    <x-script-common/>
@endsection
