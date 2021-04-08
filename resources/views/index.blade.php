@extends('layouts.app')

@section('additional_styles')
    <style type="text/css">
        #app, #intro {
            min-height: inherit;
        }
        nav.bg-dark {
            background-color: transparent !important;
        }
        ul.navbar-nav:nth-of-type(1) .nav-item, ul.navbar-nav:nth-of-type(2) .nav-item, a.navbar-brand {
            display: none !important;
        }
        #intro {
            height: 100%;
        }
        #home_index_image {
            max-width: 100%;
            padding-left: 10px;
            padding-right: 10px;
        }
        #enter_btn {
            top: 45%;
            opacity: 100%;
            background-color: darkgray;
            animation: enter_btn 10s ease 5.6s infinite, scale_btn 5s ease 0.5s;
        }

        @keyframes enter_btn {
            0%   {background-color:darkgray;-webkit-transform:scale(1);transform:scale(1)}
            14%  {-webkit-transform:scale(1.3);transform:scale(1.3)}
            28%  {-webkit-transform:scale(1);transform:scale(1)}
            42%  {-webkit-transform:scale(1.3);transform:scale(1.3)}
            70%  {background-color:darkslategrey;-webkit-transform:scale(1);transform:scale(1)}
            100% {background-color:darkgray;-webkit-transform:scale(1);transform:scale(1)}
        }

        @keyframes scale_btn {
            0% {
                top: 0%;
            }
            100% {
                top: 50%;
            }
        }

        @media only screen and (max-width: 599.99px) {
            #enter_btn {
                top: 20%
            }

            @keyframes scale_btn {
                0%   {top: 0%}
                100% {top: 20%;}
            }
        }

        @media only screen and (min-width: 600px) {
            #enter_btn {
                top: 20%
            }

            @keyframes scale_btn {
                0%   {top: 0%}
                100% {top: 20%;}
            }
        }

        @media only screen and (min-width: 768px) {
            #enter_btn {
                top: 45%
            }

            @keyframes scale_btn {
                0%   {top: 0%}
                100% {top: 45%;}
            }
        }
    </style>
@endsection

@section('additional_scripts')
    <script type="text/javascript">
        $('#social_media_sec, .page-footer').remove();
    </script>
@endsection

@section('content')
    <!--Mask-->
    <div id="intro" class="view">

        <div class="mask d-flex align-items-center justify-content-center">
            <img id="home_index_image" class="mx-auto mt-n5" src="{{ asset('/images/vizion_it_first_logo_lg.png') }}" alt="Logo">

            <a href="{{ route('about') }}" id="enter_btn" class="btn btn-lg btn-rounded white-text position-absolute z-depth-5" data-wow-delay="1.0s">Enter Site</a>
        </div>
    </div>
    <!--/.Mask-->
@endsection