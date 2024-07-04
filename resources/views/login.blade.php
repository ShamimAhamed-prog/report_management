<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Report Management</title>
    @include('layouts.header')
</head>

<body id="page-top" style="background-color: #f2f0f0 !important;">
    <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-12 text-center mb-2">
                <img src="{{ asset('assets/img/logo.png') }}" class="img-fluid" alt="login"
                    style="max-height:180px;">
                <h1 class="" style="color: red; font-size: 2.5rem; font-family: Arial">Sheba Group Report
                    Management</h1>
            </div>
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg">
                    <div class="card-body">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Login</h1>
                                    </div>
                                    @if (session('error-msg'))
                                        <div class="alert alert-danger">{{ session('error-msg') }}</div>
                                    @elseif (session('success'))
                                        <div class="alert alert-success">{{ session('success') }}</div>
                                    @endif
                                    <form action="{{ route('submit_login') }}" method="post" class="user">
                                        @csrf
                                        <div class="form-group mb-3">
                                            <input type="user_name" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp" name="user_name"
                                                placeholder="Enter Your Post Name">
                                        </div>
                                        <div class="form-group mb-3">
                                            <div class="input-group">
                                                <input type="password" class="form-control form-control-user"
                                                    id="exampleInputPassword" name="password" placeholder="Password">
                                            </div>
                                        </div>
                                        {{-- <div class="form-group mb-3">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="customCheck">
                                                <label class="form-check-label" for="customCheck">Remember Me</label>
                                            </div>
                                        </div> --}}
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                                Login
                                            </button>
                                        </div>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 d-none d-lg-block bg-login-image" style=""> <img
                                    src="{{ asset('assets/img/loginpage.jpg') }}" class="img-fluid" alt="login"
                                    style="max-height: 380px; width:450px"></div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.footer')
</body>
{{--
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const passwordInput = document.querySelector('#exampleInputPassword');
        const togglePasswordButton = document.querySelector('#togglePassword');
        const togglePasswordIcon = document.querySelector('#togglePasswordIcon');

        togglePasswordButton.addEventListener('click', function() {
            const isPassword = passwordInput.type === 'password';
            passwordInput.type = isPassword ? 'text' : 'password';
            togglePasswordIcon.classList.toggle('fa-eye-slash', isPassword);
            togglePasswordIcon.classList.toggle('fa-eye', !isPassword);
        });
    });
</script> --}}

</html>
