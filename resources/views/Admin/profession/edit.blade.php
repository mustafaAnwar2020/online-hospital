@extends('layouts.app')

@section('content')

    <form action="{{ route('admin.professions.update',$profession) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="card">
            <div class="card-header">Edit department</div>

            <div class="card-body">
                <div class="form-group">
                    <label class="required" for="title">Name</label>
                    <input class="form-control" type="text" name="name" value="{{$profession->name}}" id="title" required>
                    <span class="help-block"> </span>
                </div>

                <div  class="form-floating mb-3" >
                    <label>photo</label>
                    <input type="file" name="image" class="form-control image">
                </div>

                <div class="form-floating mb-3" >
                    <img src="{{ asset('uploads/doctor_uploads/'.$profession->image) }}" style="width: 100px"
                        class="img-thumbnail image-preview" alt="">
                </div>
                <button class="btn btn-primary" type="submit">
                    Save
                </button>
            </div>
        </div>

    </form>

@endsection
