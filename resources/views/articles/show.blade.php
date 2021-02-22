@extends('layouts.app')

@section('content')

    <div class="container" id="clients">

        <div class="row mt-5 mb-5">
            <div class="col-12 col-md-8 text-center mx-auto mb-5">

                <div class="py-5" id="">

                    <!-- Subtitle -->
                    <p class="my-0 pre_title">{{ $client->profession }}</p>

                    <!-- Title -->
                    <h2 class="display-2 text-center">{{ $client->full_name() }}</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="container fluid" id="">

        <div class="row my-5" id="">
            <div class="col-12 col-md-6 mx-auto text-center" id="">
                <p class="card-text">{!! nl2br($client->bio) !!}</p>
            </div>

            <div class="col-12 col-md-6 mx-auto" id="">

                <div id="mdb-lightbox-ui"></div>

                <div class="mdb-lightbox">

                    @foreach($client_images as $image)

                        <figure class="col-12 col-md-6 text-center">
                            <a href="{{ asset('storage/images/' . $image->file_name . '_lg.png') }}" data-size="1600x{{ $image->lg_height }}">
                                <img class="img-fluid" src="{{ asset('storage/images/' . $image->file_name .'_sm.png') }}" alt="Client Image Placeholder"/>
                            </a>
                        </figure>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection