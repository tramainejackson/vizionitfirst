@extends('layouts.app')

@section('content')

    <div class="container" id="services">

        <div class="row mt-5 mb-5">
            <div class="col-12 col-md-8 text-center mx-auto mb-5">

                <div class="py-5" id="">

                    <!-- Subtitle -->
                    <p class="my-0 pre_title">Our</p>

                    <!-- Title -->
                    <h2 class="display-2 text-center">Services</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid" id="">

        <div class="row" id="">

            <div class="col-12 col-lg-5 mb-5" id="">

                <div class="card mb-5" id="">

                    <div class="card-body" id="">

                        <h3 class="card-title text-center mb-5">Create New Service</h3>

                        <form class="" method="POST" action="{{ route('services.store') }}">
                            {{ csrf_field() }}

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

                            <div class="col-md-12 my-5">

                                <div class="md-form" id="">

                                    <!-- Service Content -->
                                    <textarea name="service_content" id="service_content" class="md-textarea form-control" rows="10"  {{ $errors->has('service_content') ? 'autofocus' : '' }}>{{ old('service_content') }}</textarea>

                                    <label for="bio">Service Content</label>

                                    @if ($errors->has('service_content'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('service_content') }}</strong>
                                        </span>
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
                                    <button type="submit" class="btn btn-info btn-rounded">Create New Service</button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-7" id="">

                @if($allServices->count() > 0)

                    @foreach($allServices as $service)

                        <div class="row mt-5 mb-3" id="">
                            <div class="col text-center" id="">
                                <a class="btn btn-outline-info" href="{{ route('services.edit', [$service->id]) }}">Edit Service Info</a>

                                <div class="" id="">
                                    <h5 class="card-title mb-0">{{ $service->title }}</h5>
                                    <p class="{{ $service->active == true ? 'green-text' : 'red-text' }}">{{ $service->active == true ? 'Active' : 'Inactive' }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-5" id="">
                            <div class="col-9 mx-auto" id="">
                                <p class="card-text">{!! nl2br($service->service_content) !!}</p>
                            </div>
                        </div>

                        @if(!$loop->last)
                            <hr/>
                        @endif

                    @endforeach

                @else

                    <div class="row" id="">
                        <div class="d-flex justify-content-center align-items-center col-9 mx-auto" id="">
                            <h1>You Do Not Have Any Current Services Listed</h1>
                        </div>
                    </div>

                @endif
            </div>
        </div>
    </div>
@endsection