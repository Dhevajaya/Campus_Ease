<!DOCTYPE html>
<html lang="en">
    <head>
        @include('dashboard.pages.auth.layouts.head')
    </head>


    <body class="fixed-left">

        @include('sweetalert::alert')

        @yield('content')

        @include('dashboard.pages.auth.layouts.script')

    </body>
</html>