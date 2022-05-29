@extends('layouts.appointment')

@section('content')
    <div class="container">
        <div class="row">
            <div class='col-lg-9'>

            </div>

        </div>
    </div>
    <div class="card">
        <div class="card-header">

        </div>

        <div class="card-body">
            <form action="{{route('appointment.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group ">
                    <label for="finish_time">Select Start Time:</label>
                    <div class='col-sm-4 input-group date' id='dtpickerdemo2'>
                        <input type='text' name="start_time" class="form-control" />
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                    <script type="text/javascript">
                        $(function() {
                            $('#dtpickerdemo2').datetimepicker({format: 'YYYY:MM:DD HH:mm'});
                        });
                    </script>
                </div>
                <div class="form-group ">
                    <label for="finish_time">Select Finish Time:</label>
                    <div class='col-sm-4 input-group date' id='dtpickerdemo'>
                        <input type='text' name="finish_time" class="form-control" />
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                    <script type="text/javascript">
                        $(function() {
                            $('#dtpickerdemo').datetimepicker({format: 'YYYY:MM:DD HH:mm'});
                        });
                    </script>
                </div>
                <div class="form-group ">
                    <label for="price">price</label>
                    <input type="number" id="price" name="price" class="form-control" step="0.01">
                </div>
                <div class="text-center text-lg-start mt-4 pt-2">
                    <button type="submit" class="btn btn-success">
                        {{ __('Submit') }}
                    </button>
                </div>
            </form>


        </div>
    </div>
@endsection
