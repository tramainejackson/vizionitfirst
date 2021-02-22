@extends('layouts.app')

@section('content')

    <div class="container-fluid">

        <div class="row my-5 pb-5" id="">

            <div class="col-12 col-lg-8 mx-auto" id="">

                <!-- Back Button -->
                <a href="{{ route('clients.index') }}" class="btn btn-lg btn-primary mb-4">All Clients</a>

                <!--Section: Content-->
                <section class="text-center dark-grey-text mb-5">

                    <div class="card">

                        <div class="card-body rounded-top border-top p-lg-5 p-2">

                            <form class="" id="client_update_form" method="POST" action="{{ route('clients.update', [$client->id]) }}" enctype="multipart/form-data">

                                {{ method_field('PUT') }}
                                {{ csrf_field() }}

                                <!-- Client Default Image -->
                                <div class="row memberImg mb-3">
                                    <div class="view mx-auto" id="">
                                        <img class="hoverable" src="{{ asset('storage/images/' . $client->avatar) }}" alt="Member Image" width="300">

                                        <div class="mask d-flex justify-content-center">
                                            <button type="button" class="btn align-self-end m-0 p-1 white">Change Image</button>
                                            <input type="file" class="hidden" name="avatar" hidden />
                                        </div>
                                    </div>
                                </div>

                                <!-- Section heading -->
                                <h3 class="font-weight-bold my-4">Edit Client</h3>

                                <div class="col-md-12">

                                    <div class="row" id="">

                                        <div class="col-md-6 mb-4">

                                            <div class="md-form" id="">
                                                <!-- Name -->
                                                <input type="text" id="first_name" class="form-control" name='first_name' value='{{ old('first_name') ? old('first_name') : $client->first_name }}' placeholder="Enter First Name" />

                                                <label class="" for="first_name">First Name</label>

                                                @if ($errors->has('first_name'))
                                                    <span class="text-danger">First Name cannot be empty</span>
                                                @endif
                                            </div>

                                        </div>

                                        <div class="col-md-6 mb-4">

                                            <div class="md-form" id="">
                                                <!-- Name -->
                                                <input type="text" id="last_name" class="form-control" name='last_name' value='{{ old('last_name') ? old('last_name') : $client->last_name }}' placeholder="Enter Last Name">

                                                <label class="" for="last_name">Last Name</label>

                                                @if ($errors->has('last_name'))
                                                    <span class="text-danger">Last Name cannot be empty</span>
                                                @endif

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 mb-4">

                                    <div class="md-form" id="">

                                        <!-- Email -->
                                        <input type="email" id="email" class="form-control" name='email' value='{{ old('email') ? old('email') : $client->email }}' placeholder="Enter Email Address">

                                        <label class="" for="email">Email Address</label>

                                        @if ($errors->has('email'))
                                            <span class="text-danger">Email Address cannot be empty</span>
                                        @endif

                                    </div>
                                </div>

                                <div class="col-md-12 mb-4">

                                    <div class="md-form" id="">
                                        <!-- Phone -->
                                        <input type="number" id="phone" class="form-control" name='phone' value='{{ old('phone') ? old('phone') : $client->phone }}' placeholder="Enter Phone Number">

                                        <label class="" for="phone">Phone</label>

                                        @if ($errors->has('phone'))
                                            <span class="text-danger">{{ $errors->first('phone') }}</span>
                                        @endif

                                    </div>
                                </div>

                                <div class="col-md-12 mb-4">

                                    <div class="md-form" id="">

                                        <!-- Phone -->
                                        <input type="text" id="profession" class="form-control" name='profession' value='{{ old('profession') ? old('profession') : $client->profession }}' placeholder="Enter Client Profession">

                                        <label class="" for="profession">Profession</label>

                                        @if ($errors->has('profession'))
                                            <span class="text-danger">Profession Cannot Be Empty</span>
                                        @endif

                                    </div>
                                </div>

                                <div class="col-md-12 my-5">

                                    <div class="md-form" id="">

                                        <!-- Bio -->
                                        <textarea name="bio" id="bio" class="md-textarea form-control" rows="10">{{ old('bio') ? old('bio') : $client->bio }}</textarea>

                                        <label for="bio">Client Bio</label>

                                        @if ($errors->has('bio'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('bio') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-12 my-5">

                                    <div class="md-form" id="">

                                        <div class="form-inline pt-5 ml-0" id="">
                                            <div class="btn-group">
                                                <button type="button" class="btn activeYes showClient{{ $client->show_client == true ? ' btn-success active' : ' btn-blue-grey' }}">
                                                    <input type="checkbox" name="show_client" value="1" hidden {{ $client->show_client == true ? 'checked' : '' }} />Yes
                                                </button>
                                                <button type="button" class="btn activeNo showClient{{ $client->show_client == false ? ' btn-danger active' : ' btn-blue-grey' }}">
                                                    <input type="checkbox" name="show_client" value="0" {{ $client->show_client == false ? 'checked' : '' }} hidden />No
                                                </button>
                                            </div>
                                        </div>

                                        <label for="show_client">Show Client</label>
                                    </div>
                                </div>
                                <div class="form-block mediaBlock">
                                    <div class="col-12" id="">
                                        <h2 class="my-4">Client Images</h2>
                                    </div>

                                    <div class="col-12" id="">
                                        <div class="md-form">

                                            <div class="file-field">
                                                <div class="btn btn-primary btn-sm float-left">
                                                    <span>Choose files</span>
                                                    <input type="file" name="media[]" id="upload_photo_input" class="custom-file-input" value="" multiple />
                                                </div>
                                                <div class="file-path-wrapper">
                                                    <input class="file-path validate" type="text" placeholder="Upload one or more files">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="uploadsView">

                                        <div class="container-fluid">
                                            <div class="row"></div>
                                        </div>
                                        <h2 class="text-light invisible">Preview Uploads</h2>
                                    </div>

                                    @if($client->images->isNotEmpty())
                                        <div class="container-fluid my-4">
                                            <div class="row">
                                                <div class="col">
                                                    <h3 class="text-center">Pictures</h3>
                                                </div>
                                            </div>
                                            <div class="row">
                                                @foreach($client->images as $media)
                                                    <div class="col-12 col-md-6 col-lg-4 deletePropImages">
                                                        <div class="form-check">
                                                            <input type="checkbox" name="remove_image[]" id="filledInCheckbox{{$loop->iteration}}" class="form-check-input filled-in" value="{{ $media->id }}" />
                                                            <label class="form-check-label" for="filledInCheckbox{{$loop->iteration}}"></label>
                                                        </div>

                                                        <div class="view">
                                                            <img src="{{ asset('storage/images/' . $media->file_name . '_sm.' . $media->file_ext) }}" class="img-fluid img-thumbnail media-modal-item mw-100 mx-auto" />
                                                            <div class="mask flex-center rgba-black-strong invisible" style="">
                                                                <p class="white-text">Remove</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    @else
                                        <div class="container-fluid my-4">
                                            <div class="row">
                                                <div class="col">
                                                    <h3 class="text-center">No Pictures Added For the Client</h3>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    <div class="col-12">

                                        <div class="" id="">
                                            <button class="btn btn-danger btn-rounded removeMediaBtn" type="button" data-toggle="modal" data-target="#property_media" style="display:none;">Remove Selected Media Items</button>
                                        </div>

                                        <div class="text-center">
                                            <button type="submit" class="btn btn-info btn-rounded">Update Client Bio</button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <form class="position-absolute top right" method="POST" action="{{ route('clients.destroy', [$client->id]) }}">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}

                                <button class="btn btn-danger mr-3 mt-3" type="submit">Delete Client</button>
                            </form>
                        </div>
                    </div>
                </section>
                <!--Section: Content-->
            </div>
        </div>

        <div class="row">
            <div class="modal fade" id="property_media" role="dialog" aria-hidden="true" tabindex="1">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title" id="exampleModalLabel">Delete Property Media</h3>
                            <button type="button" class="close dismissProperyMedia" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body text-dark">
                            <div class="">
                                <h5 class="text-muted text-center">Are You Sure You Want To Remove These Items</h5>
                            </div>
                            <form action="{{ action('ClientController@remove_images') }}" method="POST" class="container-fluid">

                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}

                            <div class="row"></div>

                            <button class="btn-block btn btn-danger mt-4" type="submit">Remove Items</button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection