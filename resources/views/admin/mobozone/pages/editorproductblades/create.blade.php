@extends('faculty.layouts2.adminapp')

@section('content')
    <div class="content-wrapper">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <form action="" method="post" name="createServiceFrom" id="createServiceFrom">
                    <div class="card">
                        <div class="card-header">{{ __('Product Create') }}</div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-4">
                                    <br>
                                    <a name="" id="" class="btn btn-primary"
                                        href="{{ route('editor.product.index') }}" role="button">Back</a>
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
                                <label for="">Product Name</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder=""
                                    aria-describedby="helpId">
                                <p class="text-danger error name-error"></p>
                            </div>


                            <div class="form-group">
                                <label for="">Description</label>
                                <textarea name="description" id="summernote" class="summernote" cols="30" rows="10"></textarea>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Catagory</label>
                                        <select class="form-control" name="category_id" id="category_id" >
                                            {{-- @dd($category) --}}
                                            @if (!empty($category))
                                                @foreach ($category as $categorys)
                                                    <option value="{{ $categorys->id }}">{{ $categorys->category_name }}
                                                    </option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6" id="brandcontent">
                                    <div class="hide-section">

                                        <div class="form-group">
                                            <label for="">Brand</label>
                                            <select class="form-control" name="brand_id" id="brand_id" >
                                                {{-- @dd($category) --}}
                                                @if (!empty($brand))
                                                    @foreach ($brand as $brands)
                                                        <option value="{{ $brands->brands_id }}">{{ $brands->name }}
                                                        </option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <h3>Network</h3>
                            <div class="form-group">
                                <label for="">Technology</label>
                                <input type="text" name="technology" id="technology" class="form-control" placeholder=""
                                    aria-describedby="helpId">
                                {{-- <p class="text-danger error name-error"></p> --}}
                            </div>

                            <div class="form-group">
                                <label for="">2G Bonds</label>
                                <input type="text" name="twogbands" id="twogbands" class="form-control" placeholder=""
                                    aria-describedby="helpId">
                                {{-- <p class="text-danger error name-error"></p> --}}
                            </div>

                            <div class="form-group">
                                <label for="">3G Bonds</label>
                                <input type="text" name="threegbands" id="threegbands" class="form-control"
                                    placeholder="" aria-describedby="helpId">
                                {{-- <p class="text-danger error name-error"></p> --}}
                            </div>

                            <div class="form-group">
                                <label for="">4G Bonds</label>
                                <input type="text" name="fourgbands" id="fourgbands" class="form-control" placeholder=""
                                    aria-describedby="helpId">
                                {{-- <p class="text-danger error name-error"></p> --}}
                            </div>

                            <div class="form-group">
                                <label for="">5G Bonds</label>
                                <input type="text" name="fivergbands" id="fivergbands" class="form-control"
                                    placeholder="" aria-describedby="helpId">
                                {{-- <p class="text-danger error name-error"></p> --}}
                            </div>

                            <div class="form-group">
                                <label for="">Speed</label>
                                <input type="text" name="speed" id="speed" class="form-control" placeholder=""
                                    aria-describedby="helpId">
                                {{-- <p class="text-danger error name-error"></p> --}}
                            </div>



                            <h3>Launch</h3>

                            <div class="form-group">
                                <label for="">Announced</label>
                                <input type="text" name="announced" id="announced" class="form-control"
                                    placeholder="" aria-describedby="helpId">
                                {{-- <p class="text-danger error name-error"></p> --}}
                            </div>

                            <div class="form-group">
                                <label for="">Status</label>
                                <input type="text" name="availablety" id="availablety" class="form-control"
                                    placeholder="" aria-describedby="helpId">
                                {{-- <p class="text-danger error name-error"></p> --}}
                            </div>

                            <h3>Body</h3>

                            <div class="form-group">
                                <label for="">Dimensions</label>
                                <input type="text" name="dimensions" id="dimensions" class="form-control"
                                    placeholder="" aria-describedby="helpId">
                                {{-- <p class="text-danger error name-error"></p> --}}
                            </div>

                            <div class="form-group">
                                <label for="">Weight</label>
                                <input type="text" name="weight" id="weight" class="form-control" placeholder=""
                                    aria-describedby="helpId">
                                {{-- <p class="text-danger error name-error"></p> --}}
                            </div>

                            <div class="form-group">
                                <label for="">Build</label>
                                <input type="text" name="build" id="build" class="form-control" placeholder=""
                                    aria-describedby="helpId">
                                {{-- <p class="text-danger error name-error"></p> --}}
                            </div>

                            <div class="form-group">
                                <label for="">Sim</label>
                                <input type="text" name="sim" id="sim" class="form-control" placeholder=""
                                    aria-describedby="helpId">
                                {{-- <p class="text-danger error name-error"></p> --}}
                            </div>


                            <h3>Disply</h3>

                            <div class="form-group">
                                <label for="">Type</label>
                                <input type="text" name="type" id="type" class="form-control" placeholder=""
                                    aria-describedby="helpId">
                                {{-- <p class="text-danger error name-error"></p> --}}
                            </div>

                            <div class="form-group">
                                <label for="">Size</label>
                                <input type="text" name="size" id="size" class="form-control" placeholder=""
                                    aria-describedby="helpId">
                                {{-- <p class="text-danger error name-error"></p> --}}
                            </div>

                            <div class="form-group">
                                <label for="">Resulation</label>
                                <input type="text" name="reslution" id="reslution" class="form-control"
                                    placeholder="" aria-describedby="helpId">
                                {{-- <p class="text-danger error name-error"></p> --}}
                            </div>



                            <h3>Platform</h3>
                            <div class="form-group">
                                <label for="">Os</label>
                                <input type="text" name="os" id="os" class="form-control" placeholder=""
                                    aria-describedby="helpId">
                                {{-- <p class="text-danger error name-error"></p> --}}
                            </div>

                            <div class="form-group">
                                <label for="">Chipset</label>
                                <input type="text" name="chipset" id="chipset" class="form-control" placeholder=""
                                    aria-describedby="helpId">
                                {{-- <p class="text-danger error name-error"></p> --}}
                            </div>

                            <div class="form-group">
                                <label for="">CPU</label>
                                <input type="text" name="cpu" id="cpu" class="form-control" placeholder=""
                                    aria-describedby="helpId">
                                {{-- <p class="text-danger error name-error"></p> --}}
                            </div>

                            <div class="form-group">
                                <label for="">GPU</label>
                                <input type="text" name="gpu" id="gpu" class="form-control" placeholder=""
                                    aria-describedby="helpId">
                                {{-- <p class="text-danger error name-error"></p> --}}
                            </div>


                            <h3>Memory</h3>
                            <div class="form-group">
                                <label for="">Caed Slot</label>
                                <input type="text" name="cardslot" id="cardslot" class="form-control"
                                    placeholder="" aria-describedby="helpId">
                                {{-- <p class="text-danger error name-error"></p> --}}
                            </div>

                            <div class="form-group">
                                <label for="">Internal</label>
                                <input type="text" name="internal" id="internal" class="form-control"
                                    placeholder="" aria-describedby="helpId">
                                {{-- <p class="text-danger error name-error"></p> --}}
                            </div>

                            <h3>Main Camera</h3>
                            <div class="form-group">
                                <label for="">Tripple</label>
                                <input type="text" name="tripple" id="tripple" class="form-control" placeholder=""
                                    aria-describedby="helpId">
                                {{-- <p class="text-danger error name-error"></p> --}}
                            </div>


                            <div class="form-group">
                                <label for="">Feature</label>
                                <input type="text" name="feature" id="feature" class="form-control" placeholder=""
                                    aria-describedby="helpId">
                                {{-- <p class="text-danger error name-error"></p> --}}
                            </div>


                            <div class="form-group">
                                <label for="">Video</label>
                                <input type="text" name="videomain" id="videomain" class="form-control"
                                    placeholder="" aria-describedby="helpId">
                                {{-- <p class="text-danger error name-error"></p> --}}
                            </div>


                            <h3>Selfie Camera</h3>

                            <div class="form-group">
                                <label for="">Single</label>
                                <input type="text" name="single" id="single" class="form-control" placeholder=""
                                    aria-describedby="helpId">
                                {{-- <p class="text-danger error name-error"></p> --}}
                            </div>


                            <div class="form-group">
                                <label for="">Video</label>
                                <input type="text" name="videoselfie" id="videoselfie" class="form-control"
                                    placeholder="" aria-describedby="helpId">
                                {{-- <p class="text-danger error name-error"></p> --}}
                            </div>


                            <h3>Sound</h3>
                            <div class="form-group">
                                <label for="">Loudspeaker</label>
                                <input type="text" name="loudspeaker" id="loudspeaker" class="form-control"
                                    placeholder="" aria-describedby="helpId">
                                {{-- <p class="text-danger error name-error"></p> --}}
                            </div>


                            <div class="form-group">
                                <label for="">3.5mm Jack</label>
                                <input type="text" name="mmjack" id="mmjack" class="form-control" placeholder=""
                                    aria-describedby="helpId">
                                {{-- <p class="text-danger error name-error"></p> --}}
                            </div>

                            <h3>Comms</h3>
                            <div class="form-group">
                                <label for="">WLAN</label>
                                <input type="text" name="wlantab" id="wlantab" class="form-control" placeholder=""
                                    aria-describedby="helpId">
                                {{-- <p class="text-danger error name-error"></p> --}}
                            </div>


                            <div class="form-group">
                                <label for="">Bluetooth</label>
                                <input type="text" name="bluetootht" id="bluetootht" class="form-control"
                                    placeholder="" aria-describedby="helpId">
                                {{-- <p class="text-danger error name-error"></p> --}}
                            </div>


                            <div class="form-group">
                                <label for="">Positioning</label>
                                <input type="text" name="positioning" id="positioning" class="form-control"
                                    placeholder="" aria-describedby="helpId">
                                {{-- <p class="text-danger error name-error"></p> --}}
                            </div>


                            <div class="form-group">
                                <label for="">NFC</label>
                                <input type="text" name="nfc" id="nfc" class="form-control" placeholder=""
                                    aria-describedby="helpId">
                                {{-- <p class="text-danger error name-error"></p> --}}
                            </div>


                            <div class="form-group">
                                <label for="">Radio</label>
                                <input type="text" name="radio" id="radio" class="form-control" placeholder=""
                                    aria-describedby="helpId">
                                {{-- <p class="text-danger error name-error"></p> --}}
                            </div>

                            <div class="form-group">
                                <label for="">USB</label>
                                <input type="text" name="usb" id="usb" class="form-control" placeholder=""
                                    aria-describedby="helpId">
                                {{-- <p class="text-danger error name-error"></p> --}}
                            </div>

                            <h3>Features</h3>


                            <div class="form-group">
                                <label for="">Sensor</label>
                                <input type="text" name="sensor" id="sensor" class="form-control" placeholder=""
                                    aria-describedby="helpId">
                                {{-- <p class="text-danger error name-error"></p> --}}
                            </div>

                            <h3>Battery</h3>
                            <div class="form-group">
                                <label for="">Type</label>
                                <input type="text" name="ballerytype" id="ballerytype" class="form-control"
                                    placeholder="" aria-describedby="helpId">
                                {{-- <p class="text-danger error name-error"></p> --}}
                            </div>

                            <div class="form-group">
                                <label for="">Charging</label>
                                <input type="text" name="charging" id="charging" class="form-control"
                                    placeholder="" aria-describedby="helpId">
                                {{-- <p class="text-danger error name-error"></p> --}}
                            </div>

                            <h3>Misc</h3>
                            <div class="form-group">
                                <label for="">Color</label>
                                <input type="text" name="color" id="color" class="form-control" placeholder=""
                                    aria-describedby="helpId">
                                {{-- <p class="text-danger error name-error"></p> --}}
                            </div>

                            <div class="form-group">
                                <label for="">Model</label>
                                <input type="text" name="model" id="model" class="form-control" placeholder=""
                                    aria-describedby="helpId">
                                {{-- <p class="text-danger error name-error"></p> --}}
                            </div>

                            <div class="form-group">
                                <label for="">SAR</label>
                                <input type="text" name="sar" id="sar" class="form-control" placeholder=""
                                    aria-describedby="helpId">
                                {{-- <p class="text-danger error name-error"></p> --}}
                            </div>

                            <div class="form-group">
                                <label for="">Price</label>
                                <input type="text" name="price" id="price" class="form-control" placeholder=""
                                    aria-describedby="helpId">
                                {{-- <p class="text-danger error name-error"></p> --}}
                            </div>


                            <div class="form-group">
                                <label for="">Sale Price</label>
                                <input type="text" name="sale_price" id="sale_price" class="form-control"
                                    placeholder="" aria-describedby="helpId">
                                {{-- <p class="text-danger error name-error"></p> --}}
                            </div>











                            <div class="form-group">
                                <label for="">Catagory</label>
                                <select class="form-control" name="category_no" id="category_no">
                                    {{-- @dd($category) --}}
                                    @if (!empty($category))
                                        @foreach ($category as $categorys)
                                            <option value="{{ $categorys->id }}">{{ $categorys->category_name }}
                                            </option>
                                        @endforeach
                                    @endif
                                </select>
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
                                </div>

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
        function getBrand() {

            var getcategoryid = document.getElementById("category_no").value;

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "POST",
                url: "{{ URL::to('editor-get-catagory-data') }}",
                data: {
                    'id': getcategoryid
                },
                success: function(response) {
                    console.log(response.brands_id);

                    // $(response).each(i function () {
                    //     console.log(i.brands_id);
                    // });





                    var html = `

                                <div class="hide-section">

                                <div class="form-group">
                                    <label for="">Brand</label>
                                    <select class="form-control" name="category_no" id="category_no" >
                                        {{-- @dd($category) --}}
                                        @if (!empty($response))
                                            @foreach ($response as $responses)
                                                <option value="${ responses.brands_id }">${ responses.name }
                                                </option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                </div>
                            `;

                    $(".hide-section").remove();
                    $("#brandcontent").append(html);
                }
            });
        }













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

        $("#createServiceFrom").submit(function(event) {
            event.preventDefault();

            $.ajax({
                url: '{{ route('editor.product.save') }}',
                type: 'POST',
                dataType: 'json',
                data: $("#createServiceFrom").serializeArray(),
                success: function(response) {


                    if (response.status == 200) {


                        //location.replace('/admin/services/list');
                        // window.location.href = '{{ route('editor.product.index') }}';



                    } else {
                        $('.name-error').html(response.errors.name);

                    }
                }
            });

        });
    </script>
@endsection
