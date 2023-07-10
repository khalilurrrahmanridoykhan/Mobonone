@extends('auth.layouts2.userapp')

@section('content')
    <div class="content-wrapper">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="container">
                    <br>
                    @if (Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('success') }}
                        </div>
                    @elseif (Session::has('errors'))
                        <div class="alert alert-danger" role="alert">
                            <span>Fell The From Proprly.</span>
                        </div>
                    @endif
                    {{-- @dd($status->status) --}}
                    @if (!empty($status))
                        @if ($status->status == 0)
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="p-3 mb-2 bg-primary text-white">
                                        <p>Your Semeter Drop Status: Under Review.</p>
                                    </div>
                                </div>
                            </div>
                        @elseif ($status->status == 2)
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="p-3 mb-2 bg-success text-white">
                                        <p>Your Semeter Drop Status: Approved.</p>
                                    </div>
                                </div>
                            </div>
                        @elseif ($status->status == 3)
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="p-3 mb-2 bg-danger text-white">
                                        <p>Your Semeter Drop Status: Not Approved.</p>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endif



                    <form method="post" action="{{ route('user.semesterdrop.uplode') }}" id="semeesterdropfrom"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <p>Semester :</p>
                            </div>
                            <div class="col-md-5">

                                <select onchange="getsemesterdrpfrom();" class=" form-control" name="semester"
                                    id="semester">
                                    @if (!empty($semester))
                                        <option value=""></option>
                                        @foreach ($semester as $semesters)
                                            <option value="{{ $semesters->semester }}-{{ $semesters->year }}">
                                                {{ $semesters->semester }}-{{ $semesters->year }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="col-md-3"></div>
                        </div>


                        <br>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('extraJs')
    <script type="text/javascript">
        function getsemesterdrpfrom() {


            var html = `
            <div class="hide-section">

<div class="row">
    <div class="col-md-4">
        <p>Comments :</p>
    </div>
    <div class="col-md-5">
        <div class="form-group">
            <textarea class="form-control" id="comment" name="comment" rows="10"
                placeholder="Please mention the reason..."></textarea>
                <span class="text-danger">
                 @error('comment')
                {{ $message }}
                 @enderror
                 </span>
        </div>
    </div>
    <div class="col-md-3"></div>
</div>


<br>
<div class="row">
    <div class="col-md-4">
        <p>Attachment :</p>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <input type="file" class="form-control-file" name="file_path" id="file_path"
                placeholder="" aria-describedby="fileHelpId">
                <span class="text-danger">
                 @error('file_path')
                {{ $message }}
                 @enderror
                 </span>
        </div>
    </div>
    <div class="col-md-5">
        <button type="submit" name="submit" class="btn btn-primary">Action</button>

    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-5">

        </div>
        <div class="col-md-3"></div>

    </div>
</div>
</div>
            `;

            $(".hide-section").remove();
            $("#semeesterdropfrom").append(html);

        }


        // $("#semeesterdropfrom").submit(function(event) {
        //     event.preventDefault();

        //     $.ajax({
        //         url: "{{ route('user.semesterdrop.uplode') }}",
        //         type: 'POST',
        //         // dataType: 'json',
        //         data: $("#semeesterdropfrom").serializeArray(),
        //         contentType: false,
        //         processData: false,
        //         // method: 'POST',
        //         success: function(response) {


        //             if (response.status == 200) {

        //                 //location.replace('/admin/services/list');




        //             } else {
        //                 // $('.name-error').html(response.errors.name);
        //                 alert("Have to put Faculty Name");

        //             }


        //         }

        //     });

        //     // window.location.href = '{{ route('admin.faculty.index') }}';

        // });
    </script>
@endsection
