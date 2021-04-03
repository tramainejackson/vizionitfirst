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

    <div class="container" id="clients">

        <div class="row mt-5">
            <div class="col-12 col-md-8 text-center mx-auto mb-5">

                <div class="pt-5" id="">

                    <!-- Subtitle -->
                    <p class="my-0 pre_title">The Team</p>

                    <!-- Title -->
                    <h2 class="display-2 text-center">Members</h2>

                    <a class="btn btn-rounded btn-info" href="{{ route('members.index') }}">All Member</a>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">

        <div class="row my-5" id="">

            <div class="col-12 col-lg-9 my-5 mx-auto" id="">

                <div class="card mb-5" id="">

                    <div class="card-body" id="">

                        <h3 class="card-title text-center mb-5">Create New Team Member</h3>

                        <form class="" method="POST" action="{{ route('members.store') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="col-md-12 mb-4">

                                <div class="md-form" id="">

                                    <!-- Name -->
                                    <input type="text" id="name" class="form-control" name='name' value='{{ old('name') }}' placeholder="Enter Full Name" {{ $errors->has('name') ? 'autofocus' : '' }}/>

                                    <label class="" for="name">Name</label>

                                    @if ($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif

                                </div>
                            </div>

                            <div class="col-md-12 mb-4">

                                <div class="md-form" id="">

                                    <!-- Title -->
                                    <input type="text" id="title" class="form-control" name='title' value='{{ old('title') }}' placeholder="Enter Title" {{ $errors->has('title') ? 'autofocus' : '' }}/>

                                    <label class="" for="title">Title</label>

                                    @if ($errors->has('title'))
                                        <span class="text-danger">Title cannot be empty</span>
                                    @endif

                                </div>
                            </div>

                            <div class="col-md-12 mb-4">

                                <div class="md-form" id="">

                                    <!-- Email -->
                                    <input type="email" id="email" class="form-control" name='email' value='{{ old('email') }}' placeholder="Enter Email Address" {{ $errors->has('email') ? 'autofocus' : '' }}/>

                                    <label class="" for="email">Email</label>

                                    @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif

                                </div>
                            </div>

                            <div class="col-md-12 mb-4">

                                <div class="md-form" id="">

                                    <!-- Phone -->
                                    <input type="text" id="phone" class="form-control" name='phone' value='{{ old('phone') }}' placeholder="Enter Phone Number" {{ $errors->has('phone') ? 'autofocus' : '' }}/>

                                    <label class="" for="phone">Phone</label>

                                    @if ($errors->has('phone'))
                                        <span class="text-danger">{{ $errors->first('phone') }}</span>
                                    @endif

                                </div>
                            </div>

                            <div class="col-md-12 mb-4">

                                <div class="md-form" id="">
                                    <!-- Bio -->
                                    <textarea id="bio" class="md-textarea form-control" name='bio' placeholder="Enter Member Bio" rows="10">{{ old('bio') ? old('bio') : '' }}</textarea>

                                    <label for="bio">Bio</label>

                                    @if ($errors->has('bio'))
                                        <span class="text-danger">{{ $errors->first('bio') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-12 my-5">

                                <div class="md-form" id="">

                                    <div class="form-inline pt-5 ml-0" id="">
                                        <div class="btn-group">
                                            <button type="button" class="btn activeYes showClient{{ old('active') == true ? ' btn-success active' : ' btn-blue-grey' }}">
                                                <input type="checkbox" name="active" value="1" hidden {{ old('active') == true ? 'checked' : '' }} />Yes
                                            </button>
                                            <button type="button" class="btn activeNo showClient{{ old('active') == false ? ' btn-danger active' : ' btn-blue-grey' }}">
                                                <input type="checkbox" name="active" value="0" {{ old('active') == false ? 'checked' : '' }} hidden />No
                                            </button>
                                        </div>
                                    </div>

                                    <label for="active">Active</label>
                                </div>
                            </div>

                            <div class="col-md-12">

                                <div class="text-center">
                                    <button type="submit" class="btn btn-info btn-rounded">Create New Team Member</button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection