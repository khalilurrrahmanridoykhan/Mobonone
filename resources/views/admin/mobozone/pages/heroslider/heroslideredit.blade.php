@extends('admin.layouts2.adminapp')

@section('content')
    <div class=" content-wrapper">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <form action="" method="post" name="editherosliderFrom" id="editherosliderFrom">
                    <div class="card">
                        <div class="card-header">{{ __('Website HeroSlider Edit') }}</div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-4">
                                    <br>
                                    <a name="" id="" class="btn btn-primary" href="{{ route('admin.heroslider.index') }}" role="button">Back</a>
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
                                <label for=""> heroslider Top Titile:</label>
                                <input value="{{ $heroslider->titile_top }}" type="text" name="titile_top" id="titile_top" class="form-control" placeholder=""
                                    aria-describedby="helpId">
                                {{-- <p class="text-danger error toptitle-error"></p> --}}
                            </div>

                            <div class="form-group">
                                <label for="">heroslider Main Title:</label>
                                <input value="{{ $heroslider->titile_main }}" type="text" name="titile_main" id="titile_main" class="form-control" placeholder=""
                                    aria-describedby="helpId">
                                {{-- <p class="text-danger error intal-error"></p> --}}
                            </div>

                            <div class="form-group">
                                <label for="">heroslider Buttom Title:</label>
                                <input value="{{ $heroslider->titile_buttom }}" type="text" name="titile_buttom" id="titile_buttom" class="form-control"
                                    placeholder="" aria-describedby="helpId">
                                {{-- <p class="text-danger error intal-error"></p> --}}
                            </div>


                            <div class="row">
                                <div class="col-md-12">
                                    <input type="hidden" id="image_id" name="image_id" value="">
                                    <label for=""><b>Fontground Image</b></label><br>
                                    <div id="image" class="dropzone dz-clickable">
                                        <div class="dz-message needsclick">
                                            <br>Drop files here or click to upload.
                                            <br><br>
                                        </div>
                                    </div>
                                    <img class="img-thumbnail mt-4 " src="{{ asset('uploads/herosliders/fontground/large/'.$heroslider->font_img) }}" width="300" alt="">

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <input type="hidden" id="image_id1" name="image_id1" value="">
                                    <label for=""><b>Background Image</b></label><br>
                                    <div id="image1" class="dropzone dz-clickable">
                                        <div class="dz-message needsclick">
                                            <br>Drop files here or click to upload.
                                            <br><br>
                                        </div>
                                    </div>
                                    <img class="img-thumbnail mt-4 " src="{{ asset('uploads/herosliders/background/large/'.$heroslider->bg_img) }}" width="300" alt="">

                                </div>
                            </div>

                            <div class="from-group">
                                <label for="status">Status</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="1" {{ ($heroslider->status == 1) ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ ($heroslider->status == 0) ? 'selected' : '' }}>Block</option>
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



        const dropzones = $("#image1").dropzone({
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
                $("#image_id1").val(respinse.id);

            }
        });



        $("#editherosliderFrom").submit(function(event) {
            event.preventDefault();

            $.ajax({
                url: "{{ route('admin.heroslider.update',$heroslider->home_page_hero_slides_id) }}",
                type: 'POST',
                dataType: 'json',
                data: $("#editherosliderFrom").serializeArray(),
                success: function(response) {


                    if (response.status == 200) {

                        window.location.href = '{{ route('admin.heroslider.index') }}';


                    } else {

                    }
                }
            });

        });
    </script>
@endsection
