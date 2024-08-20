<div class="topbar">

    <div class="topbar-left	d-none d-lg-block">
        <div class="text-center " >
            <a href="{{route('dashboard.dashboard.index')}}" class="logo"><img src="{{ asset('storage/'.web_settings('web', 'website_logo'))}}" style="width: 140px;height:auto;" alt="logo"></a>
        </div>
    </div>

    <nav class="navbar-custom">

        <ul class="list-inline float-right mb-0">

            <li class="list-inline-item dropdown notification-list">
                <a class="nav-link dropdown-toggle arrow-none waves-effect nav-user" data-toggle="dropdown" href="#" role="button"
                   aria-haspopup="false" aria-expanded="false">
                   <img src="@if(!empty(Auth::user()->avatar)) {{asset('storage/'.Auth::user()->avatar)}} @else https://avatars.dicebear.com/api/initials/{{ Auth::user()->name  ?? null}}.svg?margin=10 @endif" alt="user" class="rounded-circle">
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated profile-dropdown ">
                    <a class="dropdown-item text-center" href="#">{{Auth::user()->email ?? null}}</a>
                    <a class="dropdown-item" href="{{route('dashboard.profile.index')}}"><i class="mdi mdi-account-circle m-r-5 text-muted"></i> Profile</a>
                    <a class="dropdown-item" href="{{route('dashboard.auth.logout')}}"><i class="mdi mdi-logout m-r-5 text-muted"></i> Logout</a>
                </div>
            </li>

        </ul>

        <ul class="list-inline menu-left mb-0">
            <li class="list-inline-item">
                <button type="button" class="button-menu-mobile open-left waves-effect">
                    <i class="ion-navicon"></i>
                </button>
            </li>
        </ul>

        <div class="clearfix"></div>

    </nav>

</div>