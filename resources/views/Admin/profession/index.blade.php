@extends('layouts.app')

@section('content')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.professions.create') }}">
                Create Department
            </a>
        </div>
    </div>


    <div class="card">
        <div class="card-header">Departments</div>

        <div class="card-body">

            <table class="table table-responsive-sm table-striped">
                <thead>
                    <tr>
                        <th>name</th>
                        <th>action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($professions as $item)


                        <tr>
                            <td>{{ $item->name }}</td>

                            <td>
                                <a class="btn btn-sm btn-info" href="{{ route('admin.professions.edit', $item) }}">
                                    edit
                                </a>

                                <form action="{{ route('admin.professions.destroy', $item) }}" method="POST"
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

@endsection
