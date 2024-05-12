@extends('frontend.layouts.master')

@section('title','Moto Shop || Register Page')

@section('main-content')
<!-- Breadcrumbs -->
<div class="breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="bread-inner">
                    <ul class="bread-list">
                        <li><a href="{{route('home')}}">Home<i class="ti-arrow-right"></i></a></li>
                        <li class="active"><a href="javascript:void(0);">Register</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumbs -->

<!-- Shop Login -->
<section class="shop login section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3 col-12">
                <div class="login-form">
                    <h2>Register</h2>
                    <!-- Form -->
                    <form id="registrationForm" class="form" method="post" action="#">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>First Name<span>*</span></label>
                                    <input type="text" name="firstname" placeholder="Enter Firstname" required1
                                        value="{{ old('firstname') }}">
                                    @error('firstname')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Middle Name</label>
                                    <input type="text" name="middlename" placeholder="Enter Middlename"
                                        value="{{ old('middlename') }}">
                                    @error('middlename')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Last Name<span>*</span></label>
                                    <input type="text" name="lastname" placeholder="Enter Lastname" required1
                                        value="{{ old('lastname') }}">
                                    @error('lastname')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Gender<span>*</span></label>
                                    <select name="gender" class="form-control" required1>
                                        <option value="">Select Gender</option>
                                        <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male
                                        </option>
                                        <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female
                                        </option>
                                    
                                    </select>
                                    @error('gender')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Contact Number<span>*</span></label>
                                    <input type="tel" name="contact" placeholder="Enter Contact" required1
                                        value="{{ old('contact') }}">
                                    @error('contact')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label>Your Email<span>*</span></label>
                                    <input type="email" name="email" placeholder="Enter Email" required1 email12
                                        value="{{old('email')}}">
                                    @error('email')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label>Address<span>*</span></label>
                                    <input type="text" name="address" placeholder="Enter Address" required1
                                        value="{{ old('address') }}">
                                    @error('address')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label>Your Password<span>*</span></label>
                                    <div style="position: relative; display: flex; align-items: center;">
                                        <input type="password" id="password-field" name="password"
                                            placeholder="Enter Password" required1 value="{{old('password')}}"
                                            style="flex-grow: 1;">
                                        <i class="fa fa-eye-slash" id="togglePassword"
                                            style="cursor: pointer; position: absolute; right: 10px;"></i>
                                        @error('password')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Confirm Password<span>*</span></label>
                                    <div style="position: relative; display: flex; align-items: center;">
                                        <input type="password" id="confirm-password-field" name="password_confirmation"
                                            placeholder="Enter Confirm Password" required1
                                            value="{{old('password_confirmation')}}" style="flex-grow: 1;">
                                        <i class="fa fa-eye-slash" id="toggleConfirmPassword"
                                            style="cursor: pointer; position: absolute; right: 10px;"></i>
                                        @error('password_confirmation')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group login-btn">
                                    <button class="btn" type="submit">Register</button>
                                    <a href="{{ route('login.form') }}" class="btn btn-google">Back to Login</a>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!--/ End Form -->
                </div>
            </div>
        </div>
    </div>
</section>
<script>
// Toggle password visibility for both fields
document.getElementById('togglePassword').addEventListener('click', function() {
    toggleVisibility('password-field', this);
});

document.getElementById('toggleConfirmPassword').addEventListener('click', function() {
    toggleVisibility('confirm-password-field', this);
});

function toggleVisibility(fieldId, icon) {
    const password = document.getElementById(fieldId);
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    icon.classList.toggle('fa-eye');
    icon.classList.toggle('fa-eye-slash');
}


document.addEventListener('DOMContentLoaded', function() {
    var elements_nice = document.querySelectorAll('.form-control');
    document.getElementById('registrationForm').addEventListener('submit', function(e) {

        e.preventDefault(); // Prevent the default form submission

        // Validation for empty required inputs
        var isValid = true;
        var requiredFields = document.querySelectorAll('[required1]');
        // var email12 = document.querySelectorAll('[email12]');
        requiredFields.forEach(function(field) {
            if (field.value.trim() === '') {
                field.style.border = '2px solid red'; // Highlight the empty input field
                // alert('Please fill out all required fields.');
                elements_nice.forEach(function(element) {
                    element.style.border = '2px solid red';
                });
                field.focus();
                isValid = false;
                return; // Exit the loop on first error
            } else {
                field.style.border = ''; // Reset the border if filled
            }
        });

        if (!isValid) {
            return; // Stop here if the form is not valid
        }

        // Validate password match
        var password = document.querySelector('input[name="password"]').value;
        var confirmPassword = document.querySelector('input[name="password_confirmation"]').value;
        if (password !== confirmPassword) {
            alert('Passwords do not match.');
            document.querySelector('input[name="password_confirmation"]').focus();
            isValid = false;
            return; // Stop execution
        }

        if (!isValid) {
            return; // Stop here if the form is not valid
        }

        // Form is valid, proceed with AJAX
        var formData = new FormData(this); // Serialize the form data

        fetch(this.action, {
                method: 'POST',
                body: formData,

            }).then(response => response.json())
            .then(data => {
                if (data.result == '1') {
                    
                    location.href = '/verify?id='+data.data.id;

                } else {
                    // email12.forEach(function(field) {
                    //     field.style.border = '2px solid red';
                    //     field.focus();
                    // }); 
                    alert('Email already exist!');
                }
                console.log('Registration successful', data);
                // alert('Registration successful!');
                // Optionally redirect to another page
                // window.location.href = '/success-page';
            })
            .catch(error => {
                console.error('Registration failed', error);
                // alert('Registration failed: ' + error.message);
            });
    });
});
</script>
<!--/ End Login -->
@endsection

@push('styles')
<style>
.shop.login .form .btn {
    margin-right: 0;
}

.btn-facebook {
    background: #39579A;
}

.btn-facebook:hover {
    background: #073088 !important;
}

.btn-github {
    background: #444444;
    color: white;
}

.btn-github:hover {
    background: black !important;
}

.btn-google {
    background: #ea4335;
    color: white;
}

.btn-google:hover {
    background: rgb(243, 26, 26) !important;
}
</style>
@endpush