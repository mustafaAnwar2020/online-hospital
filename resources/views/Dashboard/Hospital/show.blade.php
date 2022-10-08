@extends('layouts.app')

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
                                    <img src="https://cdn.vectorstock.com/i/1000x1000/46/46/people-clinic-logo-design-stethoscope-vector-28654646.webp"
                                        alt="Admin" class="rounded-circle" width="150">
                                    <div class="mt-3">
                                        <h4>{{ $hospital->name }}</h4>
                                        <p class="text-secondary mb-1"></p>
                                        <p class="text-muted font-size-sm">{{ $hospital->bio }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mt-3">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">

                                    <span class="text-secondary">Doctors</span>
                                </li>
                                @foreach ($hospital->user as $item)
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6 class="mb-0">{{$item->name}}</h6>
                                        <span class="text-secondary">{{$item->profission->name}}</span>
                                    </li>
                                @endforeach

                            </ul>
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
                                        {{ $hospital->address }}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Phone</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{ $hospital->phone }}
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
