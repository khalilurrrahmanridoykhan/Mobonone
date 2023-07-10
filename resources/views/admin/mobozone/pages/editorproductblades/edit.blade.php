@extends('faculty.layouts2.adminapp')

@section('content')
    <div class="content-wrapper">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <form action="" method="post" name="editproductFrom" id="editproductFrom">
                    <div class="card">
                        <div class="card-header">{{ __('Product Edit') }}</div>
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
                                <input value="{{ $product->name }}" type="text" name="name" id="name" class="form-control" placeholder=""
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
                                        <select class="form-control" name="category_id" id="category_id">
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
                                            <select class="form-control" name="brand_id" id="brand_id">
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
                                <input value="{{ $product->technology }}" type="text" name="technology" id="technology" class="form-control" placeholder=""
                                    aria-describedby="helpId">
                                {{-- <p class="text-danger error name-error"></p> --}}
                            </div>

                            <div class="form-group">
                                <label for="">2G Bonds</label>
                                <input value="{{ $product->twogbands }}" type="text" name="twogbands" id="twogbands" class="form-control" placeholder=""
                                    aria-describedby="helpId">
                                {{-- <p class="text-danger error name-error"></p> --}}
                            </div>

                            <div class="form-group">
                                <label for="">3G Bonds</label>
                                <input value="{{ $product->threegbands }}" type="text" name="threegbands" id="threegbands" class="form-control"
                                    placeholder="" aria-describedby="helpId">
                                {{-- <p class="text-danger error name-error"></p> --}}
                            </div>

                            <div class="form-group">
                                <label for="">4G Bonds</label>
                                <input value="{{ $product->fourgbands }}" type="text" name="fourgbands" id="fourgbands" class="form-control" placeholder=""
                                    aria-describedby="helpId">
                                {{-- <p class="text-danger error name-error"></p> --}}
                            </div>

                            <div class="form-group">
                                <label for="">5G Bonds</label>
                                <input value="{{ $product->fivergbands }}" type="text" name="fivergbands" id="fivergbands" class="form-control"
                                    placeholder="" aria-describedby="helpId">
                                {{-- <p class="text-danger error name-error"></p> --}}
                            </div>

                            <div class="form-group">
                                <label for="">Speed</label>
                                <input value="{{ $product->speed }}" type="text" name="speed" id="speed" class="form-control" placeholder=""
                                    aria-describedby="helpId">
                                {{-- <p class="text-danger error name-error"></p> --}}
                            </div>



                            <h3>Launch</h3>

                            <div class="form-group">
                                <label for="">Announced</label>
                                <input value="{{ $product->announced }}" type="text" name="announced" id="announced" class="form-control"
                                    placeholder="" aria-describedby="helpId">
                                {{-- <p class="text-danger error name-error"></p> --}}
                            </div>

                            <div class="form-group">
                                <label for="">Status</label>
                                <input value="{{ $product->availablety }}" type="text" name="availablety" id="availablety" class="form-control"
                                    placeholder="" aria-describedby="helpId">
                                {{-- <p class="text-danger error name-error"></p> --}}
                            </div>

                            <h3>Body</h3>

                            <div class="form-group">
                                <label for="">Dimensions</label>
                                <input value="{{ $product->dimensions }}" type="text" name="dimensions" id="dimensions" class="form-control"
                                    placeholder="" aria-describedby="helpId">
                                {{-- <p class="text-danger error name-error"></p> --}}
                            </div>

                            <div class="form-group">
                                <label for="">Weight</label>
                                <input value="{{ $product->weight }}" type="text" name="weight" id="weight" class="form-control" placeholder=""
                                    aria-describedby="helpId">
                                {{-- <p class="text-danger error name-error"></p> --}}
                            </div>

                            <div class="form-group">
                                <label for="">Build</label>
                                <input value="{{ $product->build }}" type="text" name="build" id="build" class="form-control" placeholder=""
                                    aria-describedby="helpId">
                                {{-- <p class="text-danger error name-error"></p> --}}
                            </div>

                            <div class="form-group">
                                <label for="">Sim</label>
                                <input value="{{ $product->sim }}" type="text" name="sim" id="sim" class="form-control" placeholder=""
                                    aria-describedby="helpId">
                                {{-- <p class="text-danger error name-error"></p> --}}
                            </div>


                            <h3>Disply</h3>

                            <div class="form-group">
                                <label for="">Type</label>
                                <input value="{{ $product->type }}" type="text" name="type" id="type" class="form-control" placeholder=""
                                    aria-describedby="helpId">
                                {{-- <p class="text-danger error name-error"></p> --}}
                            </div>

                            <div class="form-group">
                                <label for="">Size</label>
                                <input value="{{ $product->size }}" type="text" name="size" id="size" class="form-control" placeholder=""
                                    aria-describedby="helpId">
                                {{-- <p class="text-danger error name-error"></p> --}}
                            </div>

                            <div class="form-group">
                                <label for="">Resulation</label>
                                <input value="{{ $product->reslution }}" type="text" name="reslution" id="reslution" class="form-control"
                                    placeholder="" aria-describedby="helpId">
                                {{-- <p class="text-danger error name-error"></p> --}}
                            </div>



                            <h3>Platform</h3>
                            <div class="form-group">
                                <label for="">Os</label>
                                <input value="{{ $product->os }}" type="text" name="os" id="os" class="form-control" placeholder=""
                                    aria-describedby="helpId">
                                {{-- <p class="text-danger error name-error"></p> --}}
                            </div>

                            <div class="form-group">
                                <label for="">Chipset</label>
                                <input value="{{ $product->chipset }}" type="text" name="chipset" id="chipset" class="form-control" placeholder=""
                                    aria-describedby="helpId">
                                {{-- <p class="text-danger error name-error"></p> --}}
                            </div>

                            <div class="form-group">
                                <label for="">CPU</label>
                                <input value="{{ $product->cpu }}" type="text" name="cpu" id="cpu" class="form-control" placeholder=""
                                    aria-describedby="helpId">
                                {{-- <p class="text-danger error name-error"></p> --}}
                            </div>

                            <div class="form-group">
                                <label for="">GPU</label>
                                <input value="{{ $product->gpu }}" type="text" name="gpu" id="gpu" class="form-control" placeholder=""
                                    aria-describedby="helpId">
                                {{-- <p class="text-danger error name-error"></p> --}}
                            </div>


                            <h3>Memory</h3>
                            <div class="form-group">
                                <label for="">Caed Slot</label>
                                <input value="{{ $product->cardslot }}" type="text" name="cardslot" id="cardslot" class="form-control"
                                    placeholder="" aria-describedby="helpId">
                                {{-- <p class="text-danger error name-error"></p> --}}
                            </div>

                            <div class="form-group">
                                <label for="">Internal</label>
                                <input value="{{ $product->internal }}" type="text" name="internal" id="internal" class="form-control"
                                    placeholder="" aria-describedby="helpId">
                                {{-- <p class="text-danger error name-error"></p> --}}
                            </div>

                            <h3>Main Camera</h3>
                            <div class="form-group">
                                <label for="">Tripple</label>
                                <input value="{{ $product->tripple }}" type="text" name="tripple" id="tripple" class="form-control" placeholder=""
                                    aria-describedby="helpId">
                                {{-- <p class="text-danger error name-error"></p> --}}
                            </div>


                            <div class="form-group">
                                <label for="">Feature</label>
                                <input value="{{ $product->feature }}" type="text" name="feature" id="feature" class="form-control" placeholder=""
                                    aria-describedby="helpId">
                                {{-- <p class="text-danger error name-error"></p> --}}
                            </div>


                            <div class="form-group">
                                <label for="">Video</label>
                                <input value="{{ $product->videomain }}" type="text" name="videomain" id="videomain" class="form-control"
                                    placeholder="" aria-describedby="helpId">
                                {{-- <p class="text-danger error name-error"></p> --}}
                            </div>


                            <h3>Selfie Camera</h3>

                            <div class="form-group">
                                <label for="">Single</label>
                                <input value="{{ $product->single }}" type="text" name="single" id="single" class="form-control" placeholder=""
                                    aria-describedby="helpId">
                                {{-- <p class="text-danger error name-error"></p> --}}
                            </div>


                            <div class="form-group">
                                <label for="">Video</label>
                                <input value="{{ $product->videoselfie }}" type="text" name="videoselfie" id="videoselfie" class="form-control"
                                    placeholder="" aria-describedby="helpId">
                                {{-- <p class="text-danger error name-error"></p> --}}
                            </div>


                            <h3>Sound</h3>
                            <div class="form-group">
                                <label for="">Loudspeaker</label>
                                <input value="{{ $product->loudspeaker }}" type="text" name="loudspeaker" id="loudspeaker" class="form-control"
                                    placeholder="" aria-describedby="helpId">
                                {{-- <p class="text-danger error name-error"></p> --}}
                            </div>


                            <div class="form-group">
                                <label for="">3.5mm Jack</label>
                                <input value="{{ $product->mmjack }}" type="text" name="mmjack" id="mmjack" class="form-control" placeholder=""
                                    aria-describedby="helpId">
                                {{-- <p class="text-danger error name-error"></p> --}}
                            </div>

                            <h3>Comms</h3>
                            <div class="form-group">
                                <label for="">WLAN</label>
                                <input value="{{ $product->wlantab }}" type="text" name="wlantab" id="wlantab" class="form-control" placeholder=""
                                    aria-describedby="helpId">
                                {{-- <p class="text-danger error name-error"></p> --}}
                            </div>


                            <div class="form-group">
                                <label for="">Bluetooth</label>
                                <input value="{{ $product->bluetootht }}" type="text" name="bluetootht" id="bluetootht" class="form-control"
                                    placeholder="" aria-describedby="helpId">
                                {{-- <p class="text-danger error name-error"></p> --}}
                            </div>


                            <div class="form-group">
                                <label for="">Positioning</label>
                                <input value="{{ $product->positioning }}" type="text" name="positioning" id="positioning" class="form-control"
                                    placeholder="" aria-describedby="helpId">
                                {{-- <p class="text-danger error name-error"></p> --}}
                            </div>


                            <div class="form-group">
                                <label for="">NFC</label>
                                <input value="{{ $product->nfc }}" type="text" name="nfc" id="nfc" class="form-control" placeholder=""
                                    aria-describedby="helpId">
                                {{-- <p class="text-danger error name-error"></p> --}}
                            </div>


                            <div class="form-group">
                                <label for="">Radio</label>
                                <input value="{{ $product->radio }}" type="text" name="radio" id="radio" class="form-control" placeholder=""
                                    aria-describedby="helpId">
                                {{-- <p class="text-danger error name-error"></p> --}}
                            </div>

                            <div class="form-group">
                                <label for="">USB</label>
                                <input value="{{ $product->usb }}" type="text" name="usb" id="usb" class="form-control" placeholder=""
                                    aria-describedby="helpId">
                                {{-- <p class="text-danger error name-error"></p> --}}
                            </div>

                            <h3>Features</h3>


                            <div class="form-group">
                                <label for="">Sensor</label>
                                <input value="{{ $product->sensor }}" type="text" name="sensor" id="sensor" class="form-control" placeholder=""
                                    aria-describedby="helpId">
                                {{-- <p class="text-danger error name-error"></p> --}}
                            </div>

                            <h3>Battery</h3>
                            <div class="form-group">
                                <label for="">Type</label>
                                <input value="{{ $product->ballerytype }}" type="text" name="ballerytype" id="ballerytype" class="form-control"
                                    placeholder="" aria-describedby="helpId">
                                {{-- <p class="text-danger error name-error"></p> --}}
                            </div>

                            <div class="form-group">
                                <label for="">Charging</label>
                                <input value="{{ $product->charging }}" type="text" name="charging" id="charging" class="form-control"
                                    placeholder="" aria-describedby="helpId">
                                {{-- <p class="text-danger error name-error"></p> --}}
                            </div>

                            <h3>Misc</h3>
                            <div class="form-group">
                                <label for="">Color</label>
                                <input value="{{ $product->color }}" type="text" name="color" id="color" class="form-control" placeholder=""
                                    aria-describedby="helpId">
                                {{-- <p class="text-danger error name-error"></p> --}}
                            </div>

                            <div class="form-group">
                                <label for="">Model</label>
                                <input value="{{ $product->model }}" type="text" name="model" id="model" class="form-control" placeholder=""
                                    aria-describedby="helpId">
                                {{-- <p class="text-danger error name-error"></p> --}}
                            </div>

                            <div class="form-group">
                                <label for="">SAR</label>
                                <input value="{{ $product->sar }}" type="text" name="sar" id="sar" class="form-control" placeholder=""
                                    aria-describedby="helpId">
                                {{-- <p class="text-danger error name-error"></p> --}}
                            </div>

                            <div class="form-group">
                                <label for="">Price</label>
                                <input value="{{ $product->price }}" type="text" name="price" id="price" class="form-control" placeholder=""
                                    aria-describedby="helpId">
                                {{-- <p class="text-danger error name-error"></p> --}}
                            </div>


                            <div class="form-group">
                                <label for="">Sale Price</label>
                                <input value="{{ $product->sale_price }}" type="text" name="sale_price" id="sale_price" class="form-control"
                                    placeholder="" aria-describedby="helpId">
                                {{-- <p class="text-danger error name-error"></p> --}}
                            </div>




                            <div class="row">
                                <div class="col-md-12">
                                    <input  type="text" id="image_id" name="image_id" value="">
                                    <label for=""><b>Image</b></label><br>
                                    <div id="image" class="dropzone dz-clickable">
                                        <div class="dz-message needsclick">
                                            <br>Drop files here or click to upload.
                                            <br><br>
                                        </div>
                                    </div>
                                    <img class="img-thumbnail mt-4 "
                                        src="{{ asset('uploads/product/thumb/small/' . $product->img) }}" width="300"
                                        alt="">
                                </div>
                            </div>

                            <div class="from-group">
                                <label for="status">Status</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="1" {{ $product->status == 1 ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ $product->status == 0 ? 'selected' : '' }}>Block</option>
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

        $("#editproductFrom").submit(function(event) {
            event.preventDefault();

            $.ajax({
                url: '{{ route('editor.product.update', $product->products_id) }}',
                type: 'POST',
                dataType: 'json',
                data: $("#editproductFrom").serializeArray(),
                success: function(response) {


                    if (response.status == 200) {

                        //location.replace('/admin/blogs/list');
                        window.location.href = '{{ route('editor.product.index') }}';



                    } else {
                        $('.name-error').html(response.errors.name);

                    }
                }
            });

        });
    </script>
@endsection
