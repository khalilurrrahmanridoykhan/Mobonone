@extends('auth.layouts2.userapp')

@section('content')


        <div class="row content-wrapper">
            <div class="col-md-11">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if (session('error'))
                            <div class="alert alert-success" role="alert">
                                {{ session('error') }}
                            </div>
                        @endif
                        <h1>Welcome to the user Dashboard....</h1>
                        {{ __('You are logged in!') }}
                    </div>
                </div>
            </div>
        </div>


        <footer class="main-footer">
            <strong>Copyright &copy; 2022 </strong>All rights reserved.
        </footer>

@endsection
