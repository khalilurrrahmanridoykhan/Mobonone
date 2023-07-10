@extends('admin.layouts2.adminapp')

@section('content')
    <div class="content-wrapper">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="card">
                    <div class="card-header">{{ __(' Univarsity Other Info List') }}</div>

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
                                    <a name="" id="" class="btn btn-success"
                                        href="{{ route('admin.uniotherinfo.create') }}" role="button">Create</a>
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
                                                <th width="80">Id</th>
                                                <th width="80">Semester</th>
                                                <th width="80">Year</th>
                                                <th width="80">Created At</th>
                                                <th width="80">Status</th>
                                                {{-- <th width="80">Edit</th> --}}
                                                <th width="80">Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (!empty($uniotherinfo))
                                                @foreach ($uniotherinfo as $uniotherinfos)
                                                    <tr>
                                                        <td>{{ $uniotherinfos->uni_other_infos_id }}</td>

                                                        <td>{{ $uniotherinfos->semester }}</td>
                                                        <td>{{ $uniotherinfos->year }}</td>
                                                        <td>{{ date('d/m/Y', strtotime($uniotherinfos->created_at)) }}</td>
                                                        <td>
                                                            @if ($uniotherinfos->status == 1)
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
                                                            <a href="{{ route('admin.uniotherinfo.delete', $uniotherinfos->uni_other_infos_id) }}"><img
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
