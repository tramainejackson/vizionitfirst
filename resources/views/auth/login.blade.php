@extends('layouts.app')

@section('content')

    {{--Add Jumbotron--}}
    @include('content_parts.jumbotron')

    <div class="container">

        <div class="row my-5">

            <div class="col-12 col-lg-10 mx-auto mb-5">

                <!-- Material form login -->
                <!-- Form -->
                <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}

                    <h3 class="font-weight-bold my-4 pb-2 text-center dark-grey-text">Log In</h3>

                    <div class="md-form{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="label control-label">E-Mail Address</label>

                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="md-form{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password" class="label control-label">Password</label>

                        <input id="password" type="password" class="form-control" name="password" required>

                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <div class="col" id="">

                            <!-- Remember me -->
                            {{--<div class="custom-control custom-checkbox">--}}
                                {{--<label class="custom-control-label" for="defaultLoginFormRemember"></label>--}}

                                {{--<input type="checkbox" class="custom-control-input" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me--}}
                            {{--</div>--}}
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-outline-info btn-rounded my-4 waves-effect">Log In</button>
                        </div>

                        <div class="form-group">
                            <div class="col" id="">
                                <small id="passwordHelpBlock" class="form-text text-center blue-text">
                                    <a href="{{ route('password.request') }}">Recover Password</a>
                                </small>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- Form -->
                <!-- Material form login -->
            </div>
        </div>
    </div>

@endsection
