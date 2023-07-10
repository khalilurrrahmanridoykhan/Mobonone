@extends('admin.layouts2.adminapp')

@section('content')
    <div class=" content-wrapper">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <form action="" method="post" name="editcourseFrom" id="editcourseFrom">
                    <div class="card">
                        <div class="card-header">{{ __('Course Edit') }}</div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-4">
                                    <br>
                                    <a name="" id="" class="btn btn-primary"
                                        href="{{ route('admin.course.index') }}" role="button">Back</a>
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
                                <label for="">  Course Title</label>
                                <input value="{{ $course->courses_title }}" type="text" name="courses_title" id="courses_title"
                                    class="form-control" placeholder="" aria-describedby="helpId">
                                <p class="text-danger error courses_title-error"></p>
                            </div>

                            <div class="form-group">
                                <label for=""> Course Code</label>
                                <input value="{{ $course->courses_code }}" type="text" name="courses_code" id="courses_code"
                                    class="form-control" placeholder="" aria-describedby="helpId">
                                {{-- <p class="text-danger error intal-error"></p> --}}
                            </div>
                            <div class="form-group">
                                <label for=""> Course Credit</label>
                                <input value="{{ $course->credit }}" type="text" name="credit" id="credit"
                                    class="form-control" placeholder="" aria-describedby="helpId">
                                {{-- <p class="text-danger error intal-error"></p> --}}
                            </div>
                            <div class="form-group">
                                <label for="">Course Type</label>
                                <input value="{{ $course->course_type }}" type="text" name="course_type" id="course_type"
                                    class="form-control" placeholder="" aria-describedby="helpId">
                                {{-- <p class="text-danger error intal-error"></p> --}}
                            </div>
                            <div class="form-group">
                                <label for="">Paralal Course Code</label>
                                <input value="{{ $course->paralal_courses }}" type="text" name="paralal_courses" id="paralal_courses"
                                    class="form-control" placeholder="" aria-describedby="helpId">
                                {{-- <p class="text-danger error intal-error"></p> --}}
                            </div>
                            <div class="from-group">
                                <label for="status">Status</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="1" {{ $course->status == 1 ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ $course->status == 0 ? 'selected' : '' }}>Block</option>
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
        $("#editcourseFrom").submit(function(event) {
            event.preventDefault();

            $.ajax({
                url: "{{ route('admin.course.update', $course->courses_id) }}",
                type: 'POST',
                dataType: 'json',
                data: $("#editcourseFrom").serializeArray(),
                success: function(response) {


                    if (response.status == 200) {

                        window.location.href = '{{ route('admin.course.index') }}';
                        //location.replace('/admin/services/list');


                    } else {
                        $('.courses_title-error').html(response.errors.courses_title);

                    }
                }
            });

        });
    </script>
@endsection
