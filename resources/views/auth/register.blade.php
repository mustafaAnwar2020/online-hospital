@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-xl-9 mx-auto">
                <div class="card flex-row my-5 border-0 shadow rounded-3 overflow-hidden">
                    <div class="card-img-left d-none d-md-flex">
                        <!-- Background image for card set in CSS! -->
                    </div>
                    <div class="card-body p-4 p-sm-5">
                        <h5 class="card-title text-center mb-5 fw-light fs-5">Register</h5>
                        <form method="POST" action="{{ route('register') }}" x-data="{ role_id: 2 }" enctype="multipart/form-data"
                        >
                            @csrf



                            <div class="form-floating mb-3">
                                <label for="floatingInputEmail">Register as</label>

                                <select name="role" x-model="role_id" id="floatingInputUsername">
                                    <option value="2">User</option>
                                    <option value="3">Doctor</option>
                                </select>

                            </div>

                            <div class="form-floating mb-3">
                                <label for="floatingInputEmail">Email address</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    id="floatingInputUsername" placeholder="Email" name="email" value="{{ old('email') }}"
                                    required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>

                            <hr>


                            <div class="form-floating mb-3">
                                <label for="floatingInputUsername">Username</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    id="floatingInputUsername" placeholder="username" name="name"
                                    value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <hr>



                            <div class="form-floating mb-3">
                                <label for="floatingInputUsername">Phone</label>
                                <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                    id="floatingInputUsername" placeholder="phone" name="phone" value="{{ old('phone') }}"
                                    required autocomplete="phone" autofocus>
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <hr>


                            <div class="form-floating mb-3">
                                <label for="floatingInputUsername">Address</label>
                                <input type="text" class="form-control @error('address') is-invalid @enderror"
                                    id="floatingInputUsername" placeholder="address" name="Address"
                                    value="{{ old('address') }}" required autocomplete="address" autofocus>
                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <hr>

                            <div class="form-floating mb-3" x-show="role_id == 3">
                                <label for="bio">{{ __('About') }}</label>


                                <textarea class="form-control" name="bio" id="floatingInputUsername" rows="3"></textarea>

                                @error('bio')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <hr>

                            <div class="form-floating mb-3" x-show="role_id == 3">
                                <label for="specialization">{{ __('Department') }}</label>


                                <select name="specialization" id="floatingInputUsername">
                                    <option value="1">Internal Medicine</option>
                                    <option value="2">Cardiology</option>
                                    <option value="3">Gastroenterology</option>
                                    <option value="4">Ophthalmology</option>
                                    <option value="5">Pediatrics</option>
                                    <option value="6">Neurology</option>
                                    <option value="7">nephrology</option>
                                    <option value="8">Oncology</option>
                                    <option value="9">Hematology</option>
                                    <option value="10">Obstetrics and Gynecology</option>
                                    <option value="11">ENT</option>
                                    <option value="12">Emergency medicine</option>
                                </select>

                                @error('specialization')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>

                            <hr>

                            <div class="form-floating mb-3" x-show="role_id == 3">
                                <label for="specialization">{{ __('Degree') }}</label>


                                <select name="degree" id="floatingInputUsername">
                                    <option value="specialist">specialist</option>
                                    <option value="consultative">consultative</option>
                                    <option value="professor">professor</option>
                                </select>

                                @error('degree')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>

                            <hr>

                            <div class="form-floating mb-3">
                                <label for="floatingPassword">Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    id="floatingInputUsername" placeholder="password" name="password"
                                    value="{{ old('password') }}" required autocomplete="password" autofocus>


                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-floating mb-3">
                                <label for="floatingPasswordConfirm">Confirm Password</label>
                                <input id="password-confirm" type="password" placeholder="confirm password"
                                    class="form-control" name="password_confirmation" required
                                    autocomplete="new-password">

                            </div>


                            <div  class="form-floating mb-3" x-show="role_id == 3">
                                <label>photo</label>
                                <input type="file" name="photo" class="form-control image">
                            </div>

                            <div class="form-floating mb-3" x-show="role_id == 3">
                                <img src="{{ asset('uploads/doctor_uploads/doctor.png') }}" style="width: 100px"
                                    class="img-thumbnail image-preview" alt="">
                            </div>

                            <div class="d-grid mb-2">
                                <div class="d-block text-center mt-2 small">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>

                            <a class="d-block text-center mt-2 small" href="{{ route('login') }}">Have an account? Sign
                                In</a>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
