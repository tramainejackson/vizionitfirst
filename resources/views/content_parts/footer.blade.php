<footer class="page-footer font-small unique-color-dark p-0">

    <!-- Footer Text -->
    <div class="container-fluid text-center text-md-left">

        <div class="row my-5">
            <div class="col-8 mx-auto" id="">
                <hr/>
            </div>
        </div>

        <div class="row mb-5">

            <!-- Grid column -->
            <div class="col-12 col-md-8 mx-auto">
                <ul class="nav nav-tabs mb-3">
                    <li class="nav-item">
                        <a class="nav-link{{ url()->current() == url('') ? ' active': '' }}" href="{{ route('home_index') }}">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link{{ substr_count(url()->current(),'services') > 0 ? ' active': '' }}" href="{{ route('services.index') }}">Services</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link{{ substr_count(url()->current(),'clients') > 0 ? ' active': '' }}" href="{{ route('clients.index') }}">Clients</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link{{ substr_count(url()->current(),'news') > 0 ? ' active': '' }}" href="{{ route('news.index') }}">News</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link{{ substr_count(url()->current(),'members') > 0 ? ' active': '' }}" href="{{ route('members.index') }}">Members</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link{{ substr_count(url()->current(),'contact') > 0 ? ' active': '' }}" href="{{ route('contact_us') }}">Contact</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link{{ substr_count(url()->current(),'about') > 0 ? ' active': '' }}" href="{{ route('about') }}">About</a>
                    </li>

                    @if(Auth::user())
                        <li class="nav-item">
                            <a class="nav-link{{ substr_count(url()->current(),'administrator') > 0 ? ' active': '' }}" href="{{ route('administrator.index') }}">Admin</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link{{ substr_count(url()->current(),'messages') > 0 ? ' active': '' }}" href="{{ route('messages.index') }}">Messages</a>
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
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                    @endif
                </ul>

                <ul class="contact-icons list-unstyled text-left">
                    <li>
                        <p class="m-0 p-0">West New York, New Jersey</p>
                    </li>

                    @php
                        $contact_str = '';

                        if($settings->phone != '') {
                            $contact_str .= $settings->phone;

                            if($settings->email != '') {
                                $contact_str .= ' | ' . $settings->email;
                            }
                        } else {
                            if($settings->email != '') {
                                $contact_str .= $settings->email;
                            } else {
                                $contact_str = null;
                            }
                        }
                    @endphp

                    @if($contact_str != null)
                        <li>
                            <p class="m-0 p-0">{{ $contact_str }}</p>
                        </li>
                    @endif
                </ul>
            </div>
            <!-- Grid column -->
        </div>

    </div>
    <!-- Footer Text -->

    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">© 2019 Copyright:
        <span class=""> Tramaine Jackson Tech LLC</span>
    </div>
    <!-- Copyright -->

</footer>
