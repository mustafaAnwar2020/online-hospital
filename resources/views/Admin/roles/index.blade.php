@extends('admin.layouts.app')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Roles</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.admin.index')}}">Home</a></li>
                        <li class="breadcrumb-item active">Roles</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="d-flex flex-row-reverse">
                <div class="p-2">
                    <a class="btn btn-success" href="{{ route('admin.roles.create') }}">
                        <i class="fa fa-plus"></i>
                    </a>
                </div>
            </div>
            <div class="card">
                <div class="card-body">

                    <table class="table table-responsive-sm table-striped">
                        <thead>
                            <tr>
                                <th>name</th>
                                <th>action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $item)
                                <tr>
                                    <td>{{ $item->name }}</td>
                                    <td>
                                        <a class="btn btn-sm btn-info" href="{{ route('admin.roles.edit', $item) }}">
                                            edit
                                        </a>
                                        <form action="{{ route('admin.roles.destroy', $item) }}" method="POST"
                                            onsubmit="return confirm('Are your sure?');" style="display: inline-block;">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="submit" class="btn btn-sm btn-danger" value="delete">
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </section>
        @endsection
