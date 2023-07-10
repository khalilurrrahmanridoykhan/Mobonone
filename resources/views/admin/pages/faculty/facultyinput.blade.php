@extends('admin.layouts2.adminapp')

@section('content')
    <div class=" content-wrapper">
        <div class="row justify-content-center">
            <div class="col-md-11">
                {{-- @dd($done); --}}
                <form action="" method="post" name="createFacultyFrom" id="createFacultyFrom">
                    <div class="card">
                        <div class="card-header">{{ __('Faculty Create') }}</div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-4">
                                    <br>
                                    <a name="" id="" class="btn btn-primary" href="{{ route('admin.faculty.index') }}" role="button">Back</a>
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
                                <label for=""> Faculty Name</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder=""
                                    aria-describedby="helpId">
                                <p class="text-danger error name-error"></p>
                            </div>

                            <div class="form-group">
                                <label for="">Faculty Intal</label>
                                <input type="text" name="intal" id="intal" class="form-control" placeholder=""
                                    aria-describedby="helpId">
                                {{-- <p class="text-danger error intal-error"></p> --}}
                            </div>

                                <div class="form-group">
                                  <label for="">Faculty Position</label>
                                  <select class="form-control" name="postion" id="postion">
                                    <option value="Professor">Professor</option>
                                    <option value="Associate Professor">Associate Professor</option>
                                    <option value="Proctor">Proctor</option>
                                    <option value="Assistant Professor">Assistant Professor</option>
                                    <option value="Senior Lecturer">Senior Lecturer</option>
                                    <option value="Lecturer">Lecturer</option>
                                  </select>
                                </div>

                            <div class="form-group">
                                <label for="">Faculty Email</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder=""
                                    aria-describedby="helpId">
                                {{-- <p class="text-danger error email-error"></p> --}}
                            </div>

                            <div class="form-group">
                                <label for="">Phone Ext</label>
                                <input type="text" name="phone_ext" id="phone_ext" class="form-control" placeholder=""
                                    aria-describedby="helpId">
                                {{-- <p class="text-danger error phone_ext-error"></p> --}}
                            </div>

                            <div class="form-group">
                                <label for="">Faculty Room No</label>
                                <input type="text" name="room_no" id="room_no" class="form-control" placeholder=""
                                    aria-describedby="helpId">
                                {{-- <p class="text-danger error room_no-error"></p> --}}
                            </div>

                            <div class="form-group">
                                <label for="">Faculty Mobile No</label>
                                <input type="text" name="Mobile_number" id="Mobile_number" class="form-control" placeholder=""
                                    aria-describedby="helpId">
                            </div>

                            {{-- <div class="form-group">
                                <label for="">Faculty Tacken Credit</label>
                                <input type="text" name="tacken_credit" id="tacken_credit" class="form-control" placeholder=""
                                    aria-describedby="helpId">
                            </div> --}}

                            <div class="row">
                                <div class="col-md-12">
                                    <input type="hidden" id="image_id" name="image_id" value="">
                                    <label for=""><b>Image</b></label><br>
                                    <div id="image" class="dropzone dz-clickable">
                                        <div class="dz-message needsclick">
                                            <br>Drop files here or click to upload.
                                            <br><br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="from-group">
                                <label for="status">Status</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="1">Active</option>
                                    <option value="0">Block</option>
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
        Dropzone.autoDiscover = false;
        const dropzone = $("#image").dropzone({
            init: function() {
                this.on('addedfile', function(file) {
                    if (this.files.length > 1) {
                        this.removefile(this.file[0]);
                    }
                });
            },
            url: "{{ route('admin.faculty.temp') }}",
            maxFiles: 1,
            addRemoveLinks: true,
            acceptedFiles: "image/jpeg,image/png,image/gif",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(file, respinse) {
                $("#image_id").val(respinse.id);

            }
        });
        $("#createFacultyFrom").submit(function(event) {
            event.preventDefault();

            $.ajax({
                url: "{{ route('admin.faculty.save') }}",
                type: 'POST',
                dataType: 'json',
                data: $("#createFacultyFrom").serializeArray(),
                success: function(response) {


                    if (response.status == 200) {

                        //location.replace('/admin/services/list');




                    } else {
                        $('.name-error').html(response.errors.name);
                        alert("Have to put Faculty Name");

                    }


                }

            });

            // window.location.href = '{{ route('admin.faculty.index') }}';

        });
    </script>
@endsection

