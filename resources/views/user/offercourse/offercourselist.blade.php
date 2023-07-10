@extends('auth.layouts2.userapp')

@section('content')
    <div class="content-wrapper">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="card">
                    <div class="card-header">{{ __('Courses Offered') }}</div>

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
                                    {{-- <a name="" id="" class="btn btn-success"
                                        href="{{ route('admin.offercourses.create') }}" role="button">Create</a> --}}
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
                                                <th width="80">course</th>
                                                <th width="80">Section </th>
                                                <th width="80">faculty Intal</th>
                                                <th width="100">Time</th>
                                                <th width="80">Date</th>
                                                <th width="80">Room</th>
                                                <th width="80">Paralal Course</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (!empty($offercourses))
                                                @foreach ($offercourses as $offercoursess)
                                                    <tr>
                                                        <td>{{ $offercoursess->courses_code }}</td>

                                                        <td>{{ $offercoursess->Section_no }}</td>
                                                        <td>{{ $offercoursess->intal }}</td>
                                                        <td>{{ $offercoursess->time }}</td>
                                                        <td>{{ $offercoursess->day }}</td>
                                                        <td>{{ $offercoursess->room_no_for_class }}</td>
                                                        <td>{{ $offercoursess->paralal_courses }}</td>

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

                            {{-- <div class="row">
                                @if (!empty($offercourses))
                                    {{ $offercourses->links('pagination::bootstrap-4') }}
                                @endif
                            </div>
                        </div> --}}



                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
