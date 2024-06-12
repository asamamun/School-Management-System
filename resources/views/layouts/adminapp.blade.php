<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? config('app.name', 'Laravel') }}</title>

    {{--  --}}
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="{{ asset('assets/admin/css/styles.css') }}" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    {{-- extra --}}
    @yield('head')
</head>

<body id="sb-nav-fixed">
    {{-- navbar --}}
    @include('inc.admin.navbar')
    {{-- /navbar --}}

    <div id="layoutSidenav">
        {{-- sidebar --}}
        @include('inc.admin.sidebar')
        {{-- /sidebar --}}
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    @include('inc.flash')
                    @include('inc.error')

                    {{-- content --}}
                    @yield('content')
                    {{-- /content --}}

                </div>
            </main>

            {{-- footer --}}
            @include('inc.admin.footer')
            {{-- /footer --}}
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="{{ asset('assets/admin/js/scripts.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/admin/assets/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('assets/admin/assets/demo/chart-bar-demo.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
        crossorigin="anonymous"></script>
    <script src="{{ asset('assets/admin/js/datatables-simple-demo.js') }}"></script>

    {{-- extra  --}}
    @yield('script')

</body>

</html>
