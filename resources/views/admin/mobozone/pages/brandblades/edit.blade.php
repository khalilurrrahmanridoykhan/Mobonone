@extends('admin.layouts2.adminapp')

@section('content')
    <div class="content-wrapper">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <form action="" method="post" name="editblogFrom" id="editblogFrom">
                    <div class="card">
                        <div class="card-header">{{ __('Brand Edit') }}</div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-4">
                                    <br>
                                    <a name="" id="" class="btn btn-primary"
                                        href="{{ route('admin.brand.index') }}" role="button">Back</a>
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
                                <input value="{{ $brand->name }}" type="text" name="name"
                                    id="name" class="form-control" placeholder="" aria-describedby="helpId">
                                <p class="text-danger error name-error"></p>
                            </div>
                            <div class="form-group">
                                <label for="">Description</label>
                                <textarea name="description" id="summernote" class="summernote" cols="30" rows="10">{{ $brand->description }}</textarea>
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
                                        src="{{ asset('uploads/brand/thumb/small/' . $brand->img) }}" width="300"
                                        alt="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="">Catagory</label>
                                <select class="form-control" name="category_no" id="category_no">
                                    {{-- @dd($category) --}}
                                    @if (!empty($category))
                                        @foreach ($category as $categorys)
                                            <option value="{{ $categorys->id }}" >{{ $categorys->category_name }}
                                            </option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>

                            <div class="from-group">
                                <label for="status">Status</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="1" {{ $brand->status == 1 ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ $brand->status == 0 ? 'selected' : '' }}>Block</option>
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
                url: '{{ route('admin.brand.update', $brand->brands_id) }}',
                type: 'POST',
                dataType: 'json',
                data: $("#editblogFrom").serializeArray(),
                success: function(response) {


                    if (response.status == 200) {

                        //location.replace('/admin/blogs/list');
                        window.location.href = '{{ route('admin.brand.index') }}';



                    } else {
                        $('.name-error').html(response.errors.name);

                    }
                }
            });

        });
    </script>
@endsection
