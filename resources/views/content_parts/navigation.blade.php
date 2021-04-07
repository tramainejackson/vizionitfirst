@section('additional_scripts')
    <script type="text/javascript">
        $("body").on("click", ".donateBtn", function(e) {
            toastr.warning('Coming Soon!', '', {showDuration: 50000});
        });
    </script>
@endsection

<header>
    <!-- Navbar -->
    <nav class="navbar navbar-toggleable-md navbar-expand-lg bg-dark z-depth-0" id="vizion_it_first_nav" style="">
        <!-- Brand -->
        <a class="navbar-brand waves-effect d-lg-none" href="#" target="_blank">
            <img id="navbar_logo" src="{{ asset('/images/vizion_it_first_logo_lg.png') }}" alt="Logo">
        </a>

        <!-- Collapse -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon white-text"><i class="fas fa-align-justify"></i></span>
        </button>

        <!-- Links -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <!-- left -->
            <ul class="navbar-nav nav-flex-icons align-items-center justify-content-start flex-column flex-lg-row col-lg-4">

                @if(Auth::user())

                    <li class="nav-item" style="font-size: 1.5rem;">
                        <a class="nav-link waves-effect white-text" href="{{ route('administrator.index') }}">Admin</a>
                    </li>

                    <li class="nav-item" style="font-size: 1.5rem;">
                        <a class="nav-link waves-effect white-text" href="{{ route('news.index') }}">Events</a>
                    </li>

                    <li class="nav-item" style="font-size: 1.5rem;">
                        <a class="nav-link waves-effect white-text" href="{{ route('members.index') }}">Members</a>
                    </li>

                @else

                    <li class="nav-item dropdown" style="font-size: 1.5rem;">
                        <a class="nav-link dropdown-toggle white-text" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">About</a>

                        <div class="dropdown-menu bg-info" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item white-text" href="{{ route('about') }}">Our Mission</a>
                            <a class="dropdown-item white-text" href="{{ route('members.index') }}">The Team</a>
                            <a class="dropdown-item white-text" href="{{ route('contact_us') }}">Contact Us</a>
                        </div>
                    </li>

                    <li class="nav-item" style="font-size: 1.5rem;">
                        <a class="nav-link waves-effect white-text" href="{{ route('news.index') }}">Events/News</a>
                    </li>

                    <li class="nav-item" style="font-size: 1.5rem;">
                        <a class="nav-link waves-effect white-text" href="{{ route('login') }}">Login</a>
                    </li>
                @endif
            </ul>

            <!-- middle -->
            <ul class="navbar-nav d-none d-lg-flex col-lg-4">
                <li class="nav-item flex-fill text-center">
                    <a href="{{ route('home_index') }}" class="nav-link waves-effect text-center white-text coolText3" target="" style="font-size: 36px;">Vizion It First</a>
                </li>
            </ul>

            <!-- right -->
            <ul class="navbar-nav nav-flex-icons align-items-center justify-content-end col-12 col-lg-4">
                <li class="nav-item flex-fill">
                    <a href="#" class="nav-link waves-effect text-center text-lg-right" target="">
                        <button class="btn btn-lg btn-rounded btn-green mr-0 donateBtn" type="button">Donate</button>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- /.Navbar -->
</header>