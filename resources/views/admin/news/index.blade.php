@extends('layouts.app')

@section('content')

    <div class="container" id="clients">

        <div class="row mt-5 mb-5">
            <div class="col-12 col-md-8 text-center mx-auto mb-5">

                <div class="py-5" id="">

                    <!-- Subtitle -->
                    <p class="my-0 pre_title">NEWS</p>

                    <!-- Title -->
                    <h2 class="display-2 text-center">Announcements</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid" id="">

        <div class="row" id="">

            <div class="col-12 col-lg-5 mb-5" id="">

                <div class="card mb-5" id="">

                    <div class="card-body" id="">

                        <h3 class="card-title text-center mb-5">Create New Article</h3>

                        <form class="" method="POST" action="{{ route('news.store') }}" enctype="multipart/form-data">
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

                            <div class="col-md-12 mb-4">

                                <div class="md-form" id="">

                                    <!-- URL Link -->
                                    <input type="text" id="link" class="form-control" name='link' value='{{ old('link') }}' placeholder="Enter Link" {{ $errors->has('link') ? 'autofocus' : '' }}/>

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
                                            <input class="file-path validate" type="text" placeholder="Upload a Document">
                                        </div>
                                    </div>

                                    @if ($errors->has('document'))
                                        <span class="text-danger">{{ $errors->has('document') }}</span>
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

            <div class="col-12 col-lg-7" id="">

                @if($allArticles->count() > 0)

                    @foreach($allArticles as $article)

                        <div class="row my-5" id="">
                            <div class="col text-center" id="">
                                <a class="btn btn-outline-info" href="{{ route('news.edit', [$article->id]) }}">Edit Article</a>

                                <div class="" id="">
                                    <h5 class="card-title py-3">Article Title: {{ $article->title }} </h5>
                                </div>

                                @if($article->link != '')
                                    <div class="" id="">
                                        <a href="{{ $article->link }}" class="btn btn-outline-orange" target="_blank">Web Link</a>
                                    </div>
                                @endif

                                @if($article->document != '')
                                    <div class="" id="">
                                        <a href="{{ $article->document }}" class="btn btn-outline-dark-green" target="_blank">Download Document</a>
                                    </div>
                                @endif
                            </div>
                        </div>

                        @if(!$loop->last)
                            <hr/>
                        @endif

                    @endforeach

                @else

                    <div class="d-flex justify-content-center align-items-center col" id="">
                        <h1>You Do Not Have Any Current News Articles Listed</h1>
                    </div>

                @endif
            </div>
        </div>
    </div>
@endsection