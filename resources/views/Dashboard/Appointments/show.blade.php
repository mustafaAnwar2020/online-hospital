@extends('layouts.doctor')

@section('content')


<div class="card">
    <div class="card-header">Appointments</div>

    <div class="card-body">

        <table class="table table-responsive-sm table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Start time</th>
                    <th>Finish time</th>
                    <th>price</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $i = 1;
                @endphp
                @foreach ($appointments as $item)

                    <tr>
                        <td>{{ $i++ }}</a></td>
                        <td>{{ $item->start_time }}</a></td>
                        <td>{{ $item->finish_time }}</a></td>
                        <td>{{ $item->price }}</a></td>
                        <td>
                            <a class="btn btn-sm btn-info" href="{{route('appointment.edit',$item)}}">
                                edit
                            </a>
                            <form action="{{route('appointment.destroy',$item)}}" method="POST"
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
