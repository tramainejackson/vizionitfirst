@extends('layouts.app')

@section('content')

    <div class="card card-image page_header z-depth-0" style="background-image: url({{ asset('/images/photo12.png') }}); background-position: 100% 0%;">

        <div class="text-white text-center rgba-black-strong pb-5 px-4 content-div">

            <div class="py-5">

                <!-- Content -->
                <h1 class="display-3">The Team</h1>
            </div>
        </div>
    </div>

    <div class="container-fluid">

        <div class="row" id="">

            <div class="col" id="">
                <!-- Content -->
                <h1 class="display-4 text-uppercase py-5 my-3 text-center">Board of Directors</h1>
            </div>
        </div>
    </div>

    <div class="container-fluid py-5" id="" style="background-color: aliceblue;">

        <div class="row row-cols-1 row-cols-md-2" id="">

            @if($members->count() > 0)

                @foreach($members as $member)

                    <div class="col text-center pb-5" id="">

                        {{-- Member Avatar--}}
                        <img class="pb-3" src="{{ asset('/storage/images/' . $member->avatar) }}" alt="Member Image" style="max-width: 75%;">

                        <div class="text-left mx-auto" id="" style="max-width: 75%;">
                            <h1 class="card-title">{{ $member->name }}</h1>
                        </div>

                        <div class="text-left mx-auto " id="" style="max-width: 75%;">
                            <p class="card-text" style="font-size: 1.5rem;">{!! nl2br($member->bio) !!}</p>
                        </div>
                    </div>

                @endforeach

            @else

                <div class="d-flex justify-content-center align-items-center col-9 mx-auto" id="">
                    <h1>You Do Not Have Any Current Members Listed</h1>
                </div>

            @endif
        </div>
    </div>
@endsection