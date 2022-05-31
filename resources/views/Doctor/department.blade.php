@extends('layouts.app')

@section('content')
    <div class="back-to-top"></div>

    <header>
        <nav class="navbar navbar-expand-lg navbar-light shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="#"><span class="text-primary">medical</span>-project</a>



                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupport"
                    aria-controls="navbarSupport" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

            </div> <!-- .container -->
        </nav>
    </header>
    <div class="page-hero bg-image overlay-dark" style="background-image: url(../../assets/img/bg_image_1.jpg);">
        <div class="hero-section">
            <div class="container text-center wow zoomIn">
                <span class="subhead">Let's make your life happier</span>
                <h1 class="display-4">Healthy Living</h1>

            </div>
        </div>
    </div>

    <div class="page-section">
        <div class="container">
            <h1 class="text-center mb-5 wow fadeInUp">{{ $prof->name }} Doctors</h1>
            <form action="#" method="get">
                <div class="container h-100">
                    <div class="d-flex justify-content-center h-100">
                        <div class="searchbar">
                            <input class="search_input" type="text" name="search" placeholder="Search..." value="{{ request()->search }}">
                            <button href="#" class="search_icon btn"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </div>
            </form>
            <div class="card">
                @foreach ($doctors as $doctor)
                    <div class="row gutters-sm">


                        <div class="col-md-4 mb-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex flex-column align-items-center text-center">
                                        <img src="{{ asset('uploads/doctor_uploads/doctor.png') }}" alt="Admin"
                                            class="rounded-circle" width="150">
                                        <div class="mt-3">
                                            <h4>{{ $doctor->name }}</h4>
                                            <p class="text-secondary mb-1">{{ $doctor->profession }}</p>
                                            <p class="text-muted font-size-sm">{{ $doctor->bio }}</p>
                                            <a href="{{route('appointments.meeting',$doctor->id)}}" class="btn btn-primary">Book a meeting</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Address</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            {{ $doctor->Address }}
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Degree</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            {{ $doctor->degree }}
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Phone</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            {{ $doctor->phone }}
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Mobile</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            (320)
                                            380-4539
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Address</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            Bay Area, San Francisco, CA
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                            </div>
                            <!-- Carousel start -->


                            <!-- End of carousel -->
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- End of card -->

        </div>
    </div>
    </div>





    <br>
    <br>
@endsection
