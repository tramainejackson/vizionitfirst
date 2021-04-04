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

    <div class="container-fluid" id="services">

        <div class="row mt-5 mb-5">

            <div class="col-12 col-xl-10 mx-auto">

                @if($articles->count() > 0)

                    @foreach($articles as $article)

                        @php $created_at_date = new Carbon\Carbon($article->created_at); @endphp

                        <!-- Grid row -->
                        <div class="row">

                            <!--Grid column-->
                            <div class="col-10 mb-4 mx-auto">
                                <!--Card-->
                                <div class="card">

                                    <!--Card image-->
                                    <div class="view overlay">
                                        <img src="{{ asset('/storage/images/' . $article->image) }}" class="card-img-top" alt="">
                                        <a href="{{ route('news.show', $article->id) }}">
                                            <div class="mask rgba-white-slight waves-effect waves-light"></div>
                                        </a>
                                    </div>
                                    <!--/.Card image-->

                                    <!--Card content-->
                                    <div class="card-body">
                                        <!--Title-->
                                        <h4 class="card-title"><strong>{{ $article->title }}</strong></h4>
                                        <hr>
                                        <!--Text-->
                                        <p class="card-text mb-3">{{ $article->news_body }}</p>
                                        <p class="font-small font-weight-bold dark-grey-text mb-1"><i class="fas fa-calendar-day"></i>&nbsp;{{ $created_at_date->format('F d, Y') }}</p>
                                        <p class="text-right mb-0 font-small font-weight-bold"><a class="" href="{{ route('news.show', $article->id) }}">See More <i class="fas fa-angle-right"></i></a></p>
                                    </div>
                                    <!--/.Card content-->

                                </div>
                                <!--/.Card-->

                            </div>
                            <!--Grid column-->
                        </div>
                        <!-- Grid row -->

                    @endforeach

                @else

                    <div class="row" id="">
                        <div class="d-flex justify-content-center align-items-center col-12 mx-auto" id="">
                            <h1>No Current News Articles Listed</h1>
                        </div>
                    </div>

                @endif
            </div>
        </div>
    </div>

@endsection