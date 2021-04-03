@extends('layouts.app')

@section('content')

    <div class="card card-image page_header z-depth-0" style="background-image: url({{ asset('/images/photo12.png') }}); background-position: 100% 0%;">

        <div class="text-white text-center rgba-black-strong pb-5 px-4 content-div">

            <div class="py-5">

                <!-- Content -->
                <h1 class="display-3">This Is Us</h1>
            </div>
        </div>
    </div>

    <div class="container-fluid">

        <div class="row row-cols-1 row-cols-lg-2" id="">

            <div class="col pt-5" id="" style="padding-bottom: 32%;">
                <div class="">
                    <!--Content-->
                    <h2 class="mb-3 text-center font-weight-bold display-3">Mission Statement</h2>
                    <p style="font-size: 22px;">
                        Every great business originates from a fantastic idea.  In 2018, R P Management Firm was formed to cater to the daily private lifestyles of upscale clientele in the athletic and entertainment industries.   RPMF understands the importance of managing the daily operations of home, business and public relation obligations and events.
                        RPMF postures its clients to have more free time to spend as they choose while maintaining and improving the legwork to keep life moving seamlessly.  RPMF also has endorsement deal opportunities it coordinates for its clients.
                        As my favorite poet once quoted, “My mission in life is not merely to survive, but to thrive; and to do so with some passion, some compassion, some humor, and some style.” – MAYA ANGELOU
                    </p>
                </div>
            </div>

            <div class="col pt-5 bg-light" id="" style="padding-bottom: 32%;">
                <div class="">
                    <!--Content-->
                    <h2 class="mb-3 text-center font-weight-bold display-3">About Us</h2>
                    <p style="font-size: 22px;">
                        Every great business originates from a fantastic idea.  In 2018, R P Management Firm was formed to cater to the daily private lifestyles of upscale clientele in the athletic and entertainment industries.   RPMF understands the importance of managing the daily operations of home, business and public relation obligations and events.
                        RPMF postures its clients to have more free time to spend as they choose while maintaining and improving the legwork to keep life moving seamlessly.  RPMF also has endorsement deal opportunities it coordinates for its clients.
                        As my favorite poet once quoted, “My mission in life is not merely to survive, but to thrive; and to do so with some passion, some compassion, some humor, and some style.” – MAYA ANGELOU
                    </p>
                </div>
            </div>

            <div class="col position-relative" id="about_us_page_middle_image">
                <img class="w-100" src="{{ asset('/images/photo13.png') }}" alt="Orientation" />
            </div>
        </div>
    </div>

@endsection