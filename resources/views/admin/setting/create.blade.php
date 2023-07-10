@extends('admin.layouts2.adminapp')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form action="" method="post" name="createSettingFrom" id="createSettingFrom">
                    <div class="card">
                        <div class="card-header">{{ __('Website Setting') }}</div>

                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <div class="form-group">
                                <label for="">Website Title</label>
                                <input value="{{ (!empty($setting->website_title)) ? $setting->website_title: '' }}" type="text" name="website_title"
                                    id="website_title" class="form-control" placeholder="" aria-describedby="helpId">
                                <p class="text-danger error website_title-error"></p>
                            </div>
                            <div class="form-group">
                                <label for="">Website Email</label>
                                <input value="{{(!empty($setting->email)) ? $setting->email: ''  }}" type="text" name="email" id="email"
                                    class="form-control" placeholder="" aria-describedby="helpId">
                                <p class="text-danger error Email-error"></p>
                            </div>
                            <div class="form-group">
                                <label for="">Website Phone</label>
                                <input value="{{  (!empty($setting->phone)) ? $setting->phone: ''}}" type="text" name="phone" id="phone"
                                    class="form-control" placeholder="" aria-describedby="helpId">
                                <p class="text-danger error Phone-error"></p>
                            </div>
                            <br><br>
                            <h3>Socile Links</h3>
                            <div class="form-group">
                                <label for="">Facbook Account</label>
                                <input value="{{ (!empty($setting->facebook_url)) ? $setting->facebook_url: ''}}" type="text" name="facebook_url"
                                    id="facebook_url" class="form-control" placeholder="" aria-describedby="helpId">
                                <p class="text-danger error facbookid-error"></p>
                            </div>
                            <div class="form-group">
                                <label for="">Twiter Account</label>
                                <input value="{{  (!empty($setting->twiter_url)) ? $setting->twiter_url: ''}}" type="text" name="twiter_url" id="twiter_url"
                                    class="form-control" placeholder="" aria-describedby="helpId">
                                <p class="text-danger error Twiterid-error"></p>
                            </div>
                            <div class="form-group">
                                <label for="">Instagram Account</label>
                                <input value="{{ (!empty($setting->instagram_url)) ? $setting->instagram_url: ''}}" type="text" name="instagram_url"
                                    id="instagram_url" class="form-control" placeholder="" aria-describedby="helpId">
                                <p class="text-danger error Instagramid-error"></p>
                            </div>

                            <br><br>
                            <h3>Footer Contact Card</h3>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Contact Card One</label>
                                        <textarea name="contact_card_one" id="contact_card_one" class="summernote" cols="30" rows="10">
                                            {{  (!empty($setting->contact_card_one)) ? $setting->contact_card_one: ''}}
                                        </textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Contact Card Two</label>
                                        <textarea name="contact_card_two" id="contact_card_two" class="summernote" cols="30" rows="10">
                                            {{  (!empty($setting->contact_card_two)) ? $setting->contact_card_two: ''}}
                                        </textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Contact Card Three</label>
                                        <textarea name="contact_card_three" id="contact_card_three" class="summernote" cols="30" rows="10">
                                            {{ (!empty($setting->contact_card_three)) ? $setting->contact_card_three: ''}}
                                        </textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Featured Service</label>
                                    <div class="row">
                                        <div class="col">
                                            <select name="service" id="service" class="form-control">
                                                {{-- <h1>{{ $service->name }}</h1> --}}
                                                @if (!empty($service))
                                                    @foreach ($service as $services)
                                                        <option value="{{ $services->services_id }}">
                                                            {{ $services->name }}
                                                        </option>
                                                    @endforeach
                                                @endif
                                            </select>

                                        </div>
                                        <div class="col">
                                            <button onclick="addService();" type="button" class="btn btn-primary">
                                                Add Service
                                            </button>
                                        </div>
                                        <div class="row">
                                            <p>Select atlest one!</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12" id="service-weapper">

                                            @if ($featuuredService->isNotEmpty())
                                                @foreach ($featuuredService as $featuuredService)
                                                    <div class="ui-state-default p-3 m-2 cursor-pointer-fordrag" data-id= {{ $featuuredService->service_id }}
                                                        id='service-{{ $featuuredService->service_id }}'><span
                                                            class="ui-icon ui-icon-arrowthick-2-n-s"></span>{{ $featuuredService->name }}
                                                            <i type="button" onclick="deleteservice({{ $featuuredService->service_id }});" class="fas fa-xmark servicedeleteicon  fa-fw"></i>
                                                    </div>

                                                @endforeach
                                            @endif
                                            {{-- <div class="ui-state-default p-3 m-2"><span
                                                    class="ui-icon ui-icon-arrowthick-2-n-s"></span>Item 1</div>
                                            <div class="ui-state-default p-3 m-2"><span
                                                    class="ui-icon ui-icon-arrowthick-2-n-s"></span>Item 2</div>
                                            <div class="ui-state-default p-3 m-2"><span
                                                    class="ui-icon ui-icon-arrowthick-2-n-s"></span>Item 3</div>
                                            <div class="ui-state-default p-3 m-2"><span
                                                    class="ui-icon ui-icon-arrowthick-2-n-s"></span>Item 4</div>
                                            <div class="ui-state-default p-3 m-2"><span
                                                    class="ui-icon ui-icon-arrowthick-2-n-s"></span>Item 5</div>
                                            <div class="ui-state-default p-3 m-2"><span
                                                    class="ui-icon ui-icon-arrowthick-2-n-s"></span>Item 6</div>
                                            <div class="ui-state-default p-3 m-2"><span
                                                    class="ui-icon ui-icon-arrowthick-2-n-s"></span>Item 7</div> --}}
                                        </div>
                                    </div>
                                </div>
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
        $(function() {
            $("#service-weapper").sortable();
        });

        function deleteservice(id){
            $("#service-"+id).remove();
        }
        function addService() {
            var serviceId = $("#service").val()
            var serviceName = $("#service option:selected").text();

            var html =
                `<div class="ui-state-default p-3 m-2 cursor-pointer-fordrag" data-id='${serviceId}' id=service-${serviceId}><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>${serviceName}
                    <i type="button" onclick="deleteservice(${serviceId});" class="fas fa-xmark servicedeleteicon  fa-fw"></i>
                    </div>`;
            // alert(html);
            var isFund = false;
            $("#service-weapper .ui-state-default").each(function() {
                var id = $(this).attr('data-id');
                if (id == serviceId) {
                    isFund = true;
                }
            });
            if (isFund == true) {
                alert("You can not select same service again.");
            } else {
                $("#service-weapper").append(html);
            }
        }

        $("#createSettingFrom").submit(function(event) {
            event.preventDefault();

            var servicesString = $("#service-weapper").sortable('serialize');
            console.log(servicesString);
            var data = $("#createSettingFrom").serializeArray();
            data[data.length] = {
                name: 'ridoyservices',
                value: servicesString
            };

            $.ajax({
                url: '{{ route('admin.setting.save') }}',
                type: 'POST',
                dataType: 'json',
                data: data,
                success: function(response) {

                    if (response.status == 200) {

                        // window.location.href = '{{ route('admin.setting.indexwithedit') }}';
                        //location.replace('/admin/services/list');
                        // window.location.href = '{{ route('admin.setting.indexwithedit') }}';

                        // window.location.href = {{ route('admin.setting.indexwithedit') }}

                        location.reload();


                    } else {
                        $('.website_title-error').html(response.errors.website_title);

                    }
                }
            });

        });
    </script>
@endsection
