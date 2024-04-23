@extends('frontend.layouts.master')

@section('title','Checkout page')

@section('main-content')

<!-- Breadcrumbs -->
<div class="breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="bread-inner">
                    <ul class="bread-list">
                        <li><a href="{{route('home')}}">Home<i class="ti-arrow-right"></i></a></li>
                        <li class="active"><a href="javascript:void(0)">Checkout</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumbs -->

<!-- Start Checkout -->
<section class="shop checkout section">
    <div class="container">
        <form class="form" method="POST" action="{{route('cart.order')}}">
            @csrf
            <div class="row">

                <div class="col-lg-8 col-12">
                    <div class="checkout-form">
                        <h2>Complete Your Purchase</h2>
                        <p>Just a few more steps to complete your purchase securely!</p>
                        <!-- Form -->
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="form-group">
                                    <label>First Name<span>*</span></label>
                                    <input type="text" name="first_name" placeholder="" value="{{old('first_name')}}"
                                        value="{{old('first_name')}}" required>
                                    @error('first_name')
                                    <span class='text-danger'>{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="form-group">
                                    <label>Last Name<span>*</span></label>
                                    <input type="text" name="last_name" placeholder="" value="{{old('lat_name')}}"
                                        required>
                                    @error('last_name')
                                    <span class='text-danger'>{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="form-group">
                                    <label>Email Address<span>*</span></label>
                                    <input type="email" name="email" placeholder="" value="{{old('email')}}" required>
                                    @error('email')
                                    <span class='text-danger'>{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="form-group">
                                    <label>Phone Number <span>*</span></label>
                                    <input type="number" name="phone" placeholder="" required value="{{old('phone')}}">
                                    @error('phone')
                                    <span class='text-danger'>{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="form-group">
                                    <label>Municipality<span>*</span></label>
                                    <select name="country" id="country" required>
                                        <option value="Alburquerque">Alburquerque</option>
                                        <option value="Alicia">Alicia</option>
                                        <option value="Anda">Anda</option>
                                        <option value="Antequera">Antequera</option>
                                        <option value="Baclayon">Baclayon</option>
                                        <option value="Balilihan">Balilihan</option>
                                        <option value="Batuan">Batuan</option>
                                        <option value="Bien Unido">Bien Unido</option>
                                        <option value="Bilar">Bilar</option>
                                        <option value="Buenavista">Buenavista</option>
                                        <option value="Calape">Calape</option>
                                        <option value="Candijay">Candijay</option>
                                        <option value="Carmen">Carmen</option>
                                        <option value="Catigbian">Catigbian</option>
                                        <option value="Clarin">Clarin</option>
                                        <option value="Corella">Corella</option>
                                        <option value="Cortes">Cortes</option>
                                        <option value="Dagohoy">Dagohoy</option>
                                        <option value="Danao">Danao</option>
                                        <option value="Dauis">Dauis</option>
                                        <option value="Dimiao">Dimiao</option>
                                        <option value="Duero">Duero</option>
                                        <option value="Garcia Hernandez">Garcia Hernandez</option>
                                        <option value="Guindulman">Guindulman</option>
                                        <option value="Inabanga">Inabanga</option>
                                        <option value="Jagna">Jagna</option>
                                        <option value="Jetafe">Jetafe</option>
                                        <option value="Lila">Lila</option>
                                        <option value="Loay">Loay</option>
                                        <option value="Loboc">Loboc</option>
                                        <option value="Loon">Loon</option>
                                        <option value="Mabini">Mabini</option>
                                        <option value="Maribojoc">Maribojoc</option>
                                        <option value="Panglao">Panglao</option>
                                        <option value="Pilar">Pilar</option>
                                        <option value="Pitogo">Pitogo</option>
                                        <option value="Sagbayan">Sagbayan</option>
                                        <option value="San Isidro">San Isidro</option>
                                        <option value="San Miguel">San Miguel</option>
                                        <option value="Sevilla">Sevilla</option>
                                        <option value="Sierra Bullones">Sierra Bullones</option>
                                        <option value="Sikatuna">Sikatuna</option>
                                        <option value="Tagbilaran City">Tagbilaran City</option>
                                        <option value="Talibon">Talibon</option>
                                        <option value="Trinidad" selected>Trinidad</option>
                                        <option value="Tubigon">Tubigon</option>
                                        <option value="Ubay">Ubay</option>
                                        <option value="Valencia">Valencia</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="form-group">
                                    <label>Address Line 1<span>*</span></label>
                                    <input type="text" name="address1" placeholder="" value="{{old('address1')}}">
                                    @error('address1')
                                    <span class='text-danger'>{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="form-group">
                                    <label>Address Line 2</label>
                                    <input type="text" name="address2" placeholder="" value="{{old('address2')}}">
                                    @error('address2')
                                    <span class='text-danger'>{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="form-group">
                                    <label>Postal Code</label>
                                    <input type="text" name="post_code" placeholder="" value="{{old('post_code')}}">
                                    @error('post_code')
                                    <span class='text-danger'>{{$message}}</span>
                                    @enderror
                                </div>
                            </div>

                        </div>
                        <!--/ End Form -->
                    </div>
                </div>
                <div class="col-lg-4 col-12">
                    <div class="order-details">
                        <!-- Order Widget -->
                        <div class="single-widget">
                            <h2>CART TOTAL</h2>
                            <div class="content">
                                <ul>
                                    <li class="order_subtotal" data-price="{{Helper::totalCartPrice()}}">Cart
                                        Subtotal<span>₱ {{number_format(Helper::totalCartPrice(),2)}}</span></li>
                                    <li class="shipping">
                                        Shipping Cost
                                        @if(count(Helper::shipping())>0 && Helper::cartCount()>0)
                                        <select name="shipping" class="nice-select" required>
                                            <option value="">Select your address</option>
                                            @foreach(Helper::shipping() as $shipping)
                                            <option value="{{$shipping->id}}" class="shippingOption"
                                                data-price="{{$shipping->price}}">{{$shipping->type}}: ₱
                                                {{$shipping->price}}</option>
                                            @endforeach
                                        </select>
                                        @else
                                        <span>Free</span>
                                        @endif
                                    </li>

                                    @if(session('coupon'))
                                    <li class="coupon_price" data-price="{{session('coupon')['value']}}">You Save<span>₱
                                            {{number_format(session('coupon')['value'],2)}}</span></li>
                                    @endif
                                    @php
                                    $total_amount=Helper::totalCartPrice();
                                    if(session('coupon')){
                                    $total_amount=$total_amount-session('coupon')['value'];
                                    }
                                    @endphp
                                    @if(session('coupon'))
                                    <li class="last" id="order_total_price">Total<span>₱
                                            {{number_format($total_amount,2)}}</span></li>
                                    @else
                                    <li class="last" id="order_total_price">Total<span>₱
                                            {{number_format($total_amount,2)}}</span></li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                        <!--/ End Order Widget -->
                        <!-- Order Widget -->
                        <div class="single-widget">
                            <h2>Payment Methods</h2>
                            <div class="content">
                                <div class="checkbox">
                                    {{-- <label class="checkbox-inline" for="1"><input name="updates" id="1" type="checkbox"> Check Payments</label> --}}
                                    <form-group>
                                        <input name="payment_method" type="radio" value="cod" required> <label> Cash On
                                            Delivery</label><br>
                                        <!-- <input name="payment_method"  type="radio" value="paypal"> <label> PayPal</label><br> -->
                                    </form-group>
                                </div>
                            </div>

                        </div>
                        <!--/ End Order Widget -->
                        <!-- Payment Method Widget -->
                        
                        <!--/ End Payment Method Widget -->
                        <!-- Button Widget -->
                        <div class="single-widget get-button">
                            <div class="content">
                                <div class="button">
                                    <button type="submit" class="btn">proceed to checkout</button>
                                </div>
                            </div>
                        </div>
                        <!--/ End Button Widget -->
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
<!--/ End Checkout -->

<!-- Start Shop Services Area  -->
<section class="shop-services section home">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-12">
                <!-- Start Single Service -->
                <div class="single-service">
                    <i class="ti-rocket"></i>
                    <h4>Free shiping</h4>
                    <p>Orders over $100</p>
                </div>
                <!-- End Single Service -->
            </div>
            <div class="col-lg-3 col-md-6 col-12">
                <!-- Start Single Service -->
                <div class="single-service">
                    <i class="ti-reload"></i>
                    <h4>Free Return</h4>
                    <p>Within 30 days returns</p>
                </div>
                <!-- End Single Service -->
            </div>
            <div class="col-lg-3 col-md-6 col-12">
                <!-- Start Single Service -->
                <div class="single-service">
                    <i class="ti-lock"></i>
                    <h4>Sucure Payment</h4>
                    <p>100% secure payment</p>
                </div>
                <!-- End Single Service -->
            </div>
            <div class="col-lg-3 col-md-6 col-12">
                <!-- Start Single Service -->
                <div class="single-service">
                    <i class="ti-tag"></i>
                    <h4>Best Peice</h4>
                    <p>Guaranteed price</p>
                </div>
                <!-- End Single Service -->
            </div>
        </div>
    </div>
</section>
<!-- End Shop Services -->

<!-- Start Shop Newsletter  -->
<section class="shop-newsletter section">
    <div class="container">
        <div class="inner-top">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 col-12">
                    <!-- Start Newsletter Inner -->
                    <div class="inner">
                        <h4>Newsletter</h4>
                        <p> Subscribe to our newsletter and get <span>10%</span> off your first purchase</p>
                       
                    </div>
                    <!-- End Newsletter Inner -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Shop Newsletter -->
@endsection
@push('styles')
<style>
li.shipping {
    display: inline-flex;
    width: 100%;
    font-size: 14px;
}

li.shipping .input-group-icon {
    width: 100%;
    margin-left: 10px;
}

.input-group-icon .icon {
    position: absolute;
    left: 20px;
    top: 0;
    line-height: 40px;
    z-index: 3;
}

.form-select {
    height: 30px;
    width: 100%;
}

.form-select .nice-select {
    border: none;
    border-radius: 0px;
    height: 40px;
    background: #f6f6f6 !important;
    padding-left: 45px;
    padding-right: 40px;
    width: 100%;
}

.list li {
    margin-bottom: 0 !important;
}

.list li:hover {
    background: #F7941D !important;
    color: white !important;
}

.form-select .nice-select::after {
    top: 14px;
}
</style>
@endpush
@push('scripts')
<script src="{{asset('frontend/js/nice-select/js/jquery.nice-select.min.js')}}"></script>
<script src="{{ asset('frontend/js/select2/js/select2.min.js') }}"></script>
<script>
$(document).ready(function() {
    $("select.select2").select2();
});


$('select.nice-select').niceSelect();
</script>
<script>
function showMe(box) {
    var checkbox = document.getElementById('shipping').style.display;
    // alert(checkbox);
    var vis = 'none';
    if (checkbox == "none") {
        vis = 'block';
    }
    if (checkbox == "block") {
        vis = "none";
    }
    document.getElementById(box).style.display = vis;
}
</script>
<script>
$(document).ready(function() {
    $('.shipping select[name=shipping]').change(function() {
        let cost = parseFloat($(this).find('option:selected').data('price')) || 0;
        let subtotal = parseFloat($('.order_subtotal').data('price'));
        let coupon = parseFloat($('.coupon_price').data('price')) || 0;
        // alert(coupon);
        $('#order_total_price span').text('$' + (subtotal + cost - coupon).toFixed(2));
    });

});
</script>

<script>
$(document).ready(function() {
    $('input[name="payment_method"]').change(function() {
        if ($(this).val() === 'cardpay') {
            $('#creditCardDetails').show();
        } else {
            $('#creditCardDetails').hide();
        }
    });
});
</script>

@endpush