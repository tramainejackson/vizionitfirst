@extends('layouts.app')

@section('content')

    <div class="container" id="clients">

        <div class="row mt-5 mb-5">
            <div class="col-12 col-md-8 text-center mx-auto mb-5">

                <div class="py-5" id="">

                    <!-- Subtitle -->
                    <p class="my-0 pre_title">The Team</p>

                    <!-- Title -->
                    <h2 class="display-2 text-center">Members</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid" id="">

            @if($members->count() > 0)

                @foreach($members as $member)

                    <div class="row my-5" id="">
                        <div class="col-8 col-lg-4 mx-auto text-center" id="">
                            {{-- Member Avatar--}}
                            {{--<img src="{{ asset('storage/images/' . $member->avatar) }}" alt="Member Image" width="300">--}}

                            <div class="" id="">
                                <h5 class="pre_title">{{ $member->title }} </h5>
                                <h1 class="card-title">{{ $member->name }} </h1>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-5" id="">
                        <div class="col-11 col-md-9 mx-auto" id="">
                            <p class="card-text">{!! nl2br($member->bio) !!}</p>
                        </div>
                    </div>

                    @if(!$loop->last)
                        <hr/>
                    @endif

                @endforeach

            @else

                <div class="row" id="">
                    <div class="d-flex justify-content-center align-items-center col-9 mx-auto" id="">
                        <h1>You Do Not Have Any Current Members Listed</h1>
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