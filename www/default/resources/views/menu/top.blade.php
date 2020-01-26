@section('menu.top')
    <div class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top topbar">
        <a href="{{ route('dashboard.index') }}" class="navbar-brand">{{ env('APP_NAME', 'Portal') }}</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menuTopNav"
                aria-controls="menuTopNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="menuTopNav">
            <ul class="navbar-nav ml-auto">

                @can('notifications.receive')
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="menuTopNavDropdownNotifications" href="#" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-bell text-info"></i>
                            <span class="d-lg-none">Notifications</span>
                            <span class="badge badge-danger rounded-circle">2</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right"
                             aria-labelledby="menuTopNavDropdownNotifications">
                            <h5 class="dropdown-header">Notifications</h5>
                            <a class="dropdown-item" href="#">Hello world, i'm a notification</a>
                            <a class="dropdown-item" href="#">I'm a real long notification so i can show you what
                                happens to
                                me cause i'm to long</a>
                        </div>
                    </li>
                @endcan

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="menuTopNavDropdownUser" href="#" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-user text-info"></i>
                        <span class="d-lg-none">Account</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="menuTopNavDropdownUser">
                        @if(Auth::check())
                            <h6 class="dropdown-header">{{ Auth::user()->username }}</h6>
                        @endif
                        <div class="dropdown-divider"></div>
                        @can('profile.profile.index')
                            <a class="dropdown-item" href="#"><i class="fa fa-user"></i> {{ __('Profile') }}</a>
                        @endcan
                        @can('profile.settings.index')
                            <a class="dropdown-item" href="#"><i class="fa fa-cog"></i> {{ __('Personal settings') }}
                            </a>
                        @endcan

                        @canany(['profile.settings', 'profile.profile'])
                            <div class="dropdown-divider"></div>
                        @endcanany
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal"><i
                                class="fa fa-sign-out-alt"></i> {{ __('Logout') }}</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
@endsection
