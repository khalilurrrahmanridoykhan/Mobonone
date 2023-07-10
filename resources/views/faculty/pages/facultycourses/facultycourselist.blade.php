@extends('faculty.layouts2.adminapp')

@section('content')
    <div class="content-wrapper">
        <div class="row justify-content-center">
            @if ($getcourse->all() != null)
                @foreach ($getcourse as $getcourses)
                    <div class="col-md-5">

                        <div  class="card">
                            {{-- <div class="card-header">{{ __('  Course Assignment List') }}</div> --}}

                            <div class="facultycourse card-body">

                                <h3 class="thisish3elementfacultylist">{{ $getcourses->courses_code }}</h3>
                                <p class="thisish3elementfacultylist"> Section: {{ $getcourses->Section_no }}</p>
                                <p class="thisish3elementfacultylist">Room:{{ $getcourses->room_no_for_class }} </p>
                                {{-- <p>Students:
                                    @if ( $gettotalstudent!= null)
                                        {{ $gettotalstudent }}
                                    @else
                                        0
                                    @endif
                                </p> --}}
                                <p class="thisish3elementfacultylist">Schedule: {{ $getcourses->time }} ({{ $getcourses->day }})</p>
                                <a name="" id="" class="primary" href="{{ url('faculty/viewstudent/' . $getcourses->faculties_id . '/' . $getcourses->course ) }}">View Students</a>



                            </div>
                        </div>
                    </div>
                @endforeach
            @endif


        </div>
    </div>
@endsection
