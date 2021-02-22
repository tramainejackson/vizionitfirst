@extends('layouts.app')

@section('content')

    <div class="container-fluid">

        <div class="row my-5 pb-5" id="">

            <div class="col-8 mx-auto" id="">

                <!-- Back Button -->
                <a href="{{ route('services.index') }}" class="btn btn-lg btn-primary mb-4">All Services</a>

                <!--Section: Content-->
                <section class="text-center dark-grey-text mb-5">

                    <div class="card">
                        <div class="card-body rounded-top border-top p-5">

                            <!-- Section heading -->
                            <h3 class="font-weight-bold my-4">Edit Service</h3>

                            <form class="" method="POST" action="{{ route('services.update', [$service->id]) }}">

                                {{ method_field('PUT') }}
                                {{ csrf_field() }}

                                <div class="col-md-12 mb-4">

                                    <div class="md-form" id="">

                                        <!-- Title -->
                                        <input type="text" id="title" class="form-control" name='title' value='{{ old('title') ? old('title') : $service->title }}' placeholder="Enter Title">

                                        <label class="" for="title">Title</label>

                                        @if ($errors->has('title'))
                                            <span class="text-danger">Title cannot be empty</span>
                                        @endif

                                    </div>
                                </div>

                                <div class="col-md-12 my-5">

                                    <div class="md-form" id="">

                                        <!-- Service Content -->
                                        <textarea name="service_content" id="service_content" class="md-textarea form-control" rows="10">{{ old('service_content') ? old('service_content') : $service->service_content }}</textarea>

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
                                                <button type="button" class="btn activeYes showClient{{ $service->active == true ? ' btn-success active' : ' btn-blue-grey' }}">
                                                    <input type="checkbox" name="active" value="1" hidden {{ $service->active == true ? 'checked' : '' }} />Yes
                                                </button>
                                                <button type="button" class="btn activeNo showClient{{ $service->active == false ? ' btn-danger active' : ' btn-blue-grey' }}">
                                                    <input type="checkbox" name="active" value="0" {{ $service->active == false ? 'checked' : '' }} hidden />No
                                                </button>
                                            </div>
                                        </div>

                                        <label for="active">Active</label>
                                    </div>
                                </div>

                                <div class="col-md-12">

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-info btn-rounded">Update Service</button>
                                    </div>

                                </div>
                            </form>

                            <form class="position-absolute top right" method="POST" action="{{ route('services.destroy', [$service->id]) }}">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}

                                <button class="btn btn-danger mr-3 mt-3" type="submit">Delete Service</button>
                            </form>
                        </div>
                    </div>
                </section>
                <!--Section: Content-->
            </div>
        </div>
    </div>
@endsection