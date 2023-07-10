@extends('admin.layouts2.adminapp')

@section('content')
    <div class="content-wrapper">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="card">
                    <div class="card-header">{{ __(' Timeslot List') }}</div>

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
                                        href="{{ route('admin.timeslot.create') }}" role="button">Create</a>
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
                                                <th width="80">Time</th>
                                                <th width="80">Day</th>
                                                <th width="80">Room No</th>
                                                <th width="80">Created At</th>
                                                <th width="80">Status</th>
                                                <th width="80">Edit</th>
                                                <th width="80">Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (!empty($timeslot))
                                                @foreach ($timeslot as $timeslots)
                                                    <tr>
                                                        <td>{{ $timeslots->time_slots_id }}</td>

                                                        <td>{{ $timeslots->time }}</td>
                                                        <td>{{ $timeslots->day }}</td>
                                                        <td>{{ $timeslots->room_no_for_class }}</td>
                                                        <td>{{ date('d/m/Y', strtotime($timeslots->created_at)) }}</td>
                                                        <td>
                                                            @if ($timeslots->status == 1)
                                                                <span class="badge bg-success">Active</span>
                                                            @else
                                                                <span class="badge bg-danger">Block</span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <span>
                                                                <a href="{{ route('admin.timeslot.edit',$timeslots->time_slots_id ) }}"><img
                                                                        src="{{ asset('admin/assets/myImages/edit-property-24.png') }}"
                                                                        alt=""></a>
                                                            </span>
                                                        </td>
                                                        <td>
                                                            <a href="{{ route('admin.timeslot.delete', $timeslots->time_slots_id) }}"><img
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
                                @if (!empty($timeslot))
                                    {{ $timeslot->links('pagination::bootstrap-4') }}
                                @endif
                            </div>
                        </div>



                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
