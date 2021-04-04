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
                            <th scope="col">Project</th>
                            <th scope="col">State</th>
                            <th scope="col">Job type</th>
                            <th scope="col">Title</th>
                            <th scope="col" class="d-none d-sm-table-cell">Process</th>
                            <th scope="col" class="d-none d-xl-table-cell">Assignee</th>
                            <th scope="col" class="d-none d-xl-table-cell">Registered User</th>
                            <th scope="col" class="d-none d-xl-table-cell">Registered Date</th>
                            <th scope="col" class="d-none d-xl-table-cell">Due Date</th>
                            <th scope="col" class="d-none d-xl-table-cell">Effort</th>
                        </tr>
                        </thead>
s                        <tbody>
                            @foreach($tasks as $task)
                                <tr>
                                    <th>{{ $task->task_id }}</th>
                                    <td><span class="badge-info rounded p-2 "> {{ $task->project_name }}</span></td>
                                    <td> {{ $task->task_state }}</td>
                                    <td> {{ $task->task_job_type }}</td>
                                    <td> {{ $task->task_title }}</td>
                                    <td class="d-none d-sm-table-cell">
                                        <div class="progress tv-progress ">
                                            <div class="progress-bar progress-bar-striped bg-info" role="progressbar"
                                                 style="width: 30%" aria-valuenow="10" aria-valuemin="0"
                                                 aria-valuemax="100"></div>
                                        </div>
                                    </td>
                                    <td class="d-none d-xl-table-cell">{{ $task->assignee_fname }}</td>
                                    <td class="d-none d-xl-table-cell">{{ $task->created_by_fname }}</td>
                                    <td class="d-none d-xl-table-cell">{{ $task->start_date }}</td>
                                    <td class="d-none d-xl-table-cell">{{ $task->due_date }}</td>
                                    <td class="d-none d-xl-table-cell">{{ $task->effort }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- Striped table End -->
            </div>
            {{-- End Table data --}}

            <x-footer />
        </div>
    </div>
@endsection

@section('script')
    <x-script-common/>
@endsection
