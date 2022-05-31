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
                <span class="subhead">Book a meeting with {{ $user->name }}</span>

            </div>
        </div>
    </div>
    <div class="card">

        <div class="page-section">
            <div class="container">
                <div class="card-body">

                    <table class="table table-responsive-sm table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Appointment date</th>
                                <th>Finish time</th>
                                <th>price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($user->DoctorAppointment as $item)
                                <tr>
                                    <td>{{ $i++ }}</a></td>
                                    <td>{{ Carbon\Carbon::parse($item->start_time)->diffForHumans(['parts' => 2]) }}</a>
                                    </td>
                                    <td>{{ Carbon\Carbon::parse($item->finish_time)->diffForHumans(['parts' => 2]) }}</a>
                                    </td>
                                    <td>{{ $item->price }}</a></td>
                                    <td>

                                        <form action="{{ route('appointments.storemeeting', $item) }}" method="POST"
                                            style="display: inline-block;">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="submit" class="btn btn-sm btn-success" value="book">
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection
