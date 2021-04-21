<div class="header">
    <div class="header-left">
        <div class="menu-icon dw dw-menu"></div>
        <div class="brand-logo">
            <a href="{{ route('dashboard') }}">
                <img src="{{ asset('images/deskapp-logo.svg') }}" alt="" class="dark-logo">
                <img src="{{ asset('images/deskapp-logo-white.svg') }}" alt="" class="light-logo">
            </a>
        </div>
    </div>
    <div class="header-right">
{{--        <div class="dashboard-setting user-notification">--}}
{{--            <div class="dropdown">--}}
{{--                <a class="dropdown-toggle no-arrow" href="javascript:;" data-toggle="right-sidebar">--}}
{{--                    <i class="dw dw-settings2"></i>--}}
{{--                </a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="user-notification">--}}
{{--            <div class="dropdown buzz">--}}
{{--                <a class="dropdown-toggle no-arrow" href="{{ url('profile') }}" role="button" data-toggle="dropdown">--}}
{{--                    <i class="icon-copy dw dw-notification"></i>--}}
{{--                    <span class="badge notification-active"></span>--}}
{{--                </a>--}}
{{--                <div class="dropdown-menu dropdown-menu-right">--}}
{{--                    <div class="notification-list mx-h-350 customscroll">--}}
{{--                        <ul id="message_render">--}}

{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
        <div class="user-info-dropdown">
            <div class="dropdown">
                <a class="dropdown-toggle" href="{{ url('profile') }}" role="button" data-toggle="dropdown">
						<span class="user-icon">
							<img src="{{ Avatar::create(session()->get('account.name'))->toBase64() }}" />
						</span>
                    <span class="user-name">{{ session()->get('account.name') }}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                    <a class="dropdown-item" href="{{ url('profile') }}"><i class="dw dw-user1"></i> Profile</a>
                    <a class="dropdown-item" href="{{ url('logout') }}"><i class="dw dw-logout"></i> Log Out</a>
                </div>
            </div>
        </div>
        <div class="github-link">
            @if((session()->get('account.role') == 1))
                <span><img src="{{ asset('images/admin.svg') }}" alt="blah"></span>
            @elseif((session()->get('account.role') == 2))
                <span><img src="{{ asset('images/pm.svg') }}" alt="blah2"></span>
            @else
                <span><img src="{{ asset('images/github.svg') }}" alt="blah3"></span>
            @endif
{{--            <span><img src="{{ (session()->get('account.role') == 1) ? asset('images/admin.svg') : asset('images/github.svg')  }}" alt=""></span>--}}
        </div>
    </div>
</div>
