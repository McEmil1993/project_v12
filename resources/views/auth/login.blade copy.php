<!DOCTYPE html>
<html lang="en">

<head>
    <title>Moto Shop - Login Panel</title>
    @include('backend.layouts.head')

</head>
<style>
    .position-relative {
        position: relative;
    }
    .position-absolute {
        position: absolute;
        top: 50%; /* Centers the icon vertically */
        right: 10px; /* Adjust this value as needed */
        transform: translateY(-50%);
        cursor: pointer;
    }
    .form-control-user {
        padding-right: 30px; /* Add padding to ensure text doesn't overlap the icon */
    }
</style>
<body class="bg-gradient-info">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-lg-6 mt-5">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">



                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Login Panel</h1>
                                    </div>
                                    <form class="user" method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="form-group">
                                            <input type="email"
                                                class="form-control form-control-user @error('email') is-invalid @enderror"
                                                name="email" value="{{ old('email') }}" id="exampleInputEmail"
                                                aria-describedby="emailHelp" placeholder="Enter Email Address..."
                                                required autocomplete="email">
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group position-relative">
                                            <input type="password"
                                                class="form-control form-control-user @error('password') is-invalid @enderror"
                                                id="exampleInputPassword" placeholder="Password" name="password"
                                                required autocomplete="current-password">
                                            <i class="fas fa-eye position-absolute" id="togglePassword"></i>
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="remember"
                                                    id="remember" {{ old('remember') ? 'checked' : '' }}>

                                                <label class="form-check-label" for="remember">
                                                    {{ __('Remember Me') }}
                                                </label>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-success btn-user btn-block">
                                            Login
                                        </button>
                                    </form>
                                    <hr>

                                    <div class="text-center">
                                        @if (Route::has('password.request'))
                                        <a class="btn btn-link small" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                        @endif
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>

            </div>
            <!-- Visit 'codeastro' for more projects -->
        </div>

    </div>
    <script>
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#exampleInputPassword');

    togglePassword.addEventListener('click', function(e) {
        // toggle the type attribute
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        // toggle the eye / eye-slash icon
        this.classList.toggle('fa-eye-slash');
    });
    </script>
</body>

</html>