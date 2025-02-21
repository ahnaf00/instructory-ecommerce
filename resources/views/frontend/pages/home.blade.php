@extends('frontend.layout.master')

@section('frontendTitle')
    Home
@endsection

@section('frontend_content')

    @include('frontend.pages.widgets.slider')

    @include('frontend.pages.widgets.featured-area')

    @include('frontend.pages.widgets.count-down')

    @include('frontend.pages.widgets.best-seller')

    @include('frontend.pages.widgets.latest-products')

    @include('frontend.pages.widgets.testimonials')

@endsection
