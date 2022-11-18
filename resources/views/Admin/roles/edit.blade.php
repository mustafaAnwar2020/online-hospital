@extends('admin.layouts.app')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Roles</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.admin.index') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.roles.index') }}">Roles</a></li>
                        <li class="breadcrumb-item active">Edit</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <section class="content">
        <div class="container-fluid">
            <form action="{{ route('admin.roles.update', $role) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="card">

                    <div class="card-body">
                        <div class="form-group">
                            <label class="required" for="title">name</label>
                            <input class="form-control" type="text" name="name" value="{{ $role->name }}"
                                id="title" required>
                            <span class="help-block"> </span>
                        </div>
                        <div class="form-group">
                            <label for="client_id">permissions</label>
                            <div class="row">

                                @foreach ($permission as $item)
                                    <div class="col-3">
                                        <input type="checkbox" name="permission[]" value="{{ $item->id }}"
                                            {{ in_array($item->id, $rolePermissions) ? 'checked' : '' }}>{{ $item->name }}
                                    </div>
                                @endforeach
                            </div>
                            <span class="help-block"> </span>
                        </div>
                        <button class="btn btn-primary" type="submit">
                            save
                        </button>
                    </div>
                </div>

            </form>
        </div>
    </section>
@endsection
