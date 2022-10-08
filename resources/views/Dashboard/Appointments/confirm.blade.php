@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-xl-9 mx-auto">
                <div class="card flex-row my-5 border-0 shadow rounded-3 overflow-hidden">
                    <div class="card-body p-4 p-sm-5">
                        <h1>Thank you!</h1>
                        <p>A confirmation email was sent</p>
                        <div class="spacer"></div>
                        <div>
                            <a href="{{ url('/') }}" class="button">
                                <i class="fas fa-house  text-gray-400"></i>
                                Home Page</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
