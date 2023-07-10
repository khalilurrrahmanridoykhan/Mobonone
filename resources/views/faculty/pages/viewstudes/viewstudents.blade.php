@extends('faculty.layouts2.adminapp')

@section('content')
    <div class="content-wrapper">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="card">
                    <div class="card-header">{{ __('  Course Assignment List') }}</div>

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
                                    <a name="" id="" class="btn btn-success m-3"
                                        href="{{ route('faculty.courselist.index') }}" role="button">Back</a>
                                </div>
                                <div class="col-md-8">
                                    {{-- @dd($totalcridit) --}}

                                    <p style="text-align: end; font-weight: 600; color: #1f2d3d;" class="m-3 content-end">Total Student In This Section: {{ $totalstudent }}</p>
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
                                                <th >Student Id</th>
                                                <th >Student Name </th>
                                                <th >Course Code</th>
                                                <th >Room</th>
                                                <th >Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if ($getstudent->all()!=null)
                                                @foreach ($getstudent as $getstudents)
                                                    <tr>
                                                        <td>{{ $getstudents->user_id }}</td>

                                                        <td>{{ $getstudents->name }}</td>
                                                        <td>{{ $getstudents->courses_code }}</td>
                                                        <td>{{ $getstudents->room_no_for_class_no }}</td>

                                                        <td>
                                                            <a href="{{ route('faculty.assignment.delete', $getstudents->user_advisings_id) }}"><img
                                                                    src="{{ asset('admin/assets/myImages/delete-24.png') }}"
                                                                    alt=""></a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr>
                                                    <td colspan="6">
                                                        You Haven't Select Any Course.
                                                    </td>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>



                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection
