@extends('layouts.app')

@section('content')

    <div class="container" id="services">

        <div class="row mt-5 mb-5">
            <div class="col-12 col-md-10 col-lg-8 text-center mx-auto mb-5">

                <div class="py-5" id="">

                    <!-- Subtitle -->
                    <p class="my-0 pre_title">SERVICES</p>

                    <!-- Title -->
                    <h2 class="display-2 text-center">Work with clients to<br/>determine the<br/>following</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid" id="services">

        <div class="row mt-5 mb-5">

            <div class="col-12 mt-3 mb-4">

                <div class="mt-5">
                    <h1 class="text-center h1"><span>Services</span></h1>
                </div>

            </div>

            <div class="col-12 col-xl-10 mx-auto">
                <!-- Grid row -->
                <div class="row">

                    @foreach($services as $service)

                        <div class="col-12 col-sm-6 col-md-4 col-xl-4 my-2">

                            <div class="mb-3 mx-auto" id="">
                                <hr/>
                            </div>

                            <!-- Title -->
                            <h6 class="pre_title">{{ $service->title }}</h6>

                            <div class="text-left">
                                <p class="coolText2 my-3">{{ $service->service_content }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
                <!-- Grid row -->
            </div>
        </div>
    </div>

@endsection