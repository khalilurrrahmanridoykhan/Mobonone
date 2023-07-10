@extends('admin.layouts2.adminapp')

@section('content')
    <div class=" content-wrapper">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <form action="" method="" name="createassignmentFrom" id="createassignmentFrom">
                    <div class="card">
                        <div class="card-header">{{ __(' Courses Assignment to Faculty') }}</div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-4">
                                    <br>
                                    <a name="" id="" class="btn btn-primary"
                                        href="{{ route('admin.assignment.index') }}" role="button">Back</a>
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
                                <label for="">Course Code</label>
                                <select class="form-control" name="course" id="course">
                                    @if (!empty($course))
                                        @foreach ($course as $courses)
                                            <option value="{{ $courses->courses_id }}">{{ $courses->courses_code }}
                                            </option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="">Section</label>
                                <select class="form-control" name="Section" id="Section">
                                    @if (!empty($section))
                                        @foreach ($section as $sections)
                                            <option value="{{ $sections->sections_id }}">{{ $sections->Section_no }}
                                            </option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>


                            <div class="form-group">
                                <label for="">Instructor</label>
                                <select class="form-control" name="faculty" id="faculty">
                                    @if (!empty($faculty))
                                        @foreach ($faculty as $facultys)
                                            <option value="{{ $facultys->faculties_id }}">{{ $facultys->intal }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>


                            <div class="form-group">
                                <label for="">Start Time - End Time</label>
                                <select class="form-control" name="time" id="time" onchange="gettimeslotData();">
                                    @if (!empty($time_slot))
                                        @foreach ($time_slot as $time_slots)
                                            <option data-id='{{ $time_slots->time_slots_id }}'
                                                value="{{ $time_slots->time_slots_id }}">
                                                {{ $time_slots->time }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>

                            <div id="timeslotcontent">
                                <div class="hide-section">
                                    <div class="form-group">
                                        <label for="">Day</label>
                                        <select class="form-control timeslotinput" name="day" id="day">
                                            @if (!empty($time_slot))
                                                @foreach ($time_slot as $time_slots)
                                                    <option value="{{ $time_slots->day }}">{{ $time_slots->day }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Room No</label>
                                        <select class="form-control timeslotinput" name="room_no_for_class"
                                            id="room_no_for_class">
                                            @if (!empty($time_slot))
                                                @foreach ($time_slot as $time_slots)
                                                    <option value="{{ $time_slots->room_no_for_class }}">
                                                        {{ $time_slots->room_no_for_class }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>

                                </div>
                            </div>

                            <div class="form-group">
                                <label for="">Semester</label>
                                {{-- @dd($uni_other_info) --}}
                                <select class="form-control" name="semester" id="semester">
                                    @if (!empty($uni_other_info))
                                        @foreach ($uni_other_info as $uni_other_infos)
                                            <option value="{{ $uni_other_infos->semester }}">
                                                {{ $uni_other_infos->semester }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>


                            <div class="form-group">
                                <label for="">Year</label>
                                <select class="form-control" name="year" id="year">
                                    {{-- @if (!empty($uni_other_info))
                                        @foreach ($uni_other_info as $uni_other_infos)
                                            <option value="{{ $uni_other_infos->year }}">{{ $uni_other_infos->year }}
                                            </option>
                                        @endforeach
                                    @endif --}}
                                    <option value="2021">2021</option>
                                    <option value="2022">2022</option>
                                    <option value="2023">2023</option>
                                </select>
                            </div>



                            {{-- <script>
                                var time = $("#time").val();
                                var day = $("#day").val();
                                var room_no_for_class = $("#room_no_for_class").val();

                                var totalassignment = (time + "-" + day + "-" + room_no_for_class);
                                var data = ($("#createassignmentFrom"));

                                // alert(totalassignment);
                                console.log(totalassignment);

                            </script> --}}

                            {{-- <div>
                                <input value="{{ $totalassignment }}" type="text">
                            </div> --}}
                            <div class="from-group">
                                <label for="status">Status</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="1">Active</option>
                                    <option value="0">Block</option>
                                </select>
                            </div>
                            <br>
                            <button onclick="checkassignment();" type="button" name="submit" id="assignmentsubmitbutton"
                                class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="iffacultysectionuniceid">


        @if (!empty($faculty_section))
            @foreach ($faculty_section as $faculty_sections)
                <input class="faclultyclass" iffacultysectionunice-id="{{ $faculty_sections->iffacultysectionunice }}"
                    type="text" value="{{ $faculty_sections->iffacultysectionunice }}">
            @endforeach
        @else
            {{-- <input id="iffacultysectionuniceid" iffacultysectionunice-id="" type="hidden"> --}}
        @endif

    </div>

    <div id="just-validation-sectioin">

    </div>


@endsection



@section('extraJs')
    <script type="text/javascript">
        function gettimeslotData() {

            var timeslotid = document.getElementById("time").value;

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "POST",
                url: "{{ URL::to('timslot-get-all-deta') }}",
                data: {
                    'id': timeslotid
                },
                success: function(response) {
                    // console.log(response.day);

                    var html = `
                                <div class="hide-section">
                                    <div class="form-group">
                                    <label for="">Day</label>
                                    <select class="form-control timeslotinput" name="day" id="day">
                                        <option value="${response.day}">${response.day}</option>
                                    </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Room No</label>
                                        <select class="form-control timeslotinput" name="room_no_for_class" id="room_no_for_class">
                                            <option value="${response.room_no_for_class}">${response.room_no_for_class}</option>
                                        </select>
                                    </div>
                                </div>
                    `;

                    $(".hide-section").remove();
                    $("#timeslotcontent").append(html);
                }
            });
        }

        function checkassignment() {


            var courses_code = $("#course").val();
            var Section_no = $("#Section").val();
            var faculties_id = $("#faculty").val();
            var time = $("#time").val();
            var day = $("#day").val();
            var room_no_for_class = $("#room_no_for_class").val();
            var year = $("#year").val();
            var semester = $("#semester").val();

            var totalsectioncourse = (courses_code + "-" + Section_no + "-" + faculties_id);
            var totaltimeslot = (faculties_id+"-" +time + "-" + day);
            // alert(totalsectioncourse)

            // var html = `<input type="hidden" name="iffacultysectionunice" value="${totalsectioncourse}" /> `;
            // var data = ($("#createassignmentFrom")).sortable('toArray').toString();
            // alert(data);
            var validationhtml = `<input type="text" name="validertorsection" id="validertorsection" class="form-control"
                                    placeholder="" aria-describedby="helpId" value= "1">`;

            var totalassinmet = totalsectioncourse + "-" + time + "-" + day + "-" + room_no_for_class + "-" + year + "-" +
                semester;
            var assingmetnunicehtml =
                `<input type="hidden" name="iffacultyisunice" id="iffacultyisunice" value="${totalassinmet}" /> `;
            var isFund = false;
            var isFundTimeSlot = false;
            $.ajax({
                type: "get",
                url: "{{ route('admin.assignment.getsectionfacluty') }}",
                success: function(response) {
                    response.forEach((n) => {
                        console.log(n.iffacultysectionunice);
                        if (n.iffacultysectionunice == totalsectioncourse) {
                            isFund = true;
                        }

                    });



                    console.log(isFund);

                    if (isFund == true) {
                        swal('CONFLICT!',
                            'You Select Same Section for same course Again!',
                            'error');
                        // Swal.fire(

                        // )
                    } else {

                        $.ajax({
                            type: "get",
                            url: "{{ route('admin.assignment.gettimeslotfaculty') }}",
                            success: function(response) {

                                response.forEach((n) => {
                                    console.log(n.iffacultytimeslotunice);
                                    if (n.iffacultytimeslotunice == totaltimeslot) {
                                        isFundTimeSlot = true;
                                    }

                                });



                                console.log(isFundTimeSlot);

                                if (isFundTimeSlot == true) {
                                    swal('CONFLICT!',
                                        'You Select Same Time Slot Again!',
                                        'error');
                                    // Swal.fire(

                                    // )
                                } else {
                                    $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            type: "POST",
                            url: "{{ URL::to('checkthecriditlessthe11') }}",
                            data: {
                                'courses_code': courses_code,
                                'faculties_id': faculties_id,

                            },
                            success: function(response) {

                                if (response.status == 0) {

                                    swal('CONFLICT!',
                                        'You are try to take more then 11 cradit!',
                                        'error');

                                } else {
                                    $("#createassignmentFrom").append(
                                        assingmetnunicehtml);
                                    $.ajax({
                                        url: "{{ route('admin.assignment.save') }}",
                                        type: 'POST',
                                        dataType: 'json',
                                        data: $(
                                                "#createassignmentFrom")
                                            .serializeArray(),
                                        success: function(
                                            response) {
                                            if (response
                                                .status == 200
                                            ) {
                                                // window.location.href =
                                                //     '{{ route('admin.assignment.index') }}';

                                                $("#just-validation-sectioin").append(
                                                    validationhtml);
                                                $('#assignmentsubmitbutton').removeAttr(
                                                    "type").attr("type",
                                                    "submit");

                                                var values = {
                                                    'courses_code': courses_code,
                                                    'Section_no': Section_no,
                                                    'faculties_id': faculties_id,
                                                    'iffacultysectionunice': totalsectioncourse,
                                                };

                                                // console.log(values);

                                                $.ajax({
                                                    url: "{{ route('admin.assignment.savefaculrysection') }}",
                                                    type: 'POST',
                                                    dataType: 'json',
                                                    data: values,
                                                    success: function(
                                                        response) {


                                                        if (response
                                                            .status == 200
                                                        ) {

                                                            // window.location.href = '{{ route('admin.assignment.index') }}';
                                                            //location.replace('/admin/services/list');



                                                        } else {
                                                            // $('.room_no_for_class-error').html(response.errors.room_no_for_class);

                                                        }
                                                    }
                                                });

                                                var valuesfortimeslot = {
                                                    'time': time,
                                                    'day': day,
                                                    'faculties_id': faculties_id,
                                                    'Section_no': Section_no,
                                                    'courses_code': courses_code,
                                                    'iffacultytimeslotunice': totaltimeslot,
                                                };

                                                // console.log(values);

                                                $.ajax({
                                                    url: "{{ route('admin.assignment.savefaculrytimeslot') }}",
                                                    type: 'POST',
                                                    dataType: 'json',
                                                    data: valuesfortimeslot,
                                                    success: function(
                                                        response) {


                                                        if (response
                                                            .status == 200
                                                        ) {

                                                            window.location
                                                                .href =
                                                                '{{ route('admin.assignment.index') }}';
                                                            //location.replace('/admin/services/list');



                                                        } else {
                                                            // $('.room_no_for_class-error').html(response.errors.room_no_for_class);

                                                        }
                                                    }
                                                });

                                            } else {
                                                // $('.room_no_for_class-error').html(response.errors.room_no_for_class);
                                            }
                                        }
                                    });



                                }
                            }
                        });
                                }
                            }
                        });


                    }
                }
            });


            var validationassigment = document.getElementById("validertorsection").value;


            if (validationassigment == 1) {





                // alert("Not Same.");

                // $(this).append(html);



                // $("#createassignmentFrom").submit(function(event) {
                //     event.preventDefault();
                // });


                // $("#createassignmentFrom").submit(function(event) {
                //     event.preventDefault();

                //     $.ajax({
                //         url: "{{ route('admin.assignment.save') }}",
                //         type: 'POST',
                //         dataType: 'json',
                //         data: $("#createassignmentFrom").serializeArray(),
                //         success: function(response) {


                //             if (response.status == 200) {

                //                 window.location.href = '{{ route('admin.assignment.index') }}';
                //                 //location.replace('/admin/services/list');


                //             } else {
                //                 // $('.room_no_for_class-error').html(response.errors.room_no_for_class);

                //             }
                //         }
                //     });

                // });
            }



        }
    </script>
@endsection
