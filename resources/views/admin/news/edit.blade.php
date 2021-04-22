@extends('layouts.app')

@section('content')

    {{--Add Jumbotron--}}
    @section('jumbotron_title', 'Our Events')
    @include('content_parts.jumbotron')

    <div class="container-fluid">

        <div class="row my-5 pb-5" id="">

            <div class="col-8 mx-auto" id="">

                <div class="d-flex align-items-center justify-content-between" id="">
                    <!-- Back Button -->
                    <a href="{{ route('news.index') }}" class="btn btn-lg btn-primary mb-4">All Events</a>

                    <!-- Create New Member Button -->
                    <a href="{{ route('members.create') }}" class="btn btn-lg btn-info mb-4">Create New Event</a>
                </div>

                <!--Section: Content-->
                <section class="text-center dark-grey-text mb-5">

                    <div class="card">
                        <div class="card-body rounded-top border-top p-5">

                            <!-- Section heading -->
                            <h3 class="font-weight-bold my-4">Edit News Article</h3>

                            <!-- Document -->
                            @if($news->document != null)
                                <a href="{{ $news->document }}" class="btn btn-outline-dark-green mt-n3" download="{{ $news->title }}">See Document</a>
                            @endif

                            <form class="" method="POST" action="{{ route('news.update', [$news->id]) }}" enctype="multipart/form-data">

                                {{ method_field('PUT') }}
                                {{ csrf_field() }}

                                <div class="col-md-12 mb-4">

                                    <div class="md-form" id="">

                                        <!-- Phone -->
                                        <input type="text" id="title" class="form-control" name='title' value='{{ old('title') ? old('title') : $news->title }}' placeholder="Enter Document Title">

                                        <label class="" for="title">Title</label>

                                        @if ($errors->has('title'))
                                            <span class="text-danger">Title Cannot Be Empty</span>
                                        @endif

                                    </div>
                                </div>

                                <div class="col-md-12 mb-4">

                                    <div class="md-form" id="">

                                        <!-- Email -->
                                        <input type="text" id="link" class="form-control" name='link' value='{{ old('link') ? old('email') : $news->link }}' placeholder="Enter Link URL">

                                        <label class="" for="link">Link</label>

                                        @if ($errors->has('link'))
                                            <span class="text-danger">{{ $errors->has('link') }}</span>
                                        @endif

                                    </div>
                                </div>

                                <div class="col-md-12 mb-4">

                                    <div class="md-form" id="">

                                        <!-- Document -->
                                        <div class="file-field">
                                            <a class="btn-floating btn-lg pink lighten-1 mt-0 float-left">
                                                <i class="fas fa-paperclip" aria-hidden="true"></i>
                                                <input type="file" id="document" class="" name='document' value='{{ old('document') }}' placeholder="Add Document" {{ $errors->has('document') ? 'autofocus' : '' }}/>
                                            </a>

                                            <div class="file-path-wrapper">
                                                <input class="file-path validate" type="text" placeholder="Upload a New Document">
                                            </div>
                                        </div>

                                        @if ($errors->has('document'))
                                            <span class="text-danger">{{ $errors->first('document') }}</span>
                                        @endif

                                    </div>
                                </div>

                                <div class="col-md-12 my-5">

                                    <div class="md-form" id="">

                                        <div class="form-inline pt-5 ml-0" id="">
                                            <div class="btn-group">
                                                <button type="button" class="btn activeYes showClient{{ $news->active == true ? ' btn-success active' : ' btn-blue-grey' }}">
                                                    <input type="checkbox" name="active" value="1" hidden {{ $news->active == true ? 'checked' : '' }} />Yes
                                                </button>
                                                <button type="button" class="btn activeNo showClient{{ $news->active == false ? ' btn-danger active' : ' btn-blue-grey' }}">
                                                    <input type="checkbox" name="active" value="0" {{ $news->active == false ? 'checked' : '' }} hidden />No
                                                </button>
                                            </div>
                                        </div>

                                        <label for="active">Show Article</label>
                                    </div>
                                </div>

                                <div class="col-4 my-5">

                                    <div id="date-picker-example" class="md-form md-outline input-with-post-icon datepicker">
                                        <input placeholder="Select date" type="text" id="upload_date" class="form-control grey-text" value="{{ $news->created_at->format('m/d/Y') }}" disabled>
                                        <label for="upload_date">Upload Date</label>
                                        <i class="fas fa-calendar input-prefix disabled grey-text" tabindex=0></i>
                                    </div>
                                </div>


                                <div class="col-md-12">

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-info btn-rounded">Update Article</button>
                                    </div>

                                </div>
                            </form>

                            <form class="position-absolute top right" method="POST" action="{{ route('news.destroy', [$news->id]) }}">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}

                                <button class="btn btn-danger mr-3 mt-3" type="submit">Delete Article</button>
                            </form>
                        </div>
                    </div>
                </section>
                <!--Section: Content-->
            </div>
        </div>
    </div>
@endsection