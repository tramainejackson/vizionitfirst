@extends('layouts.app')

@section('additional_styles')
    <style>
        /* Required for full background image */

        html,
        body,
        .view {
            height: 100%;
        }

        @media (max-width: 799px) {
            html,
            body,
            .view {
                height: 1100px;
            }
        }
        @media (min-width: 800px) {
            html,
            body,
            .view {
                min-height: 1000px;
            }
        }
        @media (min-width: 992px) {
            html,
            body,
            .view {
                min-height: 1000px;
            }
        }

    </style>
@endsection

@section('content')

    <!-- Full Page Intro -->
    <div class="view" style="background-image: url({{ asset('/storage/images/photo12.png') }}); background-repeat: no-repeat; background-size: cover; background-position: inherit;">
        <!-- Mask & flexbox options-->
        <div class="mask rgba-black-strong d-flex justify-content-center align-items-center">
            <!-- Content -->
            <div class="container">
                <!--Grid row-->
                <div class="row pt-lg-5 mt-lg-5">
                    <!--Grid column-->
                    <div class="col-12 col-md-10 col-lg-5 col-xl-5 mb-4 mr-md-5 mx-auto">
                        <!--Form-->
                        <div class="card wow fadeInRight" data-wow-delay="0.3s">
                            <div class="card-body z-depth-2">
                                <!--Header-->
                                <div class="text-center">
                                    <h3 class="dark-grey-text">
                                        <strong>Come Talk To Us:</strong>
                                    </h3>
                                    <hr>
                                </div>
                                <!--Body-->
                                <div class="md-form">
                                    <i class="fa fa-user prefix grey-text"></i>

                                    <input type="text" name="name" id="form_name" class="form-control" value="{{ old('name') }}" {{ $errors->has('name') ? 'autofocus' : ''}}>
                                    <label for="form_name">Name</label>

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="md-form">
                                    <i class="fa fa-envelope prefix grey-text"></i>

                                    <input type="email" name="email" id="form_email" class="form-control" value="{{ old('email') }}" {{ $errors->has('email') ? 'email' : ''}}>
                                    <label for="form_email">E-mail</label>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <!--Textarea with icon prefix-->
                                <div class="md-form">
                                    <i class="fa fa-pencil-alt prefix grey-text"></i>

                                    <textarea name="message" id="form_message" class="md-textarea form-control" rows="4" {{ $errors->has('message') ? 'autofocus' : ''}}>{{ old('message') }}</textarea>
                                    <label for="form_message">How Can We Help</label>

                                    @if ($errors->has('message'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('message') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="text-center mt-3">
                                    <button class="btn btn-indigo">Send</button>
                                </div>
                            </div>
                        </div>
                        <!--/.Form-->
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-12 col-md-10 col-lg-6 mb-5 mt-lg-0 ml-lg-0 ml-md-5 mt-5 white-text text-center text-lg-left wow fadeInLeft pl-lg-5" data-wow-delay="0.3s">
                        <div class="" id="">
                            <h4 class="h4 h4-responsive font-weight-bold text-underline" style="font-size: xx-large;">Address</h4>
                            <p class="mb-0" style="font-size: x-large;">{{ $settings->address }}</p>
                            <p class="mb-0" style="font-size: x-large;">{{ $settings->city . ', ' . $settings->state . ' ' . $settings->zip }}</p>
                            <p class="mb-4 pb-2" style="font-size: x-large;">United States</p>
                        </div>

                        <div class="" id="">
                            <h4 class="h4 h4-responsive font-weight-bold text-underline" style="font-size: xx-large;">Phone</h4>
                            <p class="mb-4 pb-2" style="font-size: x-large;">{{ $settings->concat_phone() != null ? $settings->concat_phone() : 'No Phone Number' }}</p>
                        </div>

                        <div class="" id="">
                            <h4 class="h4 h4-responsive font-weight-bold text-underline" style="font-size: xx-large;">Email</h4>
                            <p style="font-size: x-large;">{{ $settings->email != null ? $settings->email : 'No Email Address' }}</p>
                        </div>
                    </div>
                    <!--Grid column-->
                </div>
                <!--Grid row-->
            </div>
            <!-- Content -->
        </div>
        <!-- Mask & flexbox options-->
    </div>
    <!-- Full Page Intro -->

@endsection