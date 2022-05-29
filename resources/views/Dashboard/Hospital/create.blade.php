@extends('layouts.app')

@section('content')

    <div class="container-fluid h-custom">
        <div class="row d-flex justify-content-center align-items-center h-100">

            <div class="col-md-9 col-lg-6 col-xl-6">
                <img src="https://www.healthcareers.nhs.uk/sites/default/files/styles/hero_image/public/hero_images/healthcare-scientist-in-x-ray-room.JPG?itok=cE5MnTaY"
                    class="img-fluid" alt="Sample image">
            </div>
            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                <form method="POST" action="{{ route('doctor.storeHospital') }}">
                    @csrf
                    <h5 class="card-title text-center mb-5 fw-light fs-5">Add Hospital</h5>
                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="form3Example3">Name</label>

                            <input id="name" type="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                    </div>

                    <div class="form-outline mb-4">
                        <label class="form-label" for="form3Example3">Phone</label>

                            <input id="phone" type="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>

                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                    </div>

                    <div class="form-outline mb-4">
                        <label class="form-label" for="form3Example3">Address</label>

                            <input id="address" type="address" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address" autofocus>

                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                    </div>

                    <div class="form-outline mb-4">
                        <label class="form-label" for="form3Example3">About</label>

                        <textarea class="form-control" name="bio" id="floatingInputUsername" rows="3"></textarea>

                            @error('bio')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                    </div>
                    <div class="text-center text-lg-start mt-4 pt-2">
                        <button type="submit" class="btn btn-success">
                            {{ __('Submit') }}
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
