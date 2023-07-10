@extends('admin.layouts2.adminapp')

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
                                        href="{{ route('admin.category.index') }}" role="button">Back</a>
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
                                <input value="{{ $blogcategory->name }}" type="text" name="name"
                                    id="name" class="form-control" placeholder="" aria-describedby="helpId">
                                <p class="text-danger error name-error"></p>
                            </div>
                            <div class="form-group">
                                <label for="">Description</label>
                                <textarea name="description" id="summernote" class="summernote" cols="30" rows="10">{{ $blogcategory->description }}</textarea>
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
                                        src="{{ asset('uploads/category/thumb/small/' . $blogcategory->img) }}" width="300"
                                        alt="">
                                </div>
                            </div>
                            <div class="from-group">
                                <label for="status">Status</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="1" {{ $blogcategory->status == 1 ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ $blogcategory->status == 0 ? 'selected' : '' }}>Block</option>
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
            url: "{{ route('admin.heroslider.temp') }}",
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
                url: '{{ route('admin.blogcategory.update', $blogcategory->blog_catagories_id) }}',
                type: 'POST',
                dataType: 'json',
                data: $("#editblogFrom").serializeArray(),
                success: function(response) {


                    if (response.status == 200) {

                        //location.replace('/admin/blogs/list');
                        window.location.href = '{{ route('admin.blogcategory.update') }}';



                    } else {
                        $('.name-error').html(response.errors.name);

                    }
                }
            });

        });
    </script>
@endsection
