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

        <div class="row mt-5 mb-5">
            <div class="col-12 col-md-8 text-center mx-auto mb-5">

                <div class="py-5" id="">

                    <!-- Subtitle -->
                    <p class="my-0 pre_title">The Team</p>

                    <!-- Title -->
                    <h2 class="display-2 text-center">Members</h2>

                    <a class="btn btn-rounded btn-info" href="{{ route('members.create') }}">Create New Member</a>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid" id="">

        <div class="row" id="">

            <div class="col-12 col-lg" id="">

                @if($allMembers->count() > 0)

                    @foreach($allMembers as $member)

                        @php

                            $member_image = '';
                            $member->avatar != null ? $member_image = $member->avatar : $member_image = 'default';

                            // Check if file exist
                            $img_file = Storage::disk('public')->exists('images/' . $member_image);

                            if($img_file) {
                                $img_file = $member_image;
                            } else {
                                $img_file = 'default.png';
                            }

                        @endphp

                        <div class="row my-5" id="">
                            <div class="col text-center" id="">
                                <img src="{{ asset('storage/images/' . $img_file) }}" alt="Member Image" width="300">

                                <div class="" id="">
                                    <h5 class="card-title">{{ $member->name }} </h5>
                                </div>

                                <div class="" id="">
                                    <a class="btn btn-outline-info" href="{{ route('members.edit', [$member->id]) }}">Edit Member Info</a>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-5" id="">
                            <div class="col-9 mx-auto" id="">
                                <p class="card-text">{!! nl2br($member->bio) !!}</p>
                            </div>
                        </div>

                        @if(!$loop->last)
                            <hr/>
                        @endif

                    @endforeach

                @else

                    <div class="d-flex justify-content-center align-items-center col-9 mx-auto" id="">
                        <h1>You Do Not Have Any Current Members Listed</h1>
                    </div>

                @endif
            </div>
        </div>
    </div>
@endsection