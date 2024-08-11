<div class="left side-menu">
    <button type="button" class="button-menu-mobile button-menu-mobile-topbar open-left waves-effect">
        <i class="ion-close"></i>
    </button>

    <div class="left-side-logo d-block d-lg-none">
        <div class="text-center">
            
            <a href="{{route('dashboard.dashboard.index')}}" class="logo"><img src="{{ asset('storage/'.web_settings('web', 'website_logo_dark'))}}" height="20" alt="logo"></a>
        </div>
    </div>

    <div class="sidebar-inner slimscrollleft">
        
        <div id="sidebar-menu">
            <ul>
                <li class="menu-title">Main</li>

                <li>
                    <a href="{{route('landing-page.home.index')}}" class="waves-effect active">
                        <i class="fa fa-chrome"></i>
                        <span> Buka Landing Page</span>
                    </a>
                </li>

                @if(Auth::user()->hasRole([
                    \App\Enums\RoleEnum::SUPERADMIN,
                    \App\Enums\RoleEnum::ADMINISTRATOR,
                    \App\Enums\RoleEnum::EMPLOYEE,
                    \App\Enums\RoleEnum::TEACHER,
                ]))
                <li>
                    <a href="{{route('dashboard.dashboard.index')}}" class="waves-effect active">
                        <i class="fa fa-database"></i>
                        <span> Dashboard</span>
                    </a>
                </li>
                @endif

                @if(Auth::user()->hasRole([
                    \App\Enums\RoleEnum::SUPERADMIN,
                    \App\Enums\RoleEnum::ADMINISTRATOR,
                ]))
                <li>
                    <a href="{{route('dashboard.pages.index')}}" class="waves-effect">
                        <i class="fa fa-chrome"></i>
                        <span> Halaman</span>
                    </a>
                </li>
                @endif

                @if(Auth::user()->hasRole([
                    \App\Enums\RoleEnum::SUPERADMIN,
                    \App\Enums\RoleEnum::ADMINISTRATOR,
                ]))
                <li>
                    <a href="{{route('dashboard.employees.index')}}" class="waves-effect">
                        <i class="fa fa-university"></i>
                        <span> Guru</span>
                    </a>
                </li>
                @endif

                @if(Auth::user()->hasRole([
                    \App\Enums\RoleEnum::SUPERADMIN,
                    \App\Enums\RoleEnum::ADMINISTRATOR,
                ]))
                <li>
                    <a href="{{ route('dashboard.gallery.index') }}" class="waves-effect">
                        <i class="fa fa-image"></i>
                        <span> Galeri</span>
                    </a>
                </li>
                @endif

                @if(Auth::user()->hasRole([
                    \App\Enums\RoleEnum::SUPERADMIN,
                    \App\Enums\RoleEnum::ADMINISTRATOR,
                ]))
                <li>
                    <a href="{{ route('dashboard.faq.index') }}" class="waves-effect">
                        <i class="fa fa-question"></i>
                        <span> Faq</span>
                    </a>
                </li>
                @endif

                @if(Auth::user()->hasRole([
                    \App\Enums\RoleEnum::SUPERADMIN,
                    \App\Enums\RoleEnum::ADMINISTRATOR,
                ]))
                <li>
                    <a href="{{route('dashboard.achievements.index')}}" class="waves-effect">
                        <i class="fa fa-trophy"></i>
                        <span> Prestasi</span>
                    </a>
                </li>
                @endif

                @if(Auth::user()->hasRole([
                    \App\Enums\RoleEnum::SUPERADMIN,
                    \App\Enums\RoleEnum::ADMINISTRATOR,
                    \App\Enums\RoleEnum::EMPLOYEE,
                    \App\Enums\RoleEnum::TEACHER,
                ]))
                <li>
                    <a href="{{route('dashboard.file-public.index')}}" class="waves-effect">
                        <i class="fa fa-file"></i>
                        <span> File Publik</span>
                    </a>
                </li>
                @endif

                @if(Auth::user()->hasRole([
                    \App\Enums\RoleEnum::SUPERADMIN,
                    \App\Enums\RoleEnum::ADMINISTRATOR,
                ]))
                <li>
                    <a href="{{route('dashboard.announcements.index')}}" class="waves-effect">
                        <i class="fa fa-bullhorn"></i>
                        <span> Pengumuman</span>
                    </a>
                </li>
                @endif

                @if(Auth::user()->hasRole([
                    \App\Enums\RoleEnum::SUPERADMIN,
                    \App\Enums\RoleEnum::ADMINISTRATOR,
                ]))
                <li>
                    <a href="{{route('dashboard.users.index')}}" class="waves-effect">
                        <i class="fa fa-users"></i>
                        <span> User</span>
                    </a>
                </li>
                @endif

                @if(Auth::user()->hasRole([
                    \App\Enums\RoleEnum::SUPERADMIN,
                    \App\Enums\RoleEnum::ADMINISTRATOR,
                ]))
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-cog"></i> <span> Pengaturan </span> <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{route('dashboard.settings.web.index')}}">Website</a></li>
                        @if(Auth::user()->hasRole([
                            \App\Enums\RoleEnum::SUPERADMIN,
                        ]))
                        <li><a href="/dashboard/user-activity">User Activity</a></li>
                        <li><a href="/dashboard/logs">Log System</a></li>
                        @endif
                    </ul>
                </li>
                @endif

            </ul>
        </div>
        <div class="clearfix"></div>
    </div> <!-- end sidebarinner -->
</div>