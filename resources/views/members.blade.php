@extends('layouts.app')

@section('content')

    {{--Add Jumbotron--}}
    @include('content_parts.jumbotron')

    <div class="container-fluid">

        <div class="row" id="">

            <div class="col" id="">
                <!-- Content -->
                <h1 class="display-4 text-uppercase py-5 my-3 text-center">Board of Directors</h1>
            </div>
        </div>
    </div>

    <div class="container-fluid py-5" id="" style="background-color: aliceblue;">

        <div class="row row-cols-1 row-cols-lg-2" id="">

            @if($members->count() > 0)

                @foreach($members as $member)

                    @php $bioTextCount = strlen($member->bio); @endphp
                    @php $shortBio = str_limit(nl2br($member->bio), 500); @endphp
                    @php $fullBio = nl2br($member->bio); @endphp

                    <div class="col text-center pb-5" id="">

                        {{-- Member Avatar--}}
                        <img class="pb-3" src="{{ asset('/storage/images/' . $member->avatar) }}" alt="Member Image" style="max-width: 75%;">

                        <div class="text-left mx-auto" id="" style="max-width: 75%;">
                            <h1 class="card-title">{{ $member->name }}</h1>
                        </div>

                        @if($bioTextCount > 500)
                            <div class="text-left mx-auto shortBio" id="" style="max-width: 75%;">
                                <p class="card-text" style="font-size: 1.5rem;">{!! $shortBio !!}</p>
                            </div>
                        @endif

                        <div class="text-left mx-auto fullBio{{ $bioTextCount > 500 ? ' d-none' : '' }}" id="" style="max-width: 75%;">
                            <p class="card-text" style="font-size: 1.5rem;">{!! $fullBio !!}</p>
                        </div>

                        @if($bioTextCount > 500)
                            <div class="text-left mx-auto ml-0 mt-3" id="" style="max-width: 75%;">
                                <button class="btn btn-rounded btn-mdb-color readMoreLess">Read More</button>
                            </div>
                        @endif
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