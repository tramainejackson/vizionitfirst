@extends('layouts.app')

@section('additional_styles')
    <style>
    </style>
@endsection

@section('content')
    <div class="card card-image" style="background-image: url({{ asset('/images/photo12.png') }}); background-position: 100% 0%;">

        <div class="text-white text-center rgba-stylish-strong pb-5 px-4 content-div">

            <div class="py-5">

                <!-- Content -->
                <h5 class="h5 orange-text"><i class="fas fa-camera-retro"></i> Photography</h5>
                <h2 class="card-title h2 my-4 py-2">Jumbotron with image overlay</h2>
                <p class="mb-4 pb-2 px-md-5 mx-md-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur obcaecati vero aliquid libero doloribus ad, unde tempora maiores, ullam, modi qui quidem minima debitis perferendis vitae cumque et quo impedit.</p>
                <a class="btn peach-gradient"><i class="fas fa-clone left"></i> View project</a>

            </div>
        </div>
    </div>
@endsection