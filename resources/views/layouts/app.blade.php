<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>R P Management Firm</title>

    <!-- Styles -->
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="{{ asset('css/mdb.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body class="hidden-sn white-skin">

    <!-- Loading spinner to be added when form being submitted -->
    @include('modals.loading_spinner')

    <!-- Redirect messages -->
    @if(session('status'))
        @section('additional_scripts')
            <script type="text/javascript">
                toastr.success("{{ session('status') }}", "", {showMethod: 'slideDown'});
            </script>
        @endsection
    @endif

    <div id="app" class="mt-2 pt-5">

        <!--navigation-->
        @include('content_parts.navigation')
        <!--/.navigation-->

        <!--***********************************************
        ******************* Main Content ******************
        ************************************************-->

        @yield('content')

    </div>

    <!-- Footer -->
    @include('content_parts.footer')
    <!-- Footer -->

    <!-- Scripts -->
    <!-- JQuery -->
    <script type="text/javascript" src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="{{ asset('js/popper.min.js') }}"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="{{ asset('js/mdb.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/myjs.js') }}"></script>

    @yield('additional_scripts')

</body>
</html>
