@extends('Front::layouts.master')

@section('content')
    <!-- start main one col -->
    <main id="main-body-one-col" class="main-body">

        <!-- start slideshow -->
        @include('Front::sections.slideshow')
        <!-- end slideshow -->


        <!-- start product lazy load -->
        @include('Front::sections.most-viewed')
        <!-- end product lazy load -->


        <!-- start ads section -->
        @include('Front::sections.center-ads')
        <!-- end ads section -->


        <!-- start product lazy load -->
        @include('Front::sections.special-offer')
        <!-- end product lazy load -->


        <!-- start ads section -->
        @include('Front::second-ads')
        <!-- end ads section -->


        <!-- start brand part-->
        @include('Front::sections.special-brands')
        <!-- end brand part-->

    </main>
    <!-- end main one col -->



    <!-- start body -->
    <section class="container-xxl body-container">
        <aside id="sidebar" class="sidebar">

        </aside>
        <main id="main-body" class="main-body">

        </main>
    </section>
    <!-- end body -->
@endsection
