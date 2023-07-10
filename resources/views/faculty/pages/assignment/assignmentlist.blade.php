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
                                        href="{{ route('faculty.assignment.create') }}" role="button">Create</a>
                                </div>
                                <div class="col-md-8">
                                    {{-- @dd($totalcridit) --}}
                                    <h1 style="display: none">
                                        {{ $totalcridit = 0 }}

                                    </h1>
                                    @if ($assignment->all()!=null)
                                    <h1 style="display: none">
                                        @foreach ($assignment as $assignments)
                                        {{ $totalcridit = $totalcridit + $assignments->credit  }}
                                        @endforeach
                                    </h1>
                                    <p style="text-align: end; font-weight: 600; color: #1f2d3d;" class="m-3 content-end">Your Totle Cridit: {{ $totalcridit }}</p>
                                    @endif
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
                                                <th >course</th>
                                                <th >Section </th>
                                                <th >Time</th>
                                                <th >Date</th>
                                                <th >Room</th>
                                                <th >View Students</th>
                                                <th >Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if ($assignment->all()!=null)
                                                @foreach ($assignment as $assignments)
                                                    <tr>
                                                        <td>{{ $assignments->courses_code }}</td>

                                                        <td>{{ $assignments->Section_no }}</td>
                                                        <td>{{ $assignments->time }}</td>
                                                        <td>{{ $assignments->day }}</td>
                                                        <td>{{ $assignments->room_no_for_class }}</td>
                                                        <td>
                                                            <span>
                                                                <a href="{{ route('faculty.assignment.edit',$assignments->course_faculty_assignments_id ) }}"><img
                                                                        src="{{ asset('admin/assets/myImages/edit-property-24.png') }}"
                                                                        alt=""></a>
                                                            </span>
                                                        </td>
                                                        <td>
                                                            <a href="{{ route('faculty.assignment.delete', $assignments->course_faculty_assignments_id) }}"><img
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

                            {{-- <div class="row">
                                @if (!empty($assignment))
                                    {{ $assignment->links('pagination::bootstrap-4') }}
                                @endif
                            </div>
                        </div> --}}



                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
