@extends('layouts.app')

@section('content')

    <div class="container" id="clients">

        <div class="row mt-5 mb-5">
            <div class="col-12 col-md-8 text-center mx-auto mb-5">

                <div class="py-5" id="">

                    <!-- Subtitle -->
                    <p class="my-0 pre_title">Our</p>

                    <!-- Title -->
                    <h2 class="display-2 text-center">Clients</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid" id="">

            @if($clients->count() > 0)

                @foreach($clients as $client)

                    @php

                        $client_image = '';
                        $client->avatar != '' ? $client_image = $client->avatar : $client_image = 'default';

                        // Check if file exist
                        $img_file = Storage::disk('public')->exists('images/' . $client_image);

                        if($img_file) {
                            $img_file = $client_image;
                        } else {
                            $img_file = 'default.png';
                        }

                    @endphp

                    <div class="row my-5" id="">
                        <div class="col-12 col-md-4 mx-auto text-center" id="">
                            <img src="{{ asset('storage/images/' . $img_file) }}" alt="Client Image" width="300">

                            <h5 class="card-title">{{ $client->full_name() . ' - ' . $client->profession }} </h5>
                        </div>
                    </div>

                    <div class="row mb-5" id="">

                        @if(strlen($client->bio) < 350)

                            <div class="col-9 mx-auto" id="">
                                <p class="card-text">{!! nl2br($client->bio) !!}</p>
                            </div>

                        @else

                            <div class="col-12 col-md-9 mx-auto" id="">
                                <p class="card-text">{!! str_limit(nl2br($client->bio), 350) !!}</p>

                                <a class='btn btn-outline-mdb-color' type='button' href="{{ route('clients.show', [$client->id]) }}">Read More</a>
                            </div>

                        @endif
                    </div>

                    @if(!$loop->last)
                        <hr/>
                    @endif

                @endforeach

            @else

                <div class="row" id="">
                    <div class="d-flex justify-content-center align-items-center col-9 mx-auto" id="">
                        <h1>No Current Clients Listed</h1>
                    </div>
                </div>

            @endif
        </div>

        <div class="row" id="">

            <div class="col-12 col-lg-8" id="">


            </div>
        </div>
    </div>
@endsection