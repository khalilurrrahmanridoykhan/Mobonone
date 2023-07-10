@extends('admin.layouts2.adminapp')

@section('content')
    <div class=" content-wrapper">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <form action="" method="post" name="createparalalcourseFrom" id="createparalalcourseFrom">
                    <div class="card">
                        <div class="card-header">{{ __('Paralal Course Create') }}</div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-4">
                                    <br>
                                    <a name="" id="" class="btn btn-primary" href="{{ route('admin.paralacourse.index') }}" role="button">Back</a>
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
                                <label for=""> Course Name</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder=""
                                    aria-describedby="helpId">
                                <p class="text-danger error name-error"></p>
                            </div>

                            <div class="form-group">
                                <label for="">Course Code</label>
                                <input type="text" name="Course_code" id="Course_code" class="form-control" placeholder=""
                                    aria-describedby="helpId">
                                {{-- <p class="text-danger error intal-error"></p> --}}
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

        $("#createparalalcourseFrom").submit(function(event) {
            event.preventDefault();

            $.ajax({
                url: "{{ route('admin.paralacourse.save') }}",
                type: 'POST',
                dataType: 'json',
                data: $("#createparalalcourseFrom").serializeArray(),
                success: function(response) {


                    if (response.status == 200) {

                    window.location.href = '{{ route('admin.paralacourse.index') }}';
                        //location.replace('/admin/services/list');


                    } else {
                        $('.name-error').html(response.errors.name);

                    }
                }
            });

        });
    </script>
@endsection
