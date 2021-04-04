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

    <div class="container" id="">

        <div class="row mt-5 mb-5">
            <div class="col-12 col-md-10 col-lg-8 text-center mx-auto mb-5">

                <div class="py-5" id="">

                    <!-- Subtitle -->
                    <p class="my-0 pre_title">NEWS</p>

                    <!-- Title -->
                    <h2 class="display-2 text-center">Announcements</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="container">

        <!-- Grid row -->
        <div class="row mt-5">

            <!-- Grid column -->
            <div class="col-md-8 mb-4">

                <h1 class="font-weight-bold">{{ $news->title }}</h1>

                @if($news->document !== null)
                    <h3 class="dark-grey-text">There is a documents associated with this news announcement.</h3>

                    <div class="text-center" id="">
                        <a href="{{ $news->document }}" class="btn btn-outline-dark-green" target="_blank">Download Document</a>
                    </div>
                @endif

                <div class="card my-4">
                    <img src="{{ asset('/storage/images/' . $news->image) }}" class="img-fluid" alt="">
                </div>

                <p align="justify">{{ $news->news_body !== null ? $news->news_body : 'There is no text associated with this news announcement' }}</p>

                @if($news->link != '')
                    <h3 class="dark-grey-text">There is a web link associated with this news announcement. Click on the link below to check it out.</h3>

                    <div class="" id="">
                        <a href="{{ $news->link }}" class="btn btn-outline-orange" target="_blank">Web Link</a>
                    </div>
                @endif

                {{--<h4 class="text-center font-weight-bold mb-3">Share this article</h4>--}}
                {{--<ul class="list-unstyled list-inline text-center">--}}
                    {{--<li class="list-inline-item"><a><i class="fab fa-facebook-f fa-lg px-2 text-primary"></i></a></li>--}}
                    {{--<li class="list-inline-item"><a><i class="fab fa-twitter fa-lg px-2 text-info"></i></a></li>--}}
                    {{--<li class="list-inline-item"><a><i class="far fa-envelope fa-lg px-2 text-default"></i></a></li>--}}
                {{--</ul>--}}
            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-4 mb-4">

                <section class="magazine-section mb-5">

                    <h5 class="font-weight-bold text-center mb-4 pb-2">The newest articles</h5>

                    <!-- Grid row -->
                    <div class="row">

                        <!-- Grid column -->
                        <div class="col-md-12">

                            @foreach($articles as $article)

                                @php $created_at_date = new Carbon\Carbon($article->created_at); @endphp

                                <!-- Small news -->
                                <div class="single-news mb-4">

                                    <!-- Grid row -->
                                    <div class="row">

                                        <!-- Grid column -->
                                        <div class="col-md-3">

                                            <!--Image-->
                                            <div class="view overlay rounded z-depth-1 mb-4">
                                                <img class="img-fluid" src="{{ asset('/storage/images/' . $article->image) }}" alt="Sample image">
                                                <a>
                                                    <div class="mask rgba-white-slight"></div>
                                                </a>
                                            </div>

                                        </div>
                                        <!-- Grid column -->

                                        <!-- Grid column -->
                                        <div class="col-md-9">

                                            <!-- Excerpt -->
                                            <p class="font-weight-bold dark-grey-text">{{ $created_at_date->format('F d, Y') }}</p>
                                            <div class="d-flex justify-content-between">
                                                <div class="col-11 text-truncate pl-0 mb-3">
                                                    <a href="#!" class="dark-grey-text">{{ $article->title }}</a>
                                                </div>
                                                <a><i class="fas fa-angle-right"></i></a>
                                            </div>

                                        </div>
                                        <!-- Grid column -->

                                    </div>
                                    <!-- Grid row -->

                                </div>
                                <!-- Small news -->
                            @endforeach

                        </div>
                        <!--Grid column-->

                    </div>
                    <!-- Grid row -->

                </section>

            </div>
            <!-- Grid column -->

        </div>
        <!-- Grid row -->

    </div>
@endsection