@extends('auth.layouts.main')

@section('content')
<div id="formContent">
    <!-- Tabs Titles -->

    <!-- Login Form -->
    {{-- <form method="POST" action="{{ route('admin.login.store') }}">
        @csrf

      <input type="email" id="email" class="fadeIn second" name="email" placeholder="email">
      <input type="password" id="password" class="fadeIn third" name="password" placeholder="password">
      <input type="submit" class="fadeIn fourth" value="Log In">
    </form> --}}

    <form method="POST" action="{{ route('register') }}">
        @csrf


        {{-- name Input --}}
        <div class="form-outline mb-4">
            <input type="name" id="name" name="name" class="form-control form-control-lg"
                placeholder="Enter a Your name" />
                <x-input-error :messages="$errors->get('name')" class="text-danger mt-2" />

        </div>

        <!-- Email input -->
        <div class="form-outline mb-4">
            <input type="email" id="email" name="email" class="form-control form-control-lg"
                placeholder="Enter a valid email address" />
                <x-input-error :messages="$errors->get('email')" class="text-danger mt-2" />

        </div>

        <!-- Password input -->
        <div class="form-outline mb-3">
            <input type="password" id="password" name="password" class="form-control form-control-lg"
                placeholder="Enter password" />
                <x-input-error :messages="$errors->get('password')" class="text-danger mt-2" />

        </div>

        <!-- Conf Password input -->
        <div class="form-outline mb-3">
            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control form-control-lg"
                placeholder="Enter Conframe password" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="text-danger mt-2" />

        </div>

        <div>
            <p class="text-danger mt-2" >After Register You can't login your Protal. You need to wait untill Our authority give you permition.</p>
        </div>

        <div class="container">
            <div class="row">
                {{-- <div class="col-md-6 text-center text-lg-start mt-4 pt-2"></div> --}}
                <div class="col-md-12">

                    <div class="text-center text-lg-start mt-4 pt-2 pb-2">
                        <button type="submit" class="btn btn-primary btn-lg"
                            style="padding-left: 2.5rem; padding-right: 2.5rem;">Register</button>
                    </div>
                </div>
            </div>
        </div>

    </form>

    <!-- Remind Passowrd -->
    <div id="formFooter">
      {{-- <a class="underlineHover" href="#">Forgot Password?</a> --}}
      <a class="underlineHover" href="/login">Already Regiser</a>
    </div>

  </div>
</div>
@endsection

{{-- @section('extraJs')
    <script type="text/javascript">


                $("#AdminLoginFrom").submit(function(event) {
                    event.preventDefault();

                    $.ajax({
                        url: "{{ route('admin.login.store') }}",
                        type: 'POST',
                        dataType: 'json',
                        data: $("#AdminLoginFrom").serializeArray(),
                        success: function(response) {


                            if (response.status == 200) {


                                //location.replace('/admin/services/list');


                            } else {
                                // $('.room_no_for_class-error').html(response.errors.room_no_for_class);

                            }
                        }

                        // window.location.href = '{{ route('admin.dashbord.index') }}';

                    });

                });
    </script>
@endsection --}}
