@extends('layouts.app')

@section('content')

    {{--Add Jumbotron--}}
    @section('jumbotron_title', 'Our Events')
    @include('content_parts.jumbotron')

    <div class="container" id="clients">

        <div class="row mt-5 mb-5">
            <div class="col-12 col-md-8 text-center mx-auto mb-5">

                <div class="py-5" id="">

                    <!-- Subtitle -->
                    <p class="my-0 pre_title">NEWS</p>

                    <!-- Title -->
                    <h2 class="display-2 text-center">Events</h2>

                    <a class="btn btn-rounded btn-info" href="{{ route('news.create') }}">Create New Event/News Article</a>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid" id="">

        <div class="row" id="">

            <div class="col-12 col-lg-10 col-xl-7 mx-auto" id="">

                @if($allArticles->count() > 0)

                    <!--Section: Content-->
                    <div class="dark-grey-text mb-4">

                        <!-- Section heading -->
                        <h2 class="text-center font-weight-bold mb-4 pb-2">Events/Posts</h2>

                        @foreach($allArticles as $article)

                            <!-- Grid row -->
                            <div class="row align-items-center">

                                <!-- Grid column -->
                                <div class="col-12 col-md-6 col-xl-5 mx-auto">

                                    <!-- Featured image -->
                                    <div class="view overlay rounded z-depth-2 mb-lg-0 mb-4">
                                        <img class="img-fluid" src="{{ asset('/storage/images/' . $article->image) }}" alt="Article image">
                                        <a href="{{ route('news.show', $article->id) }}">
                                            <div class="mask rgba-white-slight"></div>
                                        </a>
                                    </div>

                                </div>
                                <!-- Grid column -->

                                <!-- Grid column -->
                                <div class="col-12 col-md-6 col-xl-7 mx-auto">

                                    <!-- Category -->
                                    @if($article->document != '')
                                        <a href="{{ $article->document }}" class="green-text" target="_blank">
                                            <h6 class="font-weight-bold mb-3 d-inline-block"><i class="fas fa-download"></i> Download Document</h6>
                                        </a>
                                    @endif

                                    @if($article->link != '')
                                        <a href="{{ $article->link }}" class="blue-text{{ $article->document != '' ? ' ml-4' : '' }}" id="" target="_blank">
                                            <h6 class="font-weight-bold mb-3 d-inline-block"><i class="fas fa-blog"></i> Web Link</h6>
                                        </a>
                                    @endif

                                    <!-- Post title -->
                                    <h4 class="font-weight-bold mb-3"><strong>{{ $article->title }}</strong></h4>
                                    <!-- Excerpt -->
                                    <p>{{ $article->news_body != '' ? $article->news_body : 'Article Has No Text' }}</p>
                                    <!-- Post data -->
                                    <p class="text-muted"><strong>Added</strong>, {{ $article->created_at->format('m/d/Y') }}</p>
                                    <!-- Read more button -->
                                    <a href="{{ route('news.show', $article->id) }}" class="btn btn-success btn-md btn-rounded mx-0">Read more</a>

                                </div>
                                <!-- Grid column -->

                            </div>
                            <!-- Grid row -->

                            @if(!$loop->last)
                                <hr/>
                            @endif

                        @endforeach

                    </div>
                    <!--Section: Content-->

                @else

                    <div class="d-flex justify-content-center align-items-center col" id="">
                        <h1>You Do Not Have Any Current News Articles Listed</h1>
                    </div>

                @endif
            </div>
        </div>
    </div>
@endsection