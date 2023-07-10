@extends('auth.layouts2.userapp')

@section('content')

    <div class="content-wrapper advisingrulelistdiv">
        <div class=" p-3 advisingrulelisttitle">
            <div class="">ADVISING RULES</div>
        </div>
        {{-- @dd($studentinfo) --}}
        <div class="row  p-3 persionalinforowdiv">
            <div class="col-md-6  persionalinfodiv">
                <p class="pl-5">Program Type : <span>Undergraduate</span></p>
                <p class="pl-5">Completed Credit : <span>{{ $studentinfo->credit }}</span></p>
                <p class="pl-5">Minimum CGPA Required : <span>2.16</span></p>
                <p class="pl-5">Student ID : <span>{{ $studentinfo->id }}</span></p>
                <p class="pl-5">Max Credit : <span>15</span></p>
                <p class="pl-5">Max Course : <span>5</span></p>
                <p class="pl-5">Max Course Drop : <span>One</span></p>
                <p class="pl-5">Max Financial AID Credit : <span></span></p>
            </div>
            <div class="col-md-6 persionalinfodiv">
                <p class="pl-5">Department : <span>Department of CSE</span></p>
                <p class="pl-5">Max Courses per day : <span>3</span></p>
                <p class="pl-5">Max CGPA Required :<span>4</span></p>
                <p class="pl-5">Unique ID :<span>0092110005101097</span></p>
                <p class="pl-5">Min Credit : <span>9</span></p>
                <p class="pl-5">Min Course : <span>3</span></p>
                <p class="pl-5">Max Course Left at F TAB :<span>0</span></p>
                <p class="pl-5">Min Financial AID Credit :<span></span></p>
            </div>
        </div>
    </div>
@endsection
