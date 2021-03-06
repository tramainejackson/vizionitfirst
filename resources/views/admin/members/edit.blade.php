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

            <div class="col-8 mx-auto" id="">

                <div class="d-flex align-items-center justify-content-between" id="">
                    <!-- Back Button -->
                    <a href="{{ route('members.index') }}" class="btn btn-lg btn-primary mb-4">All Members</a>

                    <!-- Create New Member Button -->
                    <a href="{{ route('members.create') }}" class="btn btn-lg btn-info mb-4">Create New Member</a>
                </div>

                <!--Section: Content-->
                <section class="text-center dark-grey-text mb-5">

                    <div class="card">
                        <div class="card-body rounded-top border-top p-5">
                            
                            <form action="{{ action('MemberController@update' , [$member->id]) }}" method="POST" enctype="multipart/form-data">

                                {{ method_field('PUT') }}
                                {{ csrf_field() }}

                                <!-- Member Default Image -->
                                <div class="row memberImg mb-3">
                                    <div class="view mx-auto" id="">
                                        <img class="hoverable" src="{{ asset('/storage/images/' . $member->avatar) }}" alt="Member Image" width="300">

                                        <div class="mask d-flex justify-content-center">
                                            <button type="button" class="btn align-self-end m-0 p-1 white">Change Image</button>
                                            <input type="file" class="hidden" name="avatar" hidden />
                                        </div>
                                    </div>
                                </div>

                                <!-- Section heading -->
                                <h3 class="font-weight-bold my-4">Edit Member</h3>

                                <div class="row">
                                    <div class="col-md-6 mb-4">

                                        <div class="md-form" id="">
                                            <!-- Name -->
                                            <input type="text" id="title" class="form-control" name='title' value='{{ $member->title }}' placeholder="Enter Member Title">

                                            <label for="title">Title</label>

                                            @if ($errors->has('title'))
                                                <span class="text-danger">Title cannot be empty</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">

                                        <div class="md-form" id="">
                                            <!-- Name -->
                                            <input type="text" id="name" class="form-control" name='name' value='{{ $member->name }}' placeholder="Enter Member Name">

                                            <label for="name">Name</label>

                                            @if ($errors->has('name'))
                                                <span class="text-danger">Name cannot be empty</span>
                                            @endif

                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12 mb-4">

                                        <div class="md-form" id="">
                                            <!-- Email -->
                                            <input type="email" id="email" class="form-control" name='email' value='{{ $member->email }}' placeholder="Enter Email Address">

                                            <label for="email">Email</label>

                                            @if ($errors->has('email'))
                                                <span class="text-danger">Email Address cannot be empty</span>
                                            @endif

                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12 mb-4">

                                        <div class="md-form" id="">
                                            <!-- Bio -->
                                            <textarea id="bio" class="md-textarea form-control" name='bio' placeholder="Enter Member Bio" rows="10">{{ $member->bio }}</textarea>

                                            <label for="bio">Bio</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row" id="">

                                    <div class="col-md-12 mb-4">

                                        <div class="md-form" id="">

                                            <div class="form-inline pt-5 ml-0" id="">
                                                <div class="btn-group">
                                                    <button type="button" class="btn activeYes showClient{{ $member->active == true ? ' btn-success active' : ' btn-blue-grey' }}">
                                                        <input type="checkbox" name="active" value="1" hidden {{ $member->active == true ? 'checked' : '' }} />Yes
                                                    </button>
                                                    <button type="button" class="btn activeNo showClient{{ $member->active == false ? ' btn-danger active' : ' btn-blue-grey' }}">
                                                        <input type="checkbox" name="active" value="0" {{ $member->active == false ? 'checked' : '' }} hidden />No
                                                    </button>
                                                </div>
                                            </div>

                                            <label for="active">Active</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="text-center">
                                            <button type="submit" class="btn btn-info btn-rounded">Update Member Info</button>
                                        </div>

                                    </div>
                                </div>
                            </form>

                            <form class="position-absolute top right" method="POST" action="{{ route('members.destroy', [$member->id]) }}">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}

                                <button class="btn btn-danger mr-3 mt-3" type="submit">Delete Member</button>
                            </form>
                        </div>
                    </div>
                </section>
                <!--Section: Content-->
            </div>
        </div>
    </div>
@endsection