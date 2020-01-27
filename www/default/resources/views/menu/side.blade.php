@section('menu.side')
    <nav class="col-md-2 d-md-block sidebar">
        <div class="sidebar-sticky">

            <a class="nav-submenu-heading d-block d-md-none" href="#collapseSidebar" data-toggle="collapse"
               role="button"
               aria-expanded="false" aria-controls="collapseSidebar">
                Menu <i class="float-right fa fa-caret-down"></i>
            </a>

            <div class="collapse" id="collapseSidebar" area-expanded="false">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link @if(\Illuminate\Support\Str::startsWith(Route::currentRouteName(), 'dashboard.')) active @endif"
                           href="{{ route('dashboard.index') }}">
                            <i class="fa fa-home"></i> {{ __('Dashboard') }}
                        </a>
                    </li>

                    @canany([
                        'content.posts.index',
                        'content.files.index',
                    ])
                    <li class="nav-item">
                        <a class="nav-submenu-heading" href="#collapseSidebarContent" data-toggle="collapse"
                           role="button"
                           aria-expanded="false" aria-controls="collapseExample">
                            Content <i class="float-right fa fa-caret-down"></i>
                        </a>

                        <div
                            class="collapse nav-submenu @if(\Illuminate\Support\Str::startsWith(Route::currentRouteName(), 'content.')) show @endif"
                            id="collapseSidebarContent" area-expanded="false">
                            <ul class="nav flex-column">

                                @can('content.posts.index')
                                    <li class="nav-item">
                                        <a class="nav-link @if(\Illuminate\Support\Str::startsWith(Route::currentRouteName(), 'content.posts.')) active @endif"
                                           href="{{ route('content.posts.index') }}">
                                            <i class="fa fa-copy"></i> {{ __('Posts') }}
                                        </a>
                                    </li>
                                @endcan
                                @can('content.files.index')
                                    <li class="nav-item">
                                        <a class="nav-link @if(\Illuminate\Support\Str::startsWith(Route::currentRouteName(), 'content.files.')) active @endif"
                                           href="{{ route('content.files.index') }}">
                                            <i class="fa fa-file"></i> {{ __('Files') }}
                                        </a>
                                    </li>
                                @endcan
                            </ul>
                        </div>
                    </li>
                    @endcanany

                    @canany([
                        'user_management.users.index',
                        'user_management.roles.index',
                        'user_management.permissions.index',
                    ])
                    <li class="nav-item">
                        <a class="nav-submenu-heading" href="#collapseSidebarUsers" data-toggle="collapse" role="button"
                           aria-expanded="false" aria-controls="collapseExample">
                            User management <i class="float-right fa fa-caret-down"></i>
                        </a>

                        <div
                            class="collapse nav-submenu @if(\Illuminate\Support\Str::startsWith(Route::currentRouteName(), 'user_management.')) show @endif"
                            id="collapseSidebarUsers" area-expanded="false">
                            <ul class="nav flex-column">
                                @can('user_management.users.index')
                                    <li class="nav-item">
                                        <a class="nav-link @if(\Illuminate\Support\Str::startsWith(Route::currentRouteName(), 'user_management.users.')) active @endif"
                                           href="{{ route('user_management.users.index') }}">
                                            <i class="fa fa-users"></i> {{ __('Users') }}
                                        </a>
                                    </li>
                                @endcan
                                @can('user_management.roles.index')
                                    <li class="nav-item">
                                        <a class="nav-link @if(\Illuminate\Support\Str::startsWith(Route::currentRouteName(), 'user_management.roles.')) active @endif"
                                           href="{{ route('user_management.roles.index') }}">
                                            <i class="fa fa-user-tag"></i> {{ __('Roles') }}
                                        </a>
                                    </li>
                                @endcan
                                @can('user_management.permissions.index')
                                    <li class="nav-item">
                                        <a class="nav-link @if(\Illuminate\Support\Str::startsWith(Route::currentRouteName(), 'user_management.permissions.')) active @endif"
                                           href="{{ route('user_management.permissions.index') }}">
                                            <i class="fa fa-align-justify"></i> {{ __('Permissions') }}
                                        </a>
                                    </li>
                                @endcan
                            </ul>
                        </div>
                    </li>
                    @endcanany

                    @canany([
                        'settings.main_settings.index',
                        'settings.language.index',
                        'settings.privacy.index',
                    ])
                    <li class="nav-item">
                        <a class="nav-submenu-heading" href="#collapseSidebarSettings" data-toggle="collapse"
                           role="button"
                           aria-expanded="false" aria-controls="collapseExample">
                            Settings <i class="float-right fa fa-caret-down"></i>
                        </a>

                        <div
                            class="collapse nav-submenu @if(\Illuminate\Support\Str::startsWith(Route::currentRouteName(), 'settings.')) show @endif"
                            id="collapseSidebarSettings" area-expanded="false">
                            <ul class="nav flex-column">
                                @can('settings.main_settings.index')
                                    <li class="nav-item">
                                        <a class="nav-link @if(\Illuminate\Support\Str::startsWith(Route::currentRouteName(), 'settings.main_settings.')) active @endif"
                                           href="{{ route('settings.main_settings.index') }}">
                                            <i class="fa fa-cog"></i> {{ __('Main Settings') }}
                                        </a>
                                    </li>
                                @endcan
                                @can('settings.language.index')
                                    <li class="nav-item">
                                        <a class="nav-link @if(\Illuminate\Support\Str::startsWith(Route::currentRouteName(), 'settings.language.')) active @endif"
                                           href="{{ route('settings.language.index') }}">
                                            <i class="fa fa-language"></i> {{ __('Language') }}
                                        </a>
                                    </li>
                                @endcan
                                @can('settings.privacy.index')
                                    <li class="nav-item">
                                        <a class="nav-link @if(\Illuminate\Support\Str::startsWith(Route::currentRouteName(), 'settings.privacy.')) active @endif"
                                           href="{{ route('settings.privacy.index') }}">
                                            <i class="fa fa-eye"></i> {{ __('Privacy') }}
                                        </a>
                                    </li>
                                @endcan
                            </ul>
                        </div>
                    </li>
                    @endcanany

                    @can('contact.index')
                        <li class="nav-item">
                            <a class="nav-link @if(\Illuminate\Support\Str::startsWith(Route::currentRouteName(), 'contact.')) active @endif"
                               href="{{ route('contact.index') }}">
                                <i class="fa fa-envelope"></i> {{ __('Contact') }}
                            </a>
                        </li>
                    @endcan

                    @can('faq.index')
                        <li class="nav-item">
                            <a class="nav-link @if(\Illuminate\Support\Str::startsWith(Route::currentRouteName(), 'faq.')) active @endif"
                               href="{{ route('faq.index') }}">
                                <i class="fa fa-question-circle"></i> {{ __('FAQ') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </div>
            <div class="sidebar-footer">
                &copy; {{ date('Y', time()) }} | {{ env('APP_NAME') }}
            </div>
        </div>
    </nav>
@endsection
