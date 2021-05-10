@extends('layouts.app')

@section('content')

    {{--Add Jumbotron--}}
    @section('jumbotron_title', 'Mission Of This Organization Is To Turn Dreams Into Reality')
    @include('content_parts.jumbotron')

    <div class="container-fluid">

        <div class="row row-cols-1" id="">

            <div class="col-12 col-md-10 col-lg-8 pt-5 mb-5 mx-auto" id="" style="">
                <div class="">
                    <!--Content-->
                    <h2 class="mb-3 text-center font-weight-bold display-3">A Message From Our Founder</h2>
                    <p style="font-size: 22px;">{{ $settings->mission_statement !== null ? $settings->mission_statement : 'No Mission Statement Entered Yet' }}</p>
                </div>
            </div>

            {{--<div class="col pt-5 bg-light" id="" style="padding-bottom: 32%;">--}}
                {{--<div class="">--}}
                    {{--<!--Content-->--}}
                    {{--<h2 class="mb-3 text-center font-weight-bold display-3">About Us</h2>--}}
                    {{--<p style="font-size: 22px;">{{ $settings->about_us !== null ? $settings->about_us : 'No About Us Statement Entered Yet' }}</p>--}}
                {{--</div>--}}
            {{--</div>--}}

            <div class="col text-center mb-5" id="about_us_page_middle_image">
                <img class="w-75 mx-auto" src="{{ asset('/images/photo13.png') }}" alt="Orientation" />
            </div>
        </div>
    </div>

@endsection