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
                        <h5 class="card-title text-center mb-5 fw-light fs-5">Edit Profile</h5>
                        <form method="POST" action="{{ route('profile.update', $user) }}" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf

                            <div class="form-floating mb-3">
                                <label for="floatingInputEmail">Email address</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    id="floatingInputUsername" placeholder="Email" value="{{ $user->email }}" name="email"
                                    autocomplete="email" autofocus>
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
                                    value="{{ $user->name }}" autocomplete="name" autofocus>
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
                                    id="floatingInputUsername" placeholder="phone" name="phone" value="{{ $user->phone }}"
                                    autocomplete="phone" autofocus>
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
                                    value="{{ $user->Address }}" autocomplete="address" autofocus>
                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <hr>

                            <div class="form-floating mb-3">
                                <label for="bio">{{ __('About') }}</label>


                                <textarea class="form-control" name="bio" id="floatingInputUsername" rows="3">{{ $user->bio }}</textarea>

                                @error('bio')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <hr>

                            <div class="form-floating mb-3">
                                <label for="specialization">{{ __('Department') }}</label>


                                <select name="specialization" id="floatingInputUsername">
                                    @foreach ($professions as $item)
                                        <option value="{{ $item->id }}"
                                            {{ $item->id == $user->profission->id ? 'selected' : '' }}>{{ $item->name }}
                                        </option>
                                    @endforeach


                                </select>

                                @error('specialization')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>

                            <hr>

                            <div class="form-floating mb-3">
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
                                    value="{{ old('password') }}" autocomplete="password" autofocus>


                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-floating mb-3">
                                <label for="floatingPasswordConfirm">Confirm Password</label>
                                <input id="password-confirm" type="password" placeholder="confirm password"
                                    class="form-control" name="password_confirmation" autocomplete="new-password">

                            </div>


                            <div class="form-floating mb-3">
                                <label>photo</label>
                                <input type="file" name="photo" class="form-control image">
                            </div>

                            <div class="form-floating mb-3">
                                <img src="{{ asset('uploads/doctor_uploads/' . $user->photo) }}" style="width: 100px"
                                    class="img-thumbnail image-preview" alt="">
                            </div>

                            <div class="d-grid mb-2">
                                <div class="d-block text-center mt-2 small">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Update') }}
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
