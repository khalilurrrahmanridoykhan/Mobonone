@extends('admin.layouts2.adminapp')

@section('content')
    <div class="content-wrapper">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="card">
                    <div class="card-header">{{ __('Semester Drop Request List') }}</div>

                    <div class="card-body">
                        @if (Session::has('success'))
                            <div class="alert alert-success" role="alert">
                                {{ Session::get('success') }}
                            </div>
                        @endif
                        {{-- table header --}}
                        <div class="container">
                            <div class="row">
                                <div class="col-md-4">

                                </div>
                                <div class="col-md-8">
                                    <form action="" method="GET">
                                        <div class="input-group mb-3">
                                            <input type="Search" name="keyword" class="form-control" placeholder="Search">
                                            <div class="input-group-append">
                                                <button class="btn btn-info text-light" type="submit">Button</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>

                        {{-- Table --}}

                        <div class="container">
                            <div class="row">
                                <div class="col-md-12 table-responsive p-0">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th width="80">Student Id</th>
                                                <th width="80">Semester</th>
                                                <th width="80">Comment</th>
                                                <th width="80">File</th>
                                                <th width="80">Status</th>
                                                <th width="80">Approve</th>
                                                <th width="80">Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{-- @dd($semesterdrop) --}}
                                            {{-- @dd($semesterdrop) --}}
                                            @if (!empty($semesterdrop))
                                                @foreach ($semesterdrop as $semesterdrops)
                                                    <tr>
                                                        <td>{{ $semesterdrops->student_id }}</td>

                                                        <td>{{ $semesterdrops->semester }}</td>
                                                        <td>{{ $semesterdrops->comment }}</td>
                                                        <td>
                                                            @if (!empty($semesterdrops->file_path))
                                                                <a href="../uploads/semesterdropfile/{{ $semesterdrops->file_path }} "
                                                                    target="_blank" rel="noopener">Downlod</a>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if ($semesterdrops->status == 1)
                                                                <span class="badge bg-success">Active</span>
                                                            @else
                                                                <span class="badge bg-danger">Block</span>
                                                            @endif
                                                        </td>
                                                        {{-- <td>
                                                            <span>
                                                                <a href="{{ route('admin.uniotherinfo.edit',$uniotherinfos->uni_other_infos_id ) }}"><img
                                                                        src="{{ asset('admin/assets/myImages/edit-property-24.png') }}"
                                                                        alt=""></a>
                                                            </span>
                                                        </td> --}}
                                                        <td>
                                                            <form id="approvepostfrom">
                                                                <a type="submit" name="status"
                                                                    onclick="approvepost({{ $semesterdrops->semester_drops_id }});"
                                                                    href="#"><img
                                                                        src="{{ asset('admin/assets/myImages/approve.png') }}"
                                                                        alt=""></a>
                                                            </form>
                                                        </td>
                                                        <td>
                                                            <a onclick="notapprovepost({{ $semesterdrops->semester_drops_id }});" href="#"><img
                                                                    src="{{ asset('admin/assets/myImages/delete-24.png') }}"
                                                                    alt=""></a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr>
                                                    <td colspan="6">
                                                        The row is empty
                                                    </td>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="row">
                                @if (!empty($uniotherinfo))
                                    {{ $uniotherinfo->links('pagination::bootstrap-4') }}
                                @endif
                            </div>
                        </div>



                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('extraJs')
    <script type="text/javascript">
        function approvepost($id) {

            var id = $id;
            // alert(id);

            var url = "{{ route('admin.semesterdrop.approve', ':id') }}";
            url = url.replace(':id', id);
            $.ajax({
                url: url,
                type: 'POST',
                dataType: 'json',
                success: function(
                    response) {
                    if (response
                        .status == 200
                    ) {

                        window.location.href =
                            '{{ route('admin.semesterdrop.index') }}';
                        //location.replace('/admin/services/list');


                    }
                }
            });
        }


        function notapprovepost($id) {

            var id = $id;
            var url = "{{ route('admin.semesterdrop.notapprove', ':id') }}";
            url = url.replace(':id', id);
            $.ajax({
                url: url,
                type: 'POST',
                dataType: 'json',
                success: function(
                    response) {
                    if (response
                        .status == 200
                    ) {

                        window.location.href =
                            '{{ route('admin.semesterdrop.index') }}';
                        //location.replace('/admin/services/list');


                    }
                }
            });
        }
    </script>
@endsection
