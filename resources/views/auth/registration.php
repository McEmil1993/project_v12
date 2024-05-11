<!DOCTYPE html>
<html lang="en">

<head>
    <title>Moto Shop - Registration Panel</title>
    @include('backend.layouts.head')
    <style>
    .position-relative {
        position: relative;
    }

    .position-absolute {
        position: absolute;
        top: 50%;
        /* Centers the icon vertically */
        right: 10px;
        /* Adjust this value as needed */
        transform: translateY(-50%);
        cursor: pointer;
    }

    .form-control-user {
        padding-right: 30px;
        /* Add padding to ensure text doesn't overlap the icon */
    }

    .image-upload>input {
        display: none;
    }
    </style>
</head>

<body class="bg-gradient-info">

    <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-lg-10 mt-5">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Create an Account Store</h1>
                                    </div>
                                    <form class="user" method="POST" action="#">
                                        @csrf
                                        <!-- Row for First Name, Last Name, and Gender -->
                                        <div class="form-group row">
                                            <div class="col-sm-4 mb-3 mb-sm-0">
                                                <input type="text" class="form-control form-control-user"
                                                    name="first_name" placeholder="First Name" required>
                                            </div>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control form-control-user"
                                                    name="middle_name" placeholder="Middle Name">
                                            </div>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control form-control-user"
                                                    name="last_name" placeholder="Last Name" required>
                                            </div>
                                        </div>
                                        <!-- Row for Contact Number and Shop Name -->
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input type="tel" class="form-control form-control-user"
                                                    name="contact_number" placeholder="Contact Number" required>
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control form-control-user"
                                                    name="shop_name" placeholder="Shop Name" required>
                                            </div>
                                        </div>
                                        <!-- Row for Address and Shop Image -->

                                        <div class="form-group row">

                                            <div class="input-group">
                                                <span class="input-group-btn">
                                                    <a id="lfm1" data-input="thumbnail1" data-preview="holder"
                                                        class="btn btn-primary btn-user btn-block" style="color:white">
                                                        <i class="fa fa-picture-o"></i> Choose logo
                                                    </a>
                                                </span>
                                                <input required id="thumbnail1" class="form-control form-control-user"
                                                    type="text" name="shopimage" placeholder="Path name" required>
                                            </div>
                                            <img id="holder" style="margin-top:15px;max-height:100px;">
                                           
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input type="email" class="form-control form-control-user"
                                                    name="email" placeholder="Email" required>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group position-relative">
                                                    <input type="password" class="form-control form-control-user"
                                                        id="password" placeholder="Password" name="password" required
                                                        autocomplete="current-password">
                                                    <i class="fas fa-eye position-absolute" id="togglePassword"></i>

                                                </div>
                                               
                                            </div>
                                        </div>
                                        <!-- Confirm Password -->

                                        <div class="form-group row position-relative" >
                                            <input type="password" class="form-control form-control-user" id="confirm_password"
                                                placeholder="Confirm Password" name="confirm_password" required
                                                autocomplete="current-password" >
                                            <i class="fas fa-eye position-absolute" id="togglePassword1"></i>

                                        </div>

                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Register
                                        </button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="{{ route('login') }}">Already have an account?</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
    // JavaScript for toggling password visibility
    const displayImage = function(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('display-image').innerHTML = '<img src="' + e.target.result +
                    '" class="img-thumbnail" />';
            };
            reader.readAsDataURL(input.files[0]);
        }
    };

    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#password');

    togglePassword.addEventListener('click', function(e) {
        // toggle the type attribute
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        // toggle the eye / eye-slash icon
        this.classList.toggle('fa-eye-slash');
    });

    const togglePassword1 = document.querySelector('#togglePassword1');
    const password1 = document.querySelector('#confirm_password');

    togglePassword1.addEventListener('click', function(e) {
        // toggle the type attribute
        const type1 = password1.getAttribute('type') === 'password' ? 'text' : 'password';
        password1.setAttribute('type', type1);
        // toggle the eye / eye-slash icon
        this.classList.toggle('fa-eye-slash');
    });
    
    </script>

</body>

</html>