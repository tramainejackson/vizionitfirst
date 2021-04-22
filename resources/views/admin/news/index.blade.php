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

            <div class="col-12 col-lg-7" id="">

                @if($allArticles->count() > 0)

                    @foreach($allArticles as $article)

                        <div class="row my-5" id="">
                            <div class="col text-center" id="">
                                <a class="btn btn-outline-info" href="{{ route('news.edit', [$article->id]) }}">Edit Article</a>

                                <div class="" id="">
                                    <h5 class="card-title py-3">Article Title: {{ $article->title }} </h5>
                                </div>

                                @if($article->link != '')
                                    <div class="" id="">
                                        <a href="{{ $article->link }}" class="btn btn-outline-orange" target="_blank">Web Link</a>
                                    </div>
                                @endif

                                @if($article->document != '')
                                    <div class="" id="">
                                        <a href="{{ $article->document }}" class="btn btn-outline-dark-green" target="_blank">Download Document</a>
                                    </div>
                                @endif
                            </div>
                        </div>

                        @if(!$loop->last)
                            <hr/>
                        @endif

                    @endforeach

                @else

                    <div class="d-flex justify-content-center align-items-center col" id="">
                        <h1>You Do Not Have Any Current News Articles Listed</h1>
                    </div>

                @endif
            </div>
        </div>
    </div>
@endsection