<header>
    <!-- Navbar -->
    <nav class="navbar navbar-toggleable-md navbar-expand-lg bg-dark z-depth-0 position-absolute" style="min-height: 75px;">
        <!-- Brand -->
        {{--<a class="navbar-brand waves-effect" href="https://mdbootstrap.com/docs/jquery/" target="_blank">--}}
            {{--<img src="https://mdbootstrap.com/wp-content/uploads/2018/06/logo-mdb-jquery-small.png" alt="Logo">--}}
        {{--</a>--}}

        <!-- Collapse -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"><i class="fas fa-align-justify"></i></span>
        </button>

        <!-- Links -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <!-- left -->
            <ul class="navbar-nav nav-flex-icons align-items-center justify-content-start col-4">

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
                            <a class="dropdown-item white-text" href="{{ route('about') }}">Contact Us</a>
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
            <ul class="navbar-nav col-4">
                <li class="nav-item flex-fill text-center">
                    <a href="{{ route('home_index') }}" class="nav-link waves-effect text-center white-text coolText3" target="" style="font-size: 36px;">Vizion It First</a>
                </li>
            </ul>

            <!-- right -->
            <ul class="navbar-nav nav-flex-icons align-items-center justify-content-end col-4">
                <li class="nav-item flex-fill">
                    <a href="#" class="nav-link waves-effect text-right" target="">
                        <button class="btn btn-lg btn-rounded btn-green mr-0" type="button">Donate</button>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- /.Navbar -->
</header>