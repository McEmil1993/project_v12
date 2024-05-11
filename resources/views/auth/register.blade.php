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

    .btn-choose {
        font-size: 0.8rem;
        border-radius: 10rem;
        padding: 0.75rem 1rem;
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
                                                <label for="first_name">First name</label>
                                                <input type="text" class="form-control" name="first_name"
                                                    id="first_name" placeholder="First Name" required1>
                                            </div>
                                            <div class="col-sm-4">
                                                <label for="middle_name">Middle name</label>
                                                <input type="text" class="form-control" name="middle_name"
                                                    id="middle_name" placeholder="Middle Name">
                                            </div>
                                            <div class="col-sm-4">
                                                <label for="last_name">Last name</label>
                                                <input type="text" class="form-control" name="last_name" id="last_name"
                                                    placeholder="Last Name" required1>
                                            </div>
                                        </div>

                                        <!-- Row for Contact Number and Shop Name -->
                                        <div class="form-group row">
                                            <div class="col-sm-4 mb-3 mb-sm-0">
                                                <label for="contact_number">Contact</label>
                                                <input type="tel" class="form-control" name="contact_number"
                                                    id="contact_number" placeholder="Contact Number" required1>
                                            </div>
                                            <div class="col-sm-4">
                                                <label for="gender">Gender</label>
                                                <select name="gender" class="form-control " required1 id="gender">
                                                    <option value="">Select Gender</option>
                                                    <option value="male">Male</option>
                                                    <option value="female">Female</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-4">
                                                <label for="shop_name">Shop name</label>
                                                <input type="text" class="form-control" name="shop_name" id="shop_name"
                                                    placeholder="Shop Name" required1>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <label for="address">Address</label>
                                                <input type="text" class="form-control" name="address" id="address"
                                                    placeholder="Address" required1>
                                            </div>
                                        </div>

                                        <div class="form-group row" style="margin-right:3px;margin-left: 3px;">
                                            <label>Logo</label>
                                            <div class="input-group">
                                                <span class="input-group-btn">
                                                    <a id="lfm1" class="btn btn-primary btn-block" style="color:white">
                                                        <i class="fa fa-picture-o"></i> Choose logo
                                                    </a>
                                                </span>
                                                <input type="file" id="fileUpload" style="display: none;">
                                                <input required1 id="thumbnail1" class="form-control" type="text"
                                                    name="shopimage" placeholder="Path name">
                                            </div>
                                            <img id="holder" style="margin-top:15px;max-height:50px;">
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <label>Email</label>
                                                <input type="text" class="form-control" name="email" id="email"
                                                    placeholder="Email" required1>
                                            </div>
                                            <div class="col-sm-6">
                                                <label>Password</label>
                                                <div class="form-group position-relative">

                                                    <input type="password" class="form-control" id="password"
                                                        placeholder="Password" name="password" required1
                                                        autocomplete="current-password">
                                                    <i class="fas fa-eye position-absolute" id="togglePassword"></i>

                                                </div>
                     
                                            </div>
                                        </div>
                                        <!-- Confirm Password -->

                                        <div class="form-group row position-relative" style="margin-top: -15px;">
                                            <div class="col-sm-12">
                                            <label>Confirm Password</label>
                                                <div class="form-group position-relative">

                                                    <input type="password" class="form-control" id="confirm_password"
                                                        placeholder="Confirm Password" name="confirm_password" required1
                                                        autocomplete="current-password">
                                                    <i class="fas fa-eye position-absolute" id="togglePassword1"></i>

                                                </div>

                                            </div>


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
    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('backend/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('backend/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
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


    <script>
    $(document).ready(function() {
        $('#lfm1').click(function() {
            $('#fileUpload').click(); // Trigger file selection when the custom button is clicked
        });

        $('#fileUpload').change(function() {
            var fileData = $(this).prop('files')[0];
            if (!fileData) {
                alert('No file selected.');
                return;
            }

            var formData = new FormData();
            formData.append('shopimage', fileData);

            $.ajax({
                url: '/upload', // Adjust to your upload URL
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(data) {
                    // console.log(data);
                    if (data.path) {
                        $('#thumbnail1').val(data
                            .path); // Display the path in the input field
                        $('#holder').attr('src', data.path); // Update the image preview
                    }
                },
                error: function(error) {
                    console.log(error);
                    // alert('Error uploading file.');
                }
            });
        });
    });
    </script>

    <script>
    $(document).ready(function() {
        $('.user').on('submit', function(e) {
            e.preventDefault(); // Prevent the default form submission

            var pass = $('#password').val();
            var c_pass = $('#confirm_password').val();

            // Validation for empty required1 inputs
            var isValid = true;
            $('[required1]').each(function() {
                if ($(this).val() === '') {
                    isValid = false;
                    $(this).css('border', '2px solid red'); // Highlight the empty input field
                    alert('Please fill out all required fields.');
                    return false; // Break the loop
                } else {
                    $(this).css('border', ''); // Reset the border if filled
                }
            });

            if (!isValid) {
                return; // Stop here if the form is not valid
            }

            if (pass != c_pass) {

                $('#password').css('border', '2px solid red');
                $('#confirm_password').css('border', '2px solid red');
                $('#confirm_password').val('');
                alert('Password not match!.');
                return;
            }

            var formData = $(this).serialize(); // Serialize the form data

            $.ajax({
                type: 'POST',
                url: '/create-account', // The URL where you want to post the data
                data: formData,
                dataType: 'json', // Expect JSON response from the server
                success: function(response) {
                    // Handle success scenario
                    // alert('Registration successful: ' + response.message);
                    console.log(response);

                    if (response.result == '1') {
                        location.href = '/admin'
                    } else {
                        $('#email').css('border', '2px solid red');
                        alert('Email already exist!');
                    }
                },
                error: function(error) {
                    // Handle error scenario
                    // alert('An error occurred while registering. Please try again.');
                    console.log(error);
                }
            });
        });
    });
    </script>

</body>

</html>