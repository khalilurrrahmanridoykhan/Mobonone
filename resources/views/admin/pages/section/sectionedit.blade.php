@extends('admin.layouts2.adminapp')

@section('content')
    <div class=" content-wrapper">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <form action="" method="post" name="editsectionFrom" id="editsectionFrom">
                    <div class="card">
                        <div class="card-header">{{ __('Section Edit') }}</div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-4">
                                    <br>
                                    <a name="" id="" class="btn btn-primary"
                                        href="{{ route('admin.section.index') }}" role="button">Back</a>
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
                                <label for="">  section No</label>
                                <input value="{{ $section->Section_no }}" type="text" name="Section_no" id="Section_no"
                                    class="form-control" placeholder="" aria-describedby="helpId">
                                <p class="text-danger error Section_no-error"></p>
                            </div>
                            <div class="from-group">
                                <label for="status">Status</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="1" {{ $section->status == 1 ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ $section->status == 0 ? 'selected' : '' }}>Block</option>
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
        $("#editsectionFrom").submit(function(event) {
            event.preventDefault();

            $.ajax({
                url: "{{ route('admin.section.update', $section->sections_id) }}",
                type: 'POST',
                dataType: 'json',
                data: $("#editsectionFrom").serializeArray(),
                success: function(response) {


                    if (response.status == 200) {

                        window.location.href = '{{ route('admin.section.index') }}';
                        //location.replace('/admin/services/list');


                    } else {
                        $('.Section_no-error').html(response.errors.Section_no);

                    }
                }
            });

        });
    </script>
@endsection
