@extends('layouts.app')

@section('content')

    {{--Add Jumbotron--}}
    @include('content_parts.jumbotron')

    <div class="container-fluid">

        <div class="row row-cols-1 row-cols-lg-2" id="">

            <div class="col pt-5" id="" style="padding-bottom: 32%;">
                <div class="">
                    <!--Content-->
                    <h2 class="mb-3 text-center font-weight-bold display-3">Our Mission</h2>
                    <p style="font-size: 22px;">{{ $settings->mission_statement !== null ? $settings->mission_statement : 'No Mission Statement Entered Yet' }}</p>
                </div>
            </div>

            <div class="col pt-5 bg-light" id="" style="padding-bottom: 32%;">
                <div class="">
                    <!--Content-->
                    <h2 class="mb-3 text-center font-weight-bold display-3">About Us</h2>
                    <p style="font-size: 22px;">{{ $settings->about_us !== null ? $settings->about_us : 'No About Us Statement Entered Yet' }}</p>
                </div>
            </div>

            <div class="col position-relative" id="about_us_page_middle_image">
                <img class="w-100" src="{{ asset('/images/photo13.png') }}" alt="Orientation" />
            </div>
        </div>
    </div>

@endsection