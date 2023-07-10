@extends('faculty.layouts2.adminapp')

@section('content')
    <div class="content-wrapper">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <form action="" method="post" name="editblogFrom" id="editblogFrom">
                    <div class="card">
                        <div class="card-header">{{ __('Category Edit') }}</div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-4">
                                    <br>
                                    <a name="" id="" class="btn btn-primary"
                                        href="{{ route('editor.category.index') }}" role="button">Back</a>
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
                                <label for="">Name</label>
                                <input value="{{ $category->category_name }}" type="text" name="category_name"
                                    id="category_name" class="form-control" placeholder="" aria-describedby="helpId">
                                <p class="text-danger error category_name-error"></p>
                            </div>
                            <div class="form-group">
                                <label for="">Description</label>
                                <textarea name="description" id="summernote" class="summernote" cols="30" rows="10">{{ $category->description }}</textarea>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <input type="text" id="image_id" name="image_id" value="">
                                    <label for=""><b>Image</b></label><br>
                                    <div id="image" class="dropzone dz-clickable">
                                        <div class="dz-message needsclick">
                                            <br>Drop files here or click to upload.
                                            <br><br>
                                        </div>
                                    </div>
                                    <img class="img-thumbnail mt-4 "
                                        src="{{ asset('uploads/category/thumb/small/' . $category->picture) }}" width="300"
                                        alt="">
                                </div>
                            </div>
                            <div class="from-group">
                                <label for="status">Status</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="1" {{ $category->status == 1 ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ $category->status == 0 ? 'selected' : '' }}>Block</option>
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
            url: "{{ route('editor.heroslider.temp') }}",
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

        $("#editblogFrom").submit(function(event) {
            event.preventDefault();

            $.ajax({
                url: '{{ route('editor.category.update', $category->id) }}',
                type: 'POST',
                dataType: 'json',
                data: $("#editblogFrom").serializeArray(),
                success: function(response) {


                    if (response.status == 200) {

                        //location.replace('/admin/blogs/list');
                        window.location.href = '{{ route('editor.category.index') }}';



                    } else {
                        $('.category_name-error').html(response.errors.category_name);

                    }
                }
            });

        });
    </script>
@endsection
