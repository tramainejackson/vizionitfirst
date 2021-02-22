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

        <div class="row" id="">

            <div class="col-12 col-lg-5 mb-5" id="">

                <div class="card mb-5">

                    <div class="card-body rounded-top border-top">

                        <!-- Section heading -->
                        <h3 class="font-weight-bold my-4">Create New Client</h3>

                        <form class="" method="POST" action="{{ route('clients.store') }}">

                            {{ csrf_field() }}

                            <div class="col-md-12">

                                <div class="row" id="">

                                    <div class="col-md-6 mb-4">

                                        <div class="md-form" id="">
                                            <!-- Name -->
                                            <input type="text" id="first_name" class="form-control" name='first_name' value='{{ old('first_name') ? old('first_name') : '' }}' placeholder="Enter First Name" />

                                            <label class="" for="first_name">First Name</label>

                                            @if ($errors->has('first_name'))
                                                <span class="text-danger">First Name cannot be empty</span>
                                            @endif
                                        </div>

                                    </div>

                                    <div class="col-md-6 mb-4">

                                        <div class="md-form" id="">
                                            <!-- Name -->
                                            <input type="text" id="last_name" class="form-control" name='last_name' value='{{ old('last_name') ? old('last_name') : '' }}' placeholder="Enter Last Name">

                                            <label class="" for="last_name">Last Name</label>

                                            @if ($errors->has('last_name'))
                                                <span class="text-danger">Last Name cannot be empty</span>
                                            @endif

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 mb-4">

                                <div class="md-form" id="">

                                    <!-- Email -->
                                    <input type="email" id="email" class="form-control" name='email' value='{{ old('email') ? old('email') : '' }}' placeholder="Enter Email Address">

                                    <label class="" for="email">Email Address</label>

                                    @if ($errors->has('email'))
                                        <span class="text-danger">Email Address cannot be empty</span>
                                    @endif

                                </div>
                            </div>

                            <div class="col-md-12 mb-4">

                                <div class="md-form" id="">
                                    <!-- Phone -->
                                    <input type="number" id="phone" class="form-control" name='phone' value='{{ old('phone') ? old('phone') : '' }}' placeholder="Enter Phone Number">

                                    <label class="" for="phone">Phone</label>

                                    @if ($errors->has('phone'))
                                        <span class="text-danger">{{ $errors->first('phone') }}</span>
                                    @endif

                                </div>
                            </div>

                            <div class="col-md-12 mb-4">

                                <div class="md-form" id="">

                                    <!-- Phone -->
                                    <input type="text" id="profession" class="form-control" name='profession' value='{{ old('profession') ? old('profession') : '' }}' placeholder="Enter Client Profession">

                                    <label class="" for="profession">Profession</label>

                                    @if ($errors->has('profession'))
                                        <span class="text-danger">Profession Cannot Be Empty</span>
                                    @endif

                                </div>
                            </div>

                            <div class="col-md-12 my-5">

                                <div class="md-form" id="">

                                    <!-- Bio -->
                                    <textarea name="bio" id="bio" class="md-textarea form-control" rows="10">{{ old('bio') ? old('bio') : '' }}</textarea>

                                    <label for="bio">Client Bio</label>

                                    @if ($errors->has('bio'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('bio') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-12 my-5">

                                <div class="md-form" id="">

                                    <div class="form-inline pt-5 ml-0" id="">
                                        <div class="btn-group">
                                            <button type="button" class="btn activeYes showClient{{ old('show_client') == true ? ' btn-success active' : ' btn-blue-grey' }}">
                                                <input type="checkbox" name="show_client" value="1" hidden {{ old('show_client') == true ? 'checked' : '' }} />Yes
                                            </button>
                                            <button type="button" class="btn activeNo showClient{{ old('show_client') == false ? ' btn-danger active' : ' btn-blue-grey' }}">
                                                <input type="checkbox" name="show_client" value="0" {{ old('show_client') == false ? 'checked' : '' }} hidden />No
                                            </button>
                                        </div>
                                    </div>

                                    <label for="show_client">Show Client</label>
                                </div>
                            </div>

                            <div class="col-md-12">

                                <div class="text-center">
                                    <button type="submit" class="btn btn-info btn-rounded">Create New Client</button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-7" id="">

                @if($allClients->count() > 0)

                    @foreach($allClients as $client)

                        @php

                            $client_title = '';

                            if($client->profession != '') {
                                $client_title .= $client->full_name() . ' - ' . $client->profession;
                            } else {
                                $client_title .= $client->full_name();
                            }

                        @endphp

                        <div class="row my-5" id="">
                            <div class="col text-center" id="">
                                <div class="" id="">
                                    <a class="btn btn-outline-info" href="{{ route('clients.edit', [$client->id]) }}">Edit Client Info</a>
                                </div>

                                <img src="{{ asset('storage/images/' . $client->avatar) }}" alt="Client Image" width="300">

                                <div class="" id="">
                                    <h5 class="card-title">{{ $client_title }} </h5>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-5" id="">
                            <div class="col-11 col-md-9 mx-auto" id="">
                                <p class="card-text">{!! nl2br($client->bio) !!}</p>
                            </div>
                        </div>

                        @if(!$loop->last)
                            <hr/>
                        @endif

                    @endforeach

                @else

                    <div class="d-flex justify-content-center align-items-center col-9 mx-auto" id="">
                        <h1>You Do Not Have Any Current Clients Listed</h1>
                    </div>

                @endif
            </div>
        </div>
    </div>
@endsection