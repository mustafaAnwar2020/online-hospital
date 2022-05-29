@extends('layouts.doctor')

@section('content')

    <div class="container-fluid h-custom">
        <div class="row d-flex justify-content-center align-items-center h-100">

            <div class="col-md-9 col-lg-7 col-xl-5">
                <img src="https://media.istockphoto.com/photos/healthcare-photos-picture-id954802966?k=20&m=954802966&s=612x612&w=0&h=3iWELRIN8B_CVib-LhF0tW_twwKviG5HY3RY3xLeVVE="
                    class="img-fluid" alt="Sample image">
            </div>
            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                <form method="POST" action="{{ route('doctor.storeHospital') }}">
                    @csrf
                    <h5 class="card-title text-center mb-5 fw-light fs-5">Add your Hospital</h5>
                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="form3Example3">Name</label>

                        <select name="hospital_id" id="floatingInputUsername">
                            @foreach ($hospitals as $hospital)
                                <option value="{{$hospital->id}}">{{$hospital->name}}</option>
                            @endforeach


                        </select>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                    </div>


                    <div class="text-center text-lg-start mt-4 pt-2">
                        <button type="submit" class="btn bg-gradient-success text-gray-900">
                            {{ __('Submit') }}
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
