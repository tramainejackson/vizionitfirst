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

    {{--<div class="container" id="services">--}}

        {{--<div class="row mt-5 mb-5">--}}
            {{--<div class="col-12 col-md-10 col-lg-8 text-center mx-auto mb-5">--}}

                {{--<div class="py-5" id="">--}}

                    {{--<!-- Subtitle -->--}}
                    {{--<p class="my-0 pre_title">NEWS</p>--}}

                    {{--<!-- Title -->--}}
                    {{--<h2 class="display-2 text-center">Announcements</h2>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}

    <div class="container-fluid" id="services">

        <div class="row mt-5 mb-5">

            <div class="col-12 col-xl-10 mx-auto">

                @if($articles->count() > 0)

                    @foreach($articles as $article)

                        @php $created_at_date = new Carbon\Carbon($article->created_at); @endphp

                        <!-- Grid row -->
                        <div class="row">

                            <div class="col-12 my-2 text-center">

                                <!-- Title -->
                                <h3 class="title"><a href="{{ $article->link }}" class="black-text">{{ $article->title }}</a></h3>

                                <p class=""><span class="text-muted">Upload Date: </span><span class="pre_title">{{ $created_at_date->format('F d, Y') }}</span></p>

                                <div class="">
                                    <p class="coolText2 my-3"><a href="{{ $article->link }}" class="black-text">Read More <i class="fas fa-angle-double-right"></i></a></p>
                                </div>

                                <div class="">
                                    <a href="{{ $article->document }}" class="btn btn-outline-green" download="{{ $article->title }}">Download Document</a>
                                </div>
                            </div>
                        </div>
                        <!-- Grid row -->

                        @if(!$loop->last)
                            <hr/>
                        @endif

                    @endforeach

                @else

                    <div class="row" id="">
                        <div class="d-flex justify-content-center align-items-center col-12 mx-auto" id="">
                            <h1>No Current News Articles Listed</h1>
                        </div>
                    </div>

                @endif
            </div>

            <div class="col-2 mx-auto">

                <div class="row" id="">
                    <div class="d-flex justify-content-center align-items-center col-12 mx-auto" id="">
                        <h1>No Current News Articles Listed</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection