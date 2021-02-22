<header>
    <!-- Navbar -->
    <nav class="navbar fixed-top navbar-toggleable-md navbar-expand-lg">
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
            <ul class="navbar-nav nav-flex-icons mr-auto">
                <li class="nav-item">
                    <a href="#" class="nav-link waves-effect" target="">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link waves-effect" target="">
                        <i class="fab fa-twitter"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link waves-effect" target="">
                        <i class="fab fa-instagram"></i>
                    </a>
                </li>
            </ul>

            <!-- right -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link waves-effect{{ url()->current() == url('') ? ' active-nav-item': '' }}" href="{{ route('home_index') }}">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link waves-effect{{ substr_count(url()->current(),'services') > 0 ? ' active-nav-item': '' }}" href="{{ route('services.index') }}">Services</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link waves-effect{{ substr_count(url()->current(),'clients') > 0 ? ' active-nav-item': '' }}" href="{{ route('clients.index') }}">Clients</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link waves-effect{{ substr_count(url()->current(),'news') > 0 ? ' active-nav-item': '' }}" href="{{ route('news.index') }}">News</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link waves-effect{{ substr_count(url()->current(),'members') > 0 ? ' active-nav-item': '' }}" href="{{ route('members.index') }}">Members</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link waves-effect{{ substr_count(url()->current(),'contact') > 0 ? ' active-nav-item': '' }}" href="{{ route('contact_us') }}">Contact</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link waves-effect{{ substr_count(url()->current(),'about') > 0 ? ' active-nav-item': '' }}" href="{{ route('about') }}">About</a>
                </li>

                @if(Auth::user())
                    <li class="nav-item">
                        <a class="nav-link waves-effect{{ substr_count(url()->current(),'administrator') > 0 ? ' active-nav-item': '' }}" href="{{ route('administrator.index') }}">Admin</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link waves-effect{{ substr_count(url()->current(),'messages') > 0 ? ' active-nav-item': '' }}" href="{{ route('messages.index') }}">Messages</a>
                    </li>

                    <li class="nav-item d-none d-sm-flex">
                        <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link waves-effect" href="{{ route('login') }}">Login</a>
                    </li>
                @endif
            </ul>
        </div>
    </nav>
    <!-- /.Navbar -->
</header>