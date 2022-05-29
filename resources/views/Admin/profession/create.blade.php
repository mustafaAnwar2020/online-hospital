@extends('layouts.app')

@section('content')

    <form action="{{ route('admin.professions.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card">
            <div class="card-header">Create department</div>

            <div class="card-body">
                <div class="form-group">
                    <label class="required" for="title">Name</label>
                    <input class="form-control" type="text" name="name" id="title" required>
                    <span class="help-block"> </span>
                </div>

                <div  class="form-floating mb-3" x-show="role_id == 3">
                    <label>photo</label>
                    <input type="file" name="image" class="form-control image">
                </div>

                <div class="form-floating mb-3" x-show="role_id == 3">
                    <img src="{{ asset('uploads/doctor_uploads/doctor.png') }}" style="width: 100px"
                        class="img-thumbnail image-preview" alt="">
                </div>
                <button class="btn btn-primary" type="submit">
                    Save
                </button>
            </div>
        </div>

    </form>

@endsection
