@extends('admin.layouts2.adminapp')

@section('content')
    <div class=" content-wrapper">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <form action="" method="post" name="createuniotherinfoFrom" id="createuniotherinfoFrom">
                    <div class="card">
                        <div class="card-header">{{ __(' Univarsity Other Info Create') }}</div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-4">
                                    <br>
                                    <a name="" id="" class="btn btn-primary"
                                        href="{{ route('admin.uniotherinfo.index') }}" role="button">Back</a>
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

{{--
                            <div class="form-group">
                                <label for="">Semester</label>
                                <input type="text" name="semester" id="semester" class="form-control"
                                    placeholder="" aria-describedby="helpId">
                                <p class="text-danger error semester-error"></p>

                            </div> --}}

                            <div class="form-group">
                              <label for="">Semester</label>
                              <select class="form-control" name="semester" id="semester">
                                <option value="Spring">Spring</option>
                                <option value="Summer">Summer</option>
                                <option value="Fall">Fall</option>
                              </select>
                            </div>

                            <div class="form-group">
                                <label for="">Year</label>
                                <input type="text" name="year" id="year" class="form-control"
                                    placeholder="" aria-describedby="helpId">
                                <p class="text-danger error year-error"></p>
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
        $("#createuniotherinfoFrom").submit(function(event) {
            event.preventDefault();

            $.ajax({
                url: "{{ route('admin.uniotherinfo.save') }}",
                type: 'POST',
                dataType: 'json',
                data: $("#createuniotherinfoFrom").serializeArray(),
                success: function(response) {


                    if (response.status == 200) {

                        window.location.href = '{{ route('admin.uniotherinfo.index') }}';
                        //location.replace('/admin/services/list');


                    } else {
                        $('.year-error').html(response.errors.year);

                    }
                }
            });

        });
    </script>
@endsection
