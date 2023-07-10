@extends('auth.layouts2.userapp')

@section('content')
    <div class="content-wrapper">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-header">{{ __('Courses Offered') }}</div>
                    <div class="card-body">
                        @if (Session::has('success'))
                            <div class="alert alert-success" role="alert">
                                {{ Session::get('success') }}
                            </div>
                        @endif
                        @if (Session::has('errors'))
                            <div class="alert alert-errors" role="alert">
                                {{ Session::get('errors') }}
                            </div>
                        @endif
                        {{-- table header --}}
                        <div class="container">
                            <div class="row">
                                <div class="col-md-4">
                                    {{-- <a name="" id="" class="btn btn-success"
                                        href="{{ route('admin.offercourses.create') }}" role="button">Create</a> --}}
                                </div>
                                <div class="col-md-8">
                                    <form action="" method="GET">
                                        <div class="input-group mb-3">
                                            <input type="Search" name="keyword" class="form-control" placeholder="Search">
                                            <div class="input-group-append">
                                                <button class="btn btn-info text-light" type="submit">Button</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>

                        {{-- Table --}}

                        <div class="container">
                            <div class="row" style="overflow-x:auto; ">
                                <table class="table" id="tableID" style="cursor: pointer;">
                                    <thead>
                                        <tr>
                                            <th width="80">course</th>
                                            <th width="80">Section </th>
                                            <th width="80">faculty Intal</th>
                                            <th width="100">Time</th>
                                            <th width="80">Date</th>
                                            <th width="80">Room</th>
                                            {{-- <th width="80">Paralal Course</th> --}}

                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- @dd($offercourses) --}}
                                        @if (!empty($offercourses))
                                            @foreach ($offercourses as $offercoursess)
                                                <tr class="advisingaddtable">
                                                    <td>{{ $offercoursess->courses_code }}</td>

                                                    <td>{{ $offercoursess->Section_no }}</td>
                                                    <td>{{ $offercoursess->intal }}</td>
                                                    <td>{{ $offercoursess->time }}</td>
                                                    <td>{{ $offercoursess->day }}</td>
                                                    <td>{{ $offercoursess->room_no_for_class }}</td>
                                                    <td style="display:none;">{{ $offercoursess->faculty }}</td>
                                                    <td style="display:none;">{{ $offercoursess->course }}</td>
                                                    <td style="display:none;">{{ $offercoursess->credit }}</td>
                                                    {{-- <td style="display:none;">{{ $offercoursess->semester }}</td> --}}
                                                    {{-- <td style="display:none;">{{ $offercoursess->year }}</td> --}}
                                                    {{-- <td>{{ $offercoursess->paralal_courses }}</td> --}}

                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="6">
                                                    The row is empty
                                                </td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        {{-- <div class="row">
                                @if (!empty($offercourses))
                                    {{ $offercourses->links('pagination::bootstrap-4') }}
                                @endif
                            </div>
                        </div> --}}



                    </div>

                </div>
            </div>
            <div class="col-md-5">
                <div class="card tackedcourse">
                    <div class="card-header">{{ __('Selected Courses') }}</div>

                    <div class="container">
                        <div class="row" style="overflow-x:auto;">
                            <table class="table" id="tableID" style="cursor: pointer;">
                                <thead>
                                    <tr>
                                        <th width="80">course</th>
                                        <th width="80">Section </th>
                                        <th width="100">Cridit</th>
                                        <th width="100">Timeing</th>
                                        <th width="100">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- @dd($curentuser) --}}
                                    @if (!empty($curentuser))
                                        @foreach ($curentuser as $curentusers)
                                            <tr>
                                                <td>{{ $curentusers->courses_code }}</td>

                                                <td>{{ $curentusers->Section_no }}</td>
                                                <td>{{ $curentusers->courses_cridit }}</td>
                                                <td>{{ $curentusers->day_no }}{{ $curentusers->time_no }}</td>
                                                <td>
                                                    <a
                                                    href="{{ route('user.advising.delete', $curentusers->user_advisings_id) }}"><img
                                                        src="{{ asset('admin/assets/myImages/delete-24.png') }}"
                                                        alt=""></a>
                                                </td>

                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="6">
                                                The row is empty
                                            </td>
                                        </tr>
                                    @endif
                                </tbody>
                                {{-- <div id="totalcriditadd">
                                    <div class="hide-section">

                                    </div>
                                    <button onclick="hidethissection();">Hide</button>
                                </div> --}}
                                @if (!empty($curentuserSigledata))
                                    @foreach ($curentuserSigledata as $curentuserSigledatas)
                                        <tbody id="totalcriditadd">
                                            <tr class="hide-section">
                                                <td colspan="2">Total taken Cridit:</td>
                                                <td>{{ $curentuserSigledatas->Total_cridit }}</td>
                                            </tr>
                                        </tbody>
                                    @endforeach
                                @endif
                                <tbody id="totalcriditadd">
                                    <tr class="hide-section">
                                        <td colspan="2">
                                            <a name="" id="" class=" blueBg customBtn" href="#" role="button">INSTRUCTIONS</a>
                                        </td>
                                        <td colspan="2">

                                            @if (!empty($curentuserSigledata))
                                                @foreach ($curentuserSigledata as $curentuserSigledatas)
                                                @if ($curentuserSigledatas->Total_cridit >8)
                                                <a  name="" id="" class=" blueBg customBtn" href="{{ route('user.advising.printslip') }}" role="button" target="_blank" rel="noopener">PrintSlip</a></td>
                                                @endif
                                                @endforeach
                                            @endif
                                    </tr>
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection

    @section('extraJs')
        <script type="text/javascript">
            // function hidethissection(){
            //     alert("I am here");
            //     // $(".hide-section").remove();
            //     // $('#totalcriditadd').hide();
            //     $("#totalcriditadd").attr("class", "textboxRight");

            // }


            var table = document.getElementById("tableID");
            if (table) {
                for (var i = 0; i < table.rows.length; i++) {
                    table.rows[i].onclick = function() {
                        tableText(this);
                    };
                }
            }

            function tableText(tableRow) {
                var courses_code = tableRow.childNodes[1].innerHTML;
                var Section_no = tableRow.childNodes[3].innerHTML;
                var intal = tableRow.childNodes[5].innerHTML;
                var time = tableRow.childNodes[7].innerHTML;
                var day = tableRow.childNodes[9].innerHTML;
                var room_no_for_class = tableRow.childNodes[11].innerHTML;
                var faculty = tableRow.childNodes[13].innerHTML;
                var course = tableRow.childNodes[15].innerHTML;
                var credit = tableRow.childNodes[17].innerHTML;
                // var semester = tableRow.childNodes[19].innerHTML;
                // var year = tableRow.childNodes[21].innerHTML;

                var values = {
                    'courses_code': courses_code,
                    'Section_no': Section_no,
                    'intal': intal,
                    'time': time,
                    'day': day,
                    'room_no_for_class': room_no_for_class,
                    'faculty': faculty,
                    'course': course,
                    'credit': credit,
                    // 'semester': semester,
                    // 'year': year,
                };
                console.log(values);
                var totalcridithtml = `
                <tr class="hide-section">
                                        <td colspan="2">Total taken Cridit:</td>
                                        <td>$(data)</td>
                                    </tr>
                `;


                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: "{{ route('admin.advising.saveandcheck') }}",
                    type: 'POST',
                    dataType: 'json',
                    data: values,
                    success: function(xhr, statusText, data, err) {
                        // alert('it worked');
                        // alert("Error:" + xhr.status);
                        if (xhr.status == 0) {
                            swal('CONFLICT!',
                                'Already Take This course!',
                                'error');
                        } else if (xhr.status == 2) {
                            swal('CONFLICT!',
                                'Already Take This Time Slot yet!',
                                'error');
                        } else if (xhr.status == 3) {
                            swal('CONFLICT!',
                                'Not take Time Slot yet!',
                                'error');
                        } else if (xhr.status == 200) {
                            // $(".hide-section").remove();


                            window.location.href = '{{ route('user.advising.index') }}';
                            // $("#totalcriditadd").append(totalcridithtml);


                        }else if(xhr.status == 7){
                            swal('CONFLICT!',
                                'You Cant take mare then 15 cridit!',
                                'error');
                        }
                    },

                    error: function(xhr, statusText, err) {
                        alert("Error:" + xhr.status);
                    },
                    // statusCode: {
                    //     200: function() {
                    //         // Only if your server returns a 403 status code can it come in this block. :-)
                    //         alert("Username already exist");
                    //     }
                    // },

                    // complete: function(response) {
                    //     alert(response.status);
                    // },
                });
            }
        </script>
    @endsection
