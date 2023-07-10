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

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email input -->
        <div class="form-outline mb-4">
            <input type="email" id="email" name="email" class="form-control form-control-lg"
                placeholder="Enter your email address" />
        </div>

        <div class="text-center text-lg-start mt-4 pt-2">
            <button type="submit" class="btn btn-primary btn-lg"
                style="padding-left: 2.5rem; padding-right: 2.5rem;">Email Password Reset Link</button>
            {{-- <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="#!"
                    class="link-danger">Register</a></p> --}}
        </div>

    </form>

    <!-- Remind Passowrd -->
    <div id="formFooter">
      <a class="underlineHover" href="#">Forgot Password?</a>
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
