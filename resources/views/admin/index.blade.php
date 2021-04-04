@extends('layouts.app')

@section('content')

    <div class="card card-image page_header z-depth-0" style="background-image: url({{ asset('/images/photo12.png') }}); background-position: 100% 0%;">

        <div class="text-white text-center rgba-black-strong pb-5 px-4 content-div">

            <div class="py-5">

                <!-- Content -->
                <h1 class="display-3">This Is Us</h1>
            </div>
        </div>
    </div>

    <div class="container-fluid">

        <div class="row my-5" id="">

            <div class="col-12" id="">
                <h2>Welcome Back {{ $admin->name }}</h2>
            </div>
        </div>

        <div class="row my-5" id="">

            <form class="w-100" action="{{ route('administrator.update', $settings->id) }}" method="POST">

                {{ method_field('PUT') }}
                {{ csrf_field() }}

                <div class="col-12 col-lg-10 my-3 mx-auto" id="">

                    <div class="card">

                        <div class="card-body">

                            <div class="card-text d-flex align-items-center justify-content-between" id="">
                                <h2 class="h2">Mission Statement</h2>

                                <button type="submit" class="btn btn-sm btn-mdb-color" value="">Update Mission Statement</button>
                            </div>

                            <div class="md-form">
                                <textarea name="mission_statement" type="text" class="form-control md-textarea" rows="4" placeholder="Enter Mission Statement">{{ $settings->mission_statement }}</textarea>

                                <label for="mission_statement">Mission Statement</label>

                                @if ($errors->has('mission_statement'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('mission_statement') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-10 my-3 mx-auto" id="">

                    <div class="card">

                        <div class="card-body">

                            <div class="card-text d-flex align-items-center justify-content-between" id="">
                                <h2 class="h2">About Us</h2>

                                <button type="submit" class="btn btn-sm btn-mdb-color" value="">Update About Us Statement</button>
                            </div>

                            <div class="md-form">
                                <textarea name="about_us" type="text" class="form-control md-textarea" rows="4" placeholder="Enter About Us Statment">{{ $settings->about_us }}</textarea>

                                <label for="about_us">About Us Statement</label>

                                @if ($errors->has('about_us'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('about_us') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-10 my-3 mx-auto" id="">

                    <div class="card">

                        <div class="card-body">

                            <form action="{{ route('administrator.update', $settings->id) }}" method="POST">

                                {{ method_field('PUT') }}
                                {{ csrf_field() }}

                                <div class="d-flex align-items-center justify-content-between" id="">
                                    <h2 class="h2">Settings</h2>

                                    <button type="submit" class="btn btn-sm btn-mdb-color" value="">Update Settings</button>
                                </div>

                                <div class="md-form">
                                    <input name="address" type="text" class="form-control" value="{{ $settings->address }}" placeholder="Enter Address">

                                    <label for="address">Address</label>

                                    @if ($errors->has('address'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="md-form">
                                    <input name="city" type="text" class="form-control" value="{{ $settings->city }}" placeholder="Enter City">

                                    <label for="city">City</label>
                                    @if ($errors->has('city'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="md-form">
                                    <input name="state" type="text" class="form-control" value="{{ $settings->state }}" placeholder="Select A State">

                                    <label for="state">State</label>

                                    @if ($errors->has('state'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('state') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="md-form">
                                    <input name="zip" type="number" class="form-control" value="{{ $settings->zip }}" placeholder="Enter Zip">

                                    <label for="zip">Zip</label>

                                    @if ($errors->has('zip'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('zip') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="md-form">
                                    <input name="email" type="email" class="form-control" value="{{ $settings->email }}" placeholder="Enter Email Address">

                                    <label for="email">Email Address</label>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="md-form">
                                    <input name="phone" type="text" class="form-control" value="{{ $settings->phone }}" placeholder="Enter Phone Number">

                                    <label for="phone">Phone</label>

                                    @if ($errors->has('phone'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection