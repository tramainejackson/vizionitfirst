@extends('layouts.app')

@section('content')

    <div class="card card-image page_header z-depth-0" style="background-image: url({{ asset('/images/photo12.png') }}); background-position: 100% 0%;">

        <div class="text-white text-center rgba-black-strong pb-5 px-4 content-div">

            <div class="py-5">

                <!-- Content -->
                <h1 class="display-3"><i class="fab fa-paypal fa-2x"></i></h1>
            </div>
        </div>
    </div>

    <div class="container" id="clients">

        <div class="row mt-5 mb-5">
            <div class="col-12 col-md-auto text-center mx-auto mb-5">

                <div class="py-5" id="">

                    <!-- Title -->
                    <h2 class="display-2 text-center">Donations</h2>

                    <!-- Subtitle -->
                    <h3 class="h3 h3-responsive my-0">Here are all of the recorded donation transactions through PayPal</h3>
                    <h5 class="h5 h5-responsive text-muted"><span>Total Donations Amount: <i class="fas fa-dollar-sign green-text fa-xs align-text-top"></i><span class="green-text">{{ $donationsAmount }}</span></span></h5>
                    <h5 class="h5 h5-responsive text-muted"><span>Total Donations: </span>{{ $donationsCount }}</h5>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid" id="">

        <div class="row" id="">

            <div class="col-12 col-lg" id="">

                @if($donations->count() > 0)

                    <div class="row mb-5" id="">

                        @foreach($donations as $donation)

                            <div class="col-12 col-md-4 mx-auto text-center mb-4" id="">
                                <div class="" id="">
                                    <h1 class="donationAmount h1"><i class="fas fa-dollar-sign green-text fa-xs align-text-top"></i><span class="green-text">{{ $donation->amount }}</span></h1>
                                </div>

                                <div class="" id="">
                                    <h3 class="h3 donator">{{ $donation->full_name() }}</h3>
                                </div>

                                @if($donation->company_name != '')
                                    <div class="" id="">
                                        <h4 class="h4 font-small"><span class="font-weight-bold">Company Name: </span>{{ $donation->company_name }}</h4>
                                    </div>
                                @endif

                                <div class="text-muted" id="">
                                    <h4 class="h4"><button class='btn btn-sm p-2 btn-rounded btn-fb' type='button'><span class="font-weight-bold">Date: </span>{{ $donation->created_at->format('m-d-Y h:i:s A') }}</button></h4>
                                </div>
                            </div>

                        @endforeach

                    </div>

                    {{ $donations->links() }}

                @else

                    <div class="d-flex justify-content-center align-items-center col-9 mx-auto" id="">
                        <h1>You Do Not Have Any Current Members Listed</h1>
                    </div>

                @endif
            </div>
        </div>
    </div>
@endsection