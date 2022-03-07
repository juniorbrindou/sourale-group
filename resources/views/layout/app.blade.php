<!DOCTYPE html>
<html lang={{ str_replace('_', '-', app()->getLocale()) }}>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset('dist/img/favicon.ico')}}" />
    <meta name= "author" lang="fr" content= "Brindou Gnépa Junior">
    <title>{{ config('app.name') }}</title>
    @stack('styles')
    <link rel="stylesheet" href="{{ asset('dist/css/style.css')}}">
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">
        @include('sweetalert::alert')

        @stack('preloader')

        {{-- Navbar --}}
        @include('layout._navbar')
        {{-- Navbar --}}


        {{-- Main Sidebar Container --}}
        @include('layout._sidebar')
        {{-- Main Sidebar Container --}}


        {{-- Content Wrapper. Contains page content --}}
        <div class="content-wrapper">


            {{-- Breadcrumbs --}}
            {{-- @include('layout._breadcrumbs') --}}
            {{ Breadcrumbs::render() }}
            {{-- /.breadcrumbs --}}


            {{-- Main content --}}
            @yield('main')
            {{-- /.content --}}

        </div>

        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->



        {{-- footer --}}
        @include('layout._footer')
        {{-- /.footer --}}

    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    @stack('scripts')
    <script>
        window.addEventListener('sweetAlert',function(e){
			Swal.fire(e.detail);
		});


    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })

    </script>
</body>

</html>
