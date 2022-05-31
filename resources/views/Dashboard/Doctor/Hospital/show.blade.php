@extends('layouts.doctor')

@section('content')
    <div class="back-to-top"></div>

    <div class="page-section">
        <div class="container">
            <div class="card">
                    <div class="row gutters-sm">


                        <div class="col-md-4 mb-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex flex-column align-items-center text-center">
                                        <img src="https://cdn.vectorstock.com/i/1000x1000/46/46/people-clinic-logo-design-stethoscope-vector-28654646.webp" alt="Admin"
                                            class="rounded-circle" width="150">
                                        <div class="mt-3">
                                            <h4>{{ Auth::user()->Hospital->name }}</h4>
                                            <p class="text-secondary mb-1"></p>
                                            <p class="text-muted font-size-sm">{{Auth::user()->Hospital->bio}}</p>
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
                                            {{ Auth::user()->Hospital->address }}
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Phone</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            {{ Auth::user()->Hospital->phone }}
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                            </div>
                            <!-- Carousel start -->


                            <!-- End of carousel -->
                        </div>
                    </div>
            </div>
            <!-- End of card -->

        </div>
    </div>
    </div>
@endsection
