@extends('layouts.app')

@section('content')

    <div class="container" id="services">

        <div class="row mt-5 mb-5">
            <div class="col-12 col-md-8 text-center mx-auto mb-5">

                <div class="py-5" id="">

                    <!-- Subtitle -->
                    <p class="my-0 pre_title">Contact</p>

                    <!-- Title -->
                    <h2 class="display-2 text-center">Let's Chat</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="container fluid" id="chat">

        <div class="row mt-3 mb-5">

            <div class="col-12 col-lg-7 mb-4">
                <!--  Form login -->
                <div class="card">

                    <h5 class="card-header info-color white-text text-center py-4">
                        <strong>Talk To Me</strong>
                    </h5>

                    <!--Card content-->
                    <div class="card-body px-lg-5 pt-0">

                        <!-- Form -->
                        <form action="{{ route('messages.store') }}" method="POST" class="text-center" style="color: #757575;">
                            {{ csrf_field() }}

                            <!-- Name -->
                            <div class="md-form">
                                <div class="form-row" id="">
                                    <div class="col" id="">
                                        <input type="text" name="first_name" id="materialLoginFormPassword" class="form-control" value="{{ old('first_name') }}">
                                        <label for="materialLoginFormPassword">First Name</label>

                                        @if ($errors->has('first_name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('first_name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col" id="">
                                        <input type="text" name="last_name" id="materialLoginFormPassword" class="form-control" value="{{ old('last_name') }}">
                                        <label for="materialLoginFormPassword">Last Name</label>

                                        @if ($errors->has('last_name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('last_name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <!-- Email -->
                            <div class="md-form">
                                <input type="email" name="email" id="materialLoginFormEmail" class="form-control" value="{{ old('email') }}">
                                <label for="materialLoginFormEmail">E-mail</label>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <!-- Phone -->
                            <div class="md-form">
                                <input type="text" name="phone" id="materialLoginFormEmail" class="form-control" value="{{ old('phone') }}">
                                <label for="materialLoginFormEmail">Phone (Optional)</label>

                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <!-- Reason -->
                            <div class="md-form">
                                <div class="form-row" id="">
                                    <div class="col-12" id="">
                                        <p class="m-0 text-left font-weight-bold {{ $errors->has('reason') ? ' has-error' : '' }}">Reason for Inquiry</p>
                                    </div>
                                    <div class="col-12" id="">
                                        @foreach($message_reasons as $message_reason)
                                            <div class="form-check text-left">
                                                <input type="checkbox" name="reason[]" value="{{ $message_reason->reason }}" class="form-check-input" id="{{ $message_reason->reason }}">
                                                <label class="form-check-label" for="{{ $message_reason->reason }}">{{ $message_reason->reason }}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <!-- Message -->
                            <div class="md-form my-5">
                                <textarea name="message" id="form21" class="md-textarea form-control" rows="4">{{ old('message') }}</textarea>

                                <label for="materialLoginFormEmail">How Can We Help</label>

                                @if ($errors->has('message'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('message') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <!-- Sign in button -->
                            <button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit">Submit</button>

                        </form>
                        <!-- Form -->
                    </div>
                </div>
                <!-- Form login -->
            </div>

            <div class="col-1 mb-4"></div>

            <div class="col-12 col-lg-4 mb-4">
                <h1 class="h1 mb-4">Contact</h1>

                <div class="" id="">
                    <p class="pre_title mb-2"><i class="fas fa-map-marker"></i> Location</p>

                    <h3 class="h3 mb-3">West New York, NJ 07093</h3>
                </div>

                <div class="" id="">
                    <p class="pre_title mb-2">Office Hours</p>

                    <h3 class="h3 mb-0">Monday - Sunday</h3>
                    <h3 class="h3 mb-3">9AM - 9PM</h3>
                </div>

                @if($settings->phone != null || $settings->email != null)
                    <div class="" id="">
                        <p class="pre_title mb-2"><i class="fas fa-reply"></i> Contact</p>

                        @if($settings->phone != null)
                            <h3 class="h3 mb-0">{{ $settings->phone }}</h3>
                        @endif

                        @if($settings->email != null)
                            <h3 class="h3 mb-3">{{ $settings->email }}</h3>
                        @endif
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection