@extends('admin.layouts2.adminapp')

@section('content')
    <div class=" content-wrapper">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <form action="" method="" name="createtimeslotFrom" id="createtimeslotFrom">
                    <div class="card">
                        <div class="card-header">{{ __(' TimeSlot Create') }}</div>
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
                                    <option value="8.30AM-10.00AM">8.30AM-10.00AM</option>
                                    <option value="10.10AM-10.40AM">10.10AM-10.40AM</option>
                                    <option value="11.50AM-1.20PM">11.50AM-1.20PM</option>
                                    <option value="1.30PM-3.00PM">1.30PM-3.00PM</option>
                                    <option value="3.10PM-4.40PM">3.10PM-4.40PM</option>
                                    <option value="4.50PM-6.50PM">4.50PM-6.50PM</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="">Day</label>
                                <select class="form-control" name="day" id="day">
                                    <option value="ST">ST</option>
                                    <option value="MW">MW</option>
                                    <option value="TR">TR</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="">Room No</label>
                                <input type="text" name="room_no_for_class" id="room_no_for_class" class="form-control"
                                    placeholder="" aria-describedby="helpId">
                                <p class="text-danger error room_no_for_class-error"></p>
                            </div>

                            {{-- <script>
                                var time = $("#time").val();
                                var day = $("#day").val();
                                var room_no_for_class = $("#room_no_for_class").val();

                                var totaltimeslot = (time + "-" + day + "-" + room_no_for_class);
                                var data = ($("#createtimeslotFrom"));

                                // alert(totaltimeslot);
                                console.log(totaltimeslot);

                            </script> --}}

                            {{-- <div>
                                <input value="{{ $totaltimeslot }}" type="text">
                            </div> --}}



                            <div class="from-group">
                                <label for="status">Status</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="1">Active</option>
                                    <option value="0">Block</option>
                                </select>
                            </div>
                            <br>
                            <button onclick="checkTimeSlot();" type="button" name="submit" id="timeslotsubmitbutton"
                                class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div>
        @if (!empty($timeslot))
            @foreach ($timeslot as $timeslots)
                {{-- <input class="timeslotdata" id="timevalue" type="hidden" time-id="{{ $timeslots->time }}"
                    value="{{ $timeslots->time }}">
                <input class="timeslotdata" id="dayvalue" type="hidden" day-id="{{ $timeslots->day }}"
                    value="{{ $timeslots->day }}">
                <input class="timeslotdata" id="room_no_for_classvalue" room-id="{{ $timeslots->room_no_for_class }}"
                    type="hidden" value="{{ $timeslots->room_no_for_class }}"> --}}
                <input id="checkifuniceid" checkifunice-id="{{ $timeslots->checkifunice }}" type="hidden"
                    value="{{ $timeslots->checkifunice }}">
            @endforeach
        @endif
    </div>

    <div id="just-validation-timeslot">

    </div>

@endsection



@section('extraJs')
    <script type="text/javascript">
        function checkTimeSlot() {

            var time = $("#time").val();
            var day = $("#day").val();
            var room_no_for_class = $("#room_no_for_class").val();

            // var timevalue = $("#timevalue").val();
            // var dayvalue = $("#dayvalue").val();
            // var room_no_for_classvalue = $("#room_no_for_classvalue").val();


            var totaltimeslot = (time + "-" + day + "-" + room_no_for_class);

            var html = `<input type="hidden" name="checkifunice" value="${totaltimeslot}" /> `;
            // var data = ($("#createtimeslotFrom")).sortable('toArray').toString();
            // alert(data);

            var isFund = false;
            var validationhtml = `<input type="text" name="validertortimer" id="validertortimer" class="form-control"
                                    placeholder="" aria-describedby="helpId" value= "1">`;

            var valuoftime = 0;

            $.ajax({
                type: "get",
                url: "{{ route('admin.timeslot.gettimedlotdata') }}",
                success: function(response) {
                    // $data = $.parseJSON( response );
                    // if(response.l)
                    // console.log(response)
                    if (response.length == 0) {
                        $('#timeslotsubmitbutton').removeAttr("type").attr("type", "submit");


                        $("#createtimeslotFrom").append(html);

                        $.ajax({
                            url: "{{ route('admin.timeslot.save') }}",
                            type: 'POST',
                            dataType: 'json',
                            data: $("#createtimeslotFrom").serializeArray(),
                            success: function(response) {


                                if (response.status == 200) {

                                    window.location.href =
                                        '{{ route('admin.timeslot.index') }}';
                                    //location.replace('/admin/services/list');


                                } else {
                                    $('.room_no_for_class-error').html(
                                        response.errors
                                        .room_no_for_class);

                                }
                            }
                        });
                    } else {

                        isFund == false;
                    response.forEach((n) => {
                        console.log(n.checkifunice);
                        if (n.checkifunice == totaltimeslot) {
                            isFund = true;
                            // break;
                        }



                    });

                    if (isFund == true) {
                        swal('CONFLICT!',
                            'You Select Same TimeSlot Again!',
                            'error');
                        // Swal.fire(

                        // )
                    } else {

                        $("#just-validation-timeslot").append(validationhtml);
                        // break;
                        // alert("want to in?")

                        $("#createtimeslotFrom").append(html);

                        $.ajax({
                            url: "{{ route('admin.timeslot.save') }}",
                            type: 'POST',
                            dataType: 'json',
                            data: $("#createtimeslotFrom").serializeArray(),
                            success: function(response) {


                                if (response.status == 200) {

                                    window.location.href =
                                        '{{ route('admin.timeslot.index') }}';
                                    //location.replace('/admin/services/list');


                                } else {
                                    $('.room_no_for_class-error').html(
                                        response.errors
                                        .room_no_for_class);

                                }
                            }
                        });

                    }
                    }







                }
            });
            // $("#checkifuniceid .faclultyclass").each(function() {
            //     // var time_id = $(this).attr('time-id');
            //     // var day_id = $(this).attr('day-id');
            //     // var room_id = $(this).attr('room-id');
            //     var checkiFunice_id = $(this).attr('checkifunice-id');
            //     if (checkiFunice_id == totaltimeslot) {
            //         isFund = true;
            //     }

            //     // alert(day_id)
            // });


            var valuoftime = document.getElementById("validertortimer").value;


            // alert(valuoftime);


            if (valuoftime == 1) {
                // alert("i am in");
                // alert("Not Same.");
                // $("#createtimeslotFrom").submit(function(event) {
                //     event.preventDefault();

                // });


                // $('#timeslotsubmitbutton').removeAttr("type").attr("type", "submit");


            }

        }
    </script>
@endsection
