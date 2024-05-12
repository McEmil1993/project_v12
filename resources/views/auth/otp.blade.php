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
                                        <h1 class="h4 text-gray-900 mb-4">Verify Account</h1>
                                    </div>

                                    <div class="text-center">
                                        <p>An OTP has been sent to the number <u> {{$data->contact}}</u>. Please check
                                            your messages and enter the OTP to
                                            complete the verification process. Thank you.</p>
                                    </div>
                                    <form class="user" method="POST" action="/checkOtpStore">
                                        @csrf
                                        <!-- Row for First Name, Last Name, and Gender -->
                                        <div class="form-group row">
                                            <div class="col-sm-4 mb-3 mb-sm-0">

                                            </div>
                                            <div class="col-sm-4">
                                                <input type="hidden" value="{{$data->user_id}} " name="user_id">

                                                <input type="text" class="form-control" name="otp" id="otp"
                                                    placeholder="Enter OTP" required>
                                            </div>
                                            <div class="col-sm-4">

                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-4 mb-3 mb-sm-0">

                                            </div>
                                            <div class="col-sm-4">
                                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                                    Submit
                                                </button>
                                            </div>
                                            <div class="col-sm-4">

                                            </div>
                                        </div>

                                    </form>

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


</body>

</html>