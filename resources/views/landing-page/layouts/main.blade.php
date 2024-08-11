<!DOCTYPE html>
<html lang="en">
    <head>
        {{-- Head --}}
        @include("landing-page.layouts.head")
        {{-- End Head --}}
    </head>
    <body>
        @include('sweetalert::alert')
        
        @yield("preloader")

        @include('sweetalert::alert')

        {{-- Topbar --}}
        @include("landing-page.layouts.topbar")
        {{-- End Topbar --}}

        @yield("content")
        
        {{-- Footer --}}
        @include("landing-page.layouts.footer")
        {{-- End Footer --}}

        @yield("scrolltop")
        
        {{-- Script --}}
        @include("landing-page.layouts.script")
        {{-- End Script --}}

    </body>
</html>