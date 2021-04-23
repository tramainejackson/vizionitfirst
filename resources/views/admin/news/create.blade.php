@extends('layouts.app')

@section('content')

    {{--Add Jumbotron--}}
    @section('jumbotron_title', 'Our Events')
    @include('content_parts.jumbotron')

    <div class="container" id="clients">

        <div class="row mt-5 mb-5">
            <div class="col-12 col-md-8 text-center mx-auto mb-5">

                <div class="py-5" id="">

                    <!-- Subtitle -->
                    <p class="my-0 pre_title">NEWS</p>

                    <!-- Title -->
                    <h2 class="display-2 text-center">Events</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">

        <div class="row pb-5" id="">

            <div class="col-12 col-lg-9 mb-5 mx-auto" id="">

                <div class="card mb-5" id="">

                    <div class="card-body" id="">

                        <h3 class="card-title text-center mb-5">Create New Article</h3>

                        <form class="" method="POST" action="{{ route('news.store') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <!-- Event Default Image -->
                            <div class="row memberImg mb-3">
                                <div class="view mx-auto" id="">
                                    <img class="hoverable" src="{{ asset('/storage/images/empty_article.png') }}" alt="Article Image" width="300">

                                    <div class="mask d-flex justify-content-center">
                                        <button type="button" class="btn align-self-end m-0 p-1 white">Change Image</button>
                                        <input type="file" class="hidden" name="article_image" hidden />
                                    </div>
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

                                    <!-- URL Link -->
                                    <input type="text" id="link" class="form-control" name='link' value='{{ old('link') }}' placeholder="Enter Link" {{ $errors->has('link') ? 'autofocus' : '' }}/>

                                    <label class="" for="link">Link</label>

                                    @if ($errors->has('link'))
                                        <span class="text-danger">{{ $errors->first('link') }}</span>
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
                                            <input class="file-path validate" type="text" placeholder="Upload a Document">
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

                            <div class="col-md-12 my-5">

                                <div id="date-picker-example" class="md-form md-outline input-with-post-icon datepicker">
                                    <input placeholder="Select date" type="text" id="upload_date" class="form-control grey-text" value="{{ $today->format('m/d/Y') }}" disabled>
                                    <label for="upload_date">Upload Date</label>
                                    <i class="fas fa-calendar input-prefix disabled grey-text" tabindex=0></i>
                                </div>
                            </div>

                            <div class="col-md-12">

                                <div class="text-center">
                                    <button type="submit" class="btn btn-info btn-rounded">Create New Article</button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection