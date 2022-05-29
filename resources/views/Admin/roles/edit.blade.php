@extends('layouts.app')

@section('content')

    <form action="{{ route('admin.roles.update',$role) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="card">
            <div class="card-header">edit</div>

            <div class="card-body">
                <div class="form-group">
                    <label class="required" for="title">name</label>
                    <input class="form-control" type="text" name="name" value="{{$role->name}}" id="title" required>
                    <span class="help-block"> </span>
                </div>
                <div class="form-group">
                    <label for="client_id">permissions</label>
                        @foreach ($permission as $item)
                            <input type="checkbox" name="permission[]" value="{{$item->id}}" {{ in_array($item->id,$rolePermissions) ? 'checked' : '' }}>{{$item->name}}
                        @endforeach
                    <span class="help-block"> </span>
                </div>
                <button class="btn btn-primary" type="submit">
                    save
                </button>
            </div>
        </div>

    </form>

@endsection
