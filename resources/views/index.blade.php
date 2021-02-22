@extends('layouts.app')

@section('content')

    <!-- Jumbotron -->
    <div class="jumbotron text-center white-text mx-0 mb-5" style="background-color: #081b33">

        <div class="py-5" id="">

            <!-- Subtitle -->
            <p class="my-0 red-text">SUSTAINABILITY STARTS WITH YOU</p>

            <!-- Title -->
            <h2 class="card-title display-2">R P Management Firm</h2>
        </div>
    </div>
    <!-- Jumbotron -->

    <div class="container" id="services">

        <div class="row mt-3 mb-5">

            <div class="col-12 col-lg-7 mb-4">
                <h1 class="h1">RPMF</h1>

                <p>R P Management Firm (RPMF) headquartered in West New York, New Jersey, is an independently owned company working with clientele in the sports and entertainment industry.
                    Whether you’re an athlete, singer or artist, we will work with you and bring you our experience and professionalism to meet your needs.<br/><br/>
                    Through partnerships with various charity organizations, R P Management Firm jointly helps promote their services that benefit good causes.<br/><br/>
                    Get in touch with us, or use the contact form at the bottom of this page to inquire whether our services are right for you.
                </p>
            </div>

            <div class="col-12 col-lg-1 mb-4"></div>

            <div class="col-12 col-lg-4 mb-4">
                <h1 class="h1">Contact</h1>

                <div class="" id="">
                    <p class="red-text mb-1"><i class="fas fa-map-marker"></i> Location</p>

                    <h3 class="h3 mb-3">West New York, NJ 07093</h3>
                </div>

                @if($settings->phone != null)
                    <div class="" id="">
                        <p class="red-text mb-1"><i class="fas fa-phone-square"></i> Call</p>

                        <h3 class="h3 mb-3">{{ $settings->phone }}</h3>
                    </div>
                @endif

                @if($settings->email != null)
                    <div class="" id="">
                        <p class="red-text mb-1"><i class="fas fa-reply"></i> Email</p>

                        <h3 class="h3 mb-3">{{ $settings->email }}</h3>
                    </div>
                @endif
            </div>
        </div>

        <div class="row mt-5 mb-5">

            <div class="col-12 mt-3 mb-4">

                <div class="mt-5">
                    <h1 class="text-left h1"><span>Services</span></h1>
                </div>

            </div>

            <div class="col-12 mx-auto">
                <!-- Grid row -->
                <div class="row">

                    @foreach($services as $service)

                        <div class="col-12 col-sm-6 col-md-4 col-xl-4 my-2">

                            <div class="mb-3 mx-auto" id="">
                                <hr/>
                            </div>

                            <!-- Title -->
                            <h3 class="red-text">{{ $service->title }}</h3>

                            <div class="text-left">
                                <p class="mb-4">{{ $service->service_content }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
                <!-- Grid row -->
            </div>
        </div>

        <div class="row">
            <div class="col-12 mx-auto" id="">
                <hr/>
            </div>
        </div>

        <div class="row">

            <!--Grid column-->
            <div class="col-12 col-md-6 text-center mx-auto mb-3">

                <h2 class="p-5 text-center">“You can only become truly accomplished at something you love.” </h2>
            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-12 text-center mx-auto mb-4">

                <p class="text-center red-text">— MAYA ANGELOU</p>

            </div>
            <!--Grid column-->
        </div>

        <div class="row">
            <div class="col-12 mx-auto" id="">
                <hr/>
            </div>
        </div>

        @include('content_parts.chat')

    </div>
@endsection