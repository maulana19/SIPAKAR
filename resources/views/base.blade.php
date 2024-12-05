<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('components.head')

        @livewireStyles
    </head>
    <body class="hold-transition @if(Request::is('login')) login-page @else sidebar-mini layout-fixed @endif">
        @if (Request::is('login'))
            <div class="login-box">
                @yield('content')
            </div>
        @else
            <div class="wrapper">
                {{-- loader --}}
                {{-- @include('components.loader') --}}

                {{-- Navbar --}}
                @include('components.navbar')

                {{-- Sidebar --}}
                @include('components.sidebar')
                @yield('content')

                {{-- Footer --}}
                @include('components.footer')
            </div>
        @endif
        @livewireScripts
        @include('components.script')
    </body>
</html>
