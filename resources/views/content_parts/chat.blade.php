<div class="row" id="consultation">

    <div class="col-12 pt-5 text-center" id="">
        <h1 class="h1 mt-5">Let's Chat</h1>
    </div>

    <div class="col-12 col-md-6 text-center mx-auto" id="">
        <p>Use the form below to contact us regarding your inquiry. Please be as detailed as possible. You may also email or call us to make set up a call.</p>
    </div>

    <div class="w-100 my-3" id=""></div>

    <div class="col-12 col-md-10 mx-auto" id="">
        <!--  Form chat -->
        <div class="card">

            <!--Card content-->
            <div class="card-body px-lg-5 pt-0">

                <!-- Form -->
                <form action="{{ route('messages.store') }}" method="POST" class="text-center" style="color: #757575;">
                    {{ csrf_field() }}

                    <!-- Name -->
                    <div class="md-form">
                        <div class="form-row" id="">
                            <div class="col" id="">
                                <input type="text" name="first_name" id="materialLoginFormPassword" class="form-control" value="{{ old('first_name') }}" {{ $errors->has('first_name') ? 'autofocus' : '' }}>
                                <label for="materialLoginFormPassword">First Name</label>

                                @if ($errors->has('first_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col" id="">
                                <input type="text" name="last_name" id="materialLoginFormPassword" class="form-control" value="{{ old('last_name') }}" {{ $errors->has('last_name') ? 'autofocus' : ''}}>
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
                        <input type="email" name="email" id="materialLoginFormEmail" class="form-control" value="{{ old('email') }}" {{ $errors->has('last_name') ? 'email' : ''}}>
                        <label for="materialLoginFormEmail">E-mail</label>

                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>

                    <!-- Phone -->
                    <div class="md-form">
                        <input type="text" name="phone" id="materialLoginFormEmail" class="form-control" value="{{ old('phone') }}" {{ $errors->has('phone') ? 'autofocus' : ''}}>
                        <label for="materialLoginFormEmail">Phone (Optional)</label>

                        @if ($errors->has('phone'))
                            <span class="help-block">
                                <strong>{{ $errors->first('phone') }}</strong>
                            </span>
                        @endif
                    </div>

                    <!-- Message -->
                    <div class="md-form my-5">
                        <textarea name="message" id="form21" class="md-textarea form-control" rows="4" {{ $errors->has('message') ? 'autofocus' : ''}}>{{ old('message') }}</textarea>
                        <label for="materialLoginFormEmail">How Can We Help</label>

                        @if ($errors->has('message'))
                            <span class="help-block">
                                <strong>{{ $errors->first('message') }}</strong>
                            </span>
                        @endif
                    </div>

                    <!-- Sign in button -->
                    <button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit" name="chat" value="true">Submit</button>

                </form>
                <!-- Form -->
            </div>
        </div>
        <!-- Form Chat -->
    </div>
</div>