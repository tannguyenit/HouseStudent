@extends('layouts.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <main class="site-main" role="main">
                <div class="error-404-page text-center">
                    <h1>Oh oh! Page not found.</h1>
                    <p>
                        We're sorry, but the page you are looking for doesn't exist.
                        <br> You can search your topic using the box below or return to the homepage.
                    </p>
                    <a class="btn btn-link" href="{{ action('HomeController@home') }}">Back to Homepage</a>
                </div>
            </main>
        </div>
    </div>
@endsection
