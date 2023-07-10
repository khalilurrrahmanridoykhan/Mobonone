@extends('layouts.Dashbordapp')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form action="" method="post" name="createpageFrom" id="createpageFrom">
                    <div class="card">
                        <div class="card-header">{{ __('Create Page') }}</div>

                        <div class="card-body">
                            <div class="row">

                                <form action="" method="post" name="pagelinkfrom" id="pagelinkfrom">
                                    <div class="form-group row">
                                        <div class="form-group">
                                            <label for="">Page Name</label>
                                            <input type="text" name="name" id="name" class="form-control"
                                                placeholder="" aria-describedby="helpId">
                                            <p class="text-danger error page-name-error"></p>

                                        </div>

                                        <div class="form-group">
                                            <label for="">Page Link</label>
                                            <input type="text" name="link" id="link" class="form-control"
                                                placeholder="" aria-describedby="helpId">
                                            <p class="text-danger error page-link-error"></p>
                                        </div>
                                        <label for="status">Dropdown Manu</label>
                                        <select name="dropdown" id="dropdown" class="form-control">
                                            <option value="1">Add</option>
                                            <option value="0">Remove</option>
                                        </select>
                                    </div>
                                    <br>


                                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                                </form>


                            </div>


                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection


@section('extraJs')
    <script type="text/javascript">
        $("#createpageFrom").submit(function(event) {
            event.preventDefault();

            $.ajax({
                url: '{{ route('admin.manu.save') }}',
                type: 'POST',
                dataType: 'json',
                data: $("#createpageFrom").serializeArray(),
                success: function(response) {

                    if (response.status == 200) {

                        // window.location.href = '{{ route('admin.setting.indexwithedit') }}';
                        //location.replace('/admin/services/divst');
                        // window.location.href = '{{ route('admin.setting.indexwithedit') }}';

                        window.location.href = '{{ route('admin.manu.list') }}';

                        // location.reload();


                    } else {
                        $('.page-name-error').html(response.errors.name);
                        $('.page-link-error').html(response.errors.link);

                    }
                }
            });

        });
    </script>
@endsection
