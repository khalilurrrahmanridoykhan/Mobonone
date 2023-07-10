@extends('admin.layouts2.adminapp')

@section('content')
    <div class=" content-wrapper">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <form action="" method="post" name="edittimeslotFrom" id="edittimeslotFrom">
                    <div class="card">
                        <div class="card-header">{{ __('TimeSlot Edit') }}</div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-4">
                                    <br>
                                    <a name="" id="" class="btn btn-primary"
                                        href="{{ route('admin.timeslot.index') }}" role="button">Back</a>
                                </div>
                                <div class="col-md-8"></div>
                            </div>
                        </div>
                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <div class="form-group">
                                <label for="">Stat Time - End Time</label>
                                <select class="form-control" name="time" id="time">
                                    <option value="{{ $timeslot->time }}">{{ $timeslot->time }}</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="">Day</label>
                                <select class="form-control" name="day" id="day">
                                    <option value="{{ $timeslot->day }}">{{ $timeslot->day }}</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="">Room No</label>
                                <input value="{{ $timeslot->room_no_for_class }}" type="text" name="room_no_for_class" id="room_no_for_class" class="form-control"
                                    placeholder="" aria-describedby="helpId">
                                    <p class="text-danger error room_no_for_class-error"></p>
                                </div>

                            <div class="from-group">
                                <label for="status">Status</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="1" {{ $timeslot->status == 1 ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ $timeslot->status == 0 ? 'selected' : '' }}>Block</option>
                                </select>
                            </div>
                            <br>
                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection



@section('extraJs')
    <script type="text/javascript">
        $("#edittimeslotFrom").submit(function(event) {
            event.preventDefault();

            $.ajax({
                url: "{{ route('admin.timeslot.update', $timeslot->time_slots_id) }}",
                type: 'POST',
                dataType: 'json',
                data: $("#edittimeslotFrom").serializeArray(),
                success: function(response) {


                    if (response.status == 200) {

                        window.location.href = '{{ route('admin.timeslot.index') }}';
                        //location.replace('/admin/services/list');


                    } else {
                        $('.timeslots_title-error').html(response.errors.timeslots_title);

                    }
                }
            });

        });
    </script>
@endsection
