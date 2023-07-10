@extends('layouts.Dashbordapp')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Menu Setting') }}</div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <a name="" id="" class="btn btn-primary m-2"
                                    href="{{ route('admin.manu.create') }}" role="button">Create Page</a>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <select name="manu-draganddrop" id="manu-draganddrop" class="form-control">
                                        @if (!empty($pagelinks))
                                            @foreach ($pagelinks as $pagelink)
                                                <option value="{{ $pagelink->manulinks_id }}">
                                                    {{ $pagelink->page_name }}
                                                </option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <button onclick="addService();" type="button" class="btn btn-primary">
                                    Add Service
                                </button>
                            </div>
                            {{-- <div class="col">
                                    <button onclick="DeletePageLink();" type="button" class="btn btn-danger">Delete</button>
                                    <a type="button" name="" id="" class="btn btn-danger" href="{{ route('admin.manu.delte' ) }}" role="button">Delete</a>
                                </div> --}}
                        </div>

                        <form name="manuDraganddropFrom" id="manuDraganddropFrom">
                            <div class="row">
                                <div class="col-md-4">
                                    <h3>All Pages</h3>

                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th> </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (!empty($pagelinks))
                                                @foreach ($pagelinks as $pagelink)
                                                    <tr>
                                                        <td>{{ $pagelink->page_name }}</td>
                                                        <td>
                                                            <a name="" id=""
                                                                href="{{ route('admin.manu.delte', $pagelink->manulinks_id) }}"
                                                                role="button">
                                                                <i class="fas fa-xmark servicedeleteicon  fa-fw"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>


                                <div class="col-md-8 " id="manu-draganddrop-show">
                                    @if ($manu_sortables->isNotEmpty())
                                        @foreach ($manu_sortables as $featuuredService)
                                            <div class="ui-state-default p-3 m-2 cursor-pointer-fordrag"
                                                data-id={{ $featuuredService->manulink_id }}
                                                id='service-{{ $featuuredService->manulink_id }}'><span
                                                    class="ui-icon ui-icon-arrowthick-2-n-s"></span>{{ $featuuredService->page_name }}
                                                <i type="button"
                                                    onclick="deleteservice({{ $featuuredService->manulink_id }});"
                                                    class="fas fa-xmark servicedeleteicon  fa-fw"></i>
                                            </div>
                                        @endforeach
                                    @endif

                                </div>
                                <button type="submit" name="submit" class="btn btn-primary">Submit</button>

                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('extraJs')
    <script type="text/javascript">
        $(function() {
            $("#manu-draganddrop-show").sortable();
        });

        function deleteservice(id) {
            $("#service-" + id).remove();
        }

        function addService() {
            var serviceId = $("#manu-draganddrop").val()
            var serviceName = $("#manu-draganddrop option:selected").text();

            var html =
                `<div class="ui-state-default p-3 m-2 cursor-pointer-fordrag" data-id='${serviceId}' id=service-${serviceId}><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>${serviceName}
                    <i type="button" onclick="deleteservice(${serviceId});" class="fas fa-xmark servicedeleteicon  fa-fw"></i>
                    </div>`;
            // alert(html);
            var isFund = false;
            $("#manu-draganddrop-show .ui-state-default").each(function() {
                var id = $(this).attr('data-id');
                if (id == serviceId) {
                    isFund = true;
                }
            });
            if (isFund == true) {
                alert("You can not select same service again.");
            } else {
                $("#manu-draganddrop-show").append(html);
            }

        }
        $("#manuDraganddropFrom").submit(function(event) {
            event.preventDefault();

            var servicesString = $("#manu-draganddrop-show").sortable('serialize');
            // console.log(servicesString);
            var data = $("#manuDraganddropFrom").serializeArray();
            data[data.length] = {
                name: 'ridoyservices',
                value: servicesString
            };

            $.ajax({
                url: '{{ route('admin.manu.savesorted') }}',
                type: 'POST',
                dataType: 'json',
                data: data,
                success: function(response) {

                    if (response.status == 0) {

                        // window.location.href = '{{ route('admin.setting.indexwithedit') }}';
                        //location.replace('/admin/services/divst');
                        // window.location.href = '{{ route('admin.setting.indexwithedit') }}';

                        // window.location.href = {{ route('admin.setting.indexwithedit') }}

                        console.log("Ridoy Khan");
                        location.reload();



                    } else {
                        // $('.website_title-error').html(response.errors.website_title);

                    }
                }
            });

            location.reload();

        });
    </script>
@endsection
