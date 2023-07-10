@extends('admin.layouts2.adminapp')

@section('content')
    <div class="content-wrapper">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="card">
                    <div class="card-header">{{ __('Student List') }}</div>

                    <div class="card-body">
                        @if (Session::has('success'))
                            <div class="alert alert-success" role="alert">
                                {{ Session::get('success') }}
                            </div>
                        @elseif (Session::has('errors'))
                            <div class="alert alert-danger" role="alert">
                                {{ Session::get('danger') }}
                            </div>
                        @endif

                        {{-- table header --}}
                        <div class="container">
                            <div class="row">
                                <div class="col-md-4">
                                    <a name="" id="" class="btn btn-success"
                                        href="{{ route('admin.user.create') }}" role="button">Create</a>
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
                                                <th width="80">Image</th>
                                                {{-- <th width="80">Name</th> --}}
                                                <th width="80">Name</th>
                                                {{-- <th width="80">Postion</th> --}}
                                                {{-- <th width="80">Email</th> --}}
                                                <th width="50">CGPA</th>
                                                <th width="50">Credit</th>
                                                {{-- <th width="100">Created At</th> --}}
                                                <th width="100">Status</th>
                                                <th width="100">Edit</th>
                                                <th width="100">Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (!empty($user))
                                                @foreach ($user as $users)
                                                    <tr>
                                                        <td>{{ $users->id }}</td>
                                                        <td>
                                                            @if (!empty($users->img))
                                                                <img src="{{ asset('uploads/users/thumb/small/' . $users->img) }}"
                                                                    width="50" alt="">
                                                            @else
                                                                <img src="{{ asset('no_image/no_image_small.png') }}"
                                                                    width="50" alt="">
                                                            @endif
                                                        </td>
                                                        {{-- <td>{{ $users->name }}</td> --}}
                                                        <td>{{ $users->name }}</td>
                                                        {{-- <td>{{ $users->postion }}</td> --}}
                                                        {{-- <td>{{ $users->email }}</td> --}}
                                                        <td>
                                                            @if (empty($users->cgpa))
                                                                0
                                                            @else
                                                                {{ $users->cgpa }}
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if (empty($users->credit))
                                                                0
                                                            @else
                                                                {{ $users->credit }}
                                                            @endif
                                                        </td>
                                                        {{-- <td>{{ date('d/m/Y', strtotime($users->created_at)) }}</td> --}}
                                                        <td>
                                                            @if ($users->status == 1)
                                                                <span class="badge bg-success">Active</span>
                                                            @else
                                                                <span class="badge bg-danger">Block</span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <span>
                                                                <a href="{{ route('admin.user.edit', $users->id) }}"><img
                                                                        src="{{ asset('admin/assets/myImages/edit-property-24.png') }}"
                                                                        alt=""></a>
                                                            </span>
                                                        </td>
                                                        <td>
                                                            <a href="{{ route('admin.user.delete', $users->id) }}"><img
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
                                @if (!empty($user))
                                    {{ $user->links('pagination::bootstrap-4') }}
                                @endif
                            </div>
                        </div>



                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
