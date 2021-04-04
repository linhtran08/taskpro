<div class="left-side-bar">
    <div class="brand-logo">
        <a href="{{ route('dashboard') }}">
            <img src="{{ asset('images/deskapp-logo.svg') }}" alt="" class="dark-logo">
            <img src="{{ asset('images/deskapp-logo-white.svg') }}" alt="" class="light-logo">
        </a>
        <div class="close-sidebar" data-toggle="left-sidebar-close">
            <i class="ion-close-round"></i>
        </div>
    </div>
    <div class="menu-block customscroll">
        <div class="sidebar-menu">
            @if(session()->get('account.role') == 1)
                <ul id="accordion-menu">
                    <li class="dropdown">
                        <a href="{{url('admin/')}}" class="dropdown-toggle no-arrow @include('mixin.naviActive',['url'=>'admin'])">
                            <span class="micon dw dw-name"></span><span class="mtext">User Management</span>
                        </a>
                    </li>
                    <li class="dropdown">
                        <a href="{{url('admin/create')}}" class="dropdown-toggle no-arrow @include('mixin.naviActive',['url'=>'admin/create'])">
                            <span class="micon dw dw-add-user"></span><span class="mtext">Create User</span>
                        </a>
                    </li>
                </ul>
            @else
                <ul id="accordion-menu">
                <li class="dropdown">
                    <a href="{{url('/')}}" class="dropdown-toggle no-arrow @include('mixin.naviActive',['url'=>'dashboard'])">
                        <span class="micon dw dw-house-1"></span><span class="mtext">Dash Board</span>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon dw dw-edit2"></span><span class="mtext">Project Mgmt</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{ url('requirement') }}"
                            class="@include('mixin.naviActive',['url'=>'requirement'])"
                            >Requirement</a></li>
                        <li><a href="{{ url('monitoring') }}" class="@include('mixin.naviActive',['url'=>'monitoring'])">Project Monitoring</a></li>
                    </ul>
                </li>
            </ul>
            @endif
        </div>
    </div>
</div>
