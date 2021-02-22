@extends('layouts.app')

@section('content')

    <div class="container-fluid">

        <div class="row my-5" id="">

            <div class="col-12" id="">
                <h2>Welcome Back {{ $admin->name }}</h2>
            </div>
        </div>

        <div class="row" id="">

            <div class="col-12" id="">

                <!-- Card deck -->
                <div class="card-deck flex-column flex-lg-row">

                    <!-- Card -->
                    <div class="card mb-4">

                        <div class="card-body">

                            <h5 class="card-title d-flex align-items-center justify-content-between">Clients <a href="/clients" class="btn-floating btn-sm btn-warning"><i class="fas fa-edit"></i></a></h5>
                            <p class="card-text"><small class="text-muted">Total: {{ $clients->count() }}</small></p>
                        </div>
                    </div>

                    <!-- Card -->
                    <div class="card mb-4">

                        <div class="card-body">

                            <h5 class="card-title d-flex align-items-center justify-content-between">Messages <a href="/messages" class="btn-floating btn-sm btn-warning"><i class="fas fa-edit"></i></a></h5>
                            <p class="card-text"><small class="text-muted">Total: {{ $messages->count() }}</small></p>

                        </div>
                    </div>

                    <!-- Card -->
                    <div class="card mb-4">

                        <div class="card-body">

                            <h5 class="card-title d-flex align-items-center justify-content-between">Members <a href="/members" class="btn-floating btn-sm btn-warning"><i class="fas fa-edit"></i></a></h5>
                            <p class="card-text"><small class="text-muted">Total: {{ $members->count() }}</small></p>

                        </div>
                    </div>

                    <!-- Card -->
                    <div class="card mb-4">

                        <div class="card-body">

                            <h5 class="card-title d-flex align-items-center justify-content-between">Services <a href="/services" class="btn-floating btn-sm btn-warning"><i class="fas fa-edit"></i></a></h5>
                            <p class="card-text"><small class="text-muted">Total: {{ $services->count() }}</small></p>

                        </div>
                    </div>

                    <!-- Card -->
                    <div class="card mb-4">

                        <div class="card-body">

                            <h5 class="card-title d-flex align-items-center justify-content-between">News Articles <a href="/news" class="btn-floating btn-sm btn-warning"><i class="fas fa-edit"></i></a></h5>
                            <p class="card-text"><small class="text-muted">Total: {{ $articles->count() }}</small></p>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row my-5" id="">

            <div class="col-12 col-lg-8" id="">

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
        </div>
    </div>
@endsection