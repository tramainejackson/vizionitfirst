<!-- Footer -->
<footer class="page-footer font-small blue-grey lighten-5">

    <!-- Footer Links -->
    <div class="container pt-5">

        <!-- Grid row -->
        <div class="row justify-content-between mt-3 dark-grey-text">

            <!-- Grid column -->
            <div class="col-12 col-md-4 mb-4">

                <!-- Content -->
                <h6 class="text-uppercase font-weight-bold">{{ config('app.name') }}</h6>
                <hr class="teal accent-3 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                <p>Giving teens hope and a more promising and brighter future.</p>

            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-12 col-md-3 pl-md-5 mx-auto mb-4">

                <!-- Links -->
                <h6 class="text-uppercase font-weight-bold">Useful links</h6>
                <hr class="teal accent-3 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">

                @if(Auth::user())
                    <p>
                        <a class="dark-grey-text" href="{{ route('administrator.index') }}">Admin</a>
                    </p>
                    <p>
                        <a class="dark-grey-text" href="{{ route('news.index') }}">Events</a>
                    </p>
                    <p>
                        <a class="dark-grey-text" href="{{ route('members.index') }}">Members</a>
                    </p>
                    <p>
                        <a class="dark-grey-text" href="{{ route('messages.index') }}">Messages</a>
                    </p>

                    <p>
                        <a href="{{ route('logout') }}" class="dark-grey-text" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log Out</a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </p>
                @else
                    <p>
                        <a class="dark-grey-text" href="{{ route('about') }}">Our Mission</a>
                    </p>
                    <p>
                        <a class="dark-grey-text" href="{{ route('members.index') }}">The Team</a>
                    </p>
                    <p>
                        <a class="dark-grey-text" href="{{ route('news.index') }}">Events/News</a>
                    </p>
                    <p>
                        <a class="dark-grey-text" href="{{ route('contact_us') }}">Contact Us</a>
                    </p>
                @endif
            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-12 col-md mx-auto mb-md-0 mb-4">

                <!-- Links -->
                <h6 class="text-uppercase font-weight-bold">Contact</h6>
                <hr class="teal accent-3 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">

                @if($settings->city != null && $settings->state != null && $settings->zip != null)
                    <p><i class="fas fa-home mr-3 dark-grey-text"></i> {{ $settings->city . ', ' . $settings->state . ' ' . $settings->zip }}</p>
                @endif

                @if($settings->email != null)
                    <p><i class="fas fa-envelope mr-3 dark-grey-text"></i> <a class="dark-grey-text" href="mailto:{{ $settings->email }}">{{ $settings->email }}</a></p>
                @endif

                @if($settings->concat_phone() != null)
                    <p><i class="fas fa-phone mr-3 dark-grey-text"></i> {{ $settings->concat_phone() }}</p>
                @endif

            </div>
            <!-- Grid column -->

        </div>
        <!-- Grid row -->

    </div>
    <!-- Footer Links -->

    <!-- Copyright -->
    <div class="footer-copyright text-center py-3 unique-color-dark">© 2021 Copyright:
        <span class=""> Tramaine Jackson Tech LLC</span>
    </div>
    <!-- Copyright -->

</footer>
