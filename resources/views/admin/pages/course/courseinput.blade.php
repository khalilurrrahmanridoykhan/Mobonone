@extends('admin.layouts2.adminapp')

@section('content')
    <div class=" content-wrapper">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <form action="" method="post" name="createcourseFrom" id="createcourseFrom">
                    <div class="card">
                        <div class="card-header">{{ __(' Course Create') }}</div>
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
                                <label for="">Courses Title</label>
                                <input type="text" name="courses_title" id="courses_title" class="form-control"
                                    placeholder="" aria-describedby="helpId">
                                <p class="text-danger error courses_title-error"></p>

                            </div>

                            <div class="form-group">
                                <label for="">Courses Code</label>
                                <input type="text" name="courses_code" id="courses_code" class="form-control"
                                    placeholder="" aria-describedby="helpId">
                                {{-- <p class="text-danger error intal-error"></p> --}}
                            </div>

                            <div class="form-group">
                                <label for="">Courses Credit</label>
                                <input type="text" name="credit" id="credit" class="form-control" placeholder=""
                                    aria-describedby="helpId">
                                {{-- <p class="text-danger error intal-error"></p> --}}
                            </div>

                            <div class="form-group">
                                <label for="">Course type</label>
                                <select class="form-control" name="course_type" id="course_type">
                                    <option></option>
                                    <option>Offered for Other Departments(Core)</option>
                                    <option>CSE Core Courses(Core)</option>
                                    <option>CSE Major Compulsory(MC)</option>
                                    <option>CSE Major Elective(ME)</option>
                                </select>
                            </div>


                            <div class="form-group">
                                <label for="">Paralal Course Code</label>
                                <select class="form-control" name="paralal_courses" id="paralal_courses">
                                    <option></option>
                                    @if (!empty($paralalcourse))
                                        @foreach ($paralalcourse as $paralalcourses)
                                            <option value="{{ $paralalcourses->Course_code }}" >{{ $paralalcourses->Course_code }}</option>
                                        @endforeach
                                    @endif
                                </select>
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
        $("#createcourseFrom").submit(function(event) {
            event.preventDefault();

            $.ajax({
                url: "{{ route('admin.course.save') }}",
                type: 'POST',
                dataType: 'json',
                data: $("#createcourseFrom").serializeArray(),
                success: function(response) {


                    if (response.status == 200) {

                        window.location.href = '{{ route('admin.course.index') }}';
                        //location.replace('/admin/services/list');


                    } else {
                        $('.name-error').html(response.errors.courses_title);

                    }
                }
            });

        });
    </script>
@endsection
