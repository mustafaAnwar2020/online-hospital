@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="main-body">

            <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin"
                                    class="rounded-circle" width="150">
                                <div class="mt-3">
                                    <h4>{{ $user->name }}</h4>
                                    @can('clinic-create')
                                    <p class="text-secondary mb-1">{{ $user->profission->name }}</p>
                                    <p class="text-secondary mb-1">{{ $user->bio }}</p>
                                    @endcan

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
                                    <h6 class="mb-0">Email</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ Auth::user()->email }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Phone</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ Auth::user()->phone }}
                                </div>
                            </div>

                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Address</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ $user->Address }}
                                </div>
                            </div>
                            <hr>
                            @can('clinic-create')
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Degree</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ $user->degree }}
                                </div>
                            </div>
                            <hr>
                            @endcan
                            <div class="row">
                                <div class="col-sm-12">
                                    <a class="btn btn-info " target="__blank"
                                        href="{{route('user.edit')}}">Edit</a>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>

        </div>
    </div>
@endsection
