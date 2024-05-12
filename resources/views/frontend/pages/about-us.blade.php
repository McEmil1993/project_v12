@extends('frontend.layouts.master')

@section('title','Moto Shop || Verify Page')

@section('main-content')
<!-- Breadcrumbs -->
<div class="breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="bread-inner">
                    <ul class="bread-list">
                        <li><a href="{{route('home')}}">Home<i class="ti-arrow-right"></i></a></li>
                        <li class="active"><a href="javascript:void(0);">Verify</a></li>
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
                    <p>An OTP has been sent to the number <u>{{$data->contact}}</u>. Please check your messages and enter the OTP to
                        complete the verification process. Thank you.</p>
                    <!-- Form -->
                    <form class="form" method="post" action="/checkOtp">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
									<input type="hidden" value="{{$data->user_id}}" name="user_id" >
                                    <input type="number" name="otp" placeholder="Enter OTP" required="required"
                                        value="{{}}">
                                </div>
                            </div>

                            <div class="col-12">
                                <center>
                                    <div class="form-group login-btn">
                                        <button class="btn btn-facebook" type="submit">Submit</button>
                                    </div>
                                </center>

                            </div>
                        </div>
                    </form>
                    <!--/ End Form -->
                </div>
            </div>
        </div>
    </div>
</section>
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