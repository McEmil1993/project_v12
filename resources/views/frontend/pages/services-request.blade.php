@extends('frontend.layouts.master')

@section('title','Moto Shop || Service PAGE')

@section('main-content')

<!-- Breadcrumbs -->
<div class="breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="bread-inner">
                    <ul class="bread-list">
                        <li><a href="{{route('home')}}">Home<i class="ti-arrow-right"></i></a></li>
                        <li class="active"><a href="{{route('services-list')}}" >Service <i class="ti-arrow-right"></i></a></li>
                        <li><a href="javascript:void(0);">Services Request </a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumbs -->

<!-- Product Style 1 -->
<section class="product-area shop-sidebar shop-list shop section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3 col-12">
                <form>
                    <h4 class="mb-3">Service Request Form</h4>
                    <!-- Owner Name -->
                    <div class="col-12">
                        <div class="form-group">
                            <label>Owner Name<span>*</span></label>
                            <input type="text" name="ownerName" class="form-control"
                                placeholder="Input your complete name" required="required"
                                value="{{ old('ownerName') }}">
                            @error('ownerName')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <!-- Contact Number -->
                        <div class="form-group">
                            <label>Contact Number<span>*</span></label>
                            <input type="text" name="contactNumber" class="form-control"
                                placeholder="Input your phone number" required="required"
                                value="{{ old('contactNumber') }}">
                            @error('contactNumber')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <!-- Motorcycle Name -->
                        <div class="form-group">
                            <label>Motorcycle Name<span>*</span></label>
                            <input type="text" name="motorcycleName" class="form-control"
                                placeholder="Input name of your motorcycle" required="required"
                                value="{{ old('motorcycleName') }}">
                            @error('motorcycleName')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="row">
                            <div class="col-12">
                                <label>Motorcycle Type<span>*</span></label>
                            </div>
                            <div class="col-12">
                                <select class="form-control" name="motorcycleType">
                                    <option selected>Automatic/manual type</option>
                                    <option value="1">Automatic</option>
                                    <option value="2">Manual</option>
                                </select>
                                @error('motorcycleType')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                    </div>
                    <div class="col-12">

                        <div class="row">
                            <div class="col-12">
                                <label>Services<span>*</span></label>
                            </div>
                            <div class="col-12">
                                <select class="form-control" name="services">
                                    <option selected>Please select here</option>
                                    <option value="1">Service 1</option>
                                    <option value="2">Service 2</option>
                                </select>
                                @error('services')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <!-- Services -->


                    </div>
                    <div class="col-12">

                        <div class="row">
                            <div class="col-12">
                                <label>Request Type<span>*</span></label>
                            </div>
                            <div class="col-12">
                                <select class="form-control" name="requestType">
                                    <option selected>Please select here</option>
                                    <option value="urgent">Urgent/Emergency</option>
                                    <option value="home_service">Home Service</option>
                                    <option value="drop_off">Drop Off</option>
                                </select>
                                @error('requestType')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                    </div>
                    <div class="col-12">
                        <!-- Complete Address -->
                        <div class="form-group">
                            <label>Your Complete Address<span>*</span></label>
                            <input type="text" name="completeAddress" class="form-control"
                                placeholder="Input your complete address" required="required"
                                value="{{ old('completeAddress') }}">
                            @error('completeAddress')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <!-- Form Buttons -->
                        <div class="form-group login-btn">
                            <a type="submit" class="btn btn-primary">Submit</a>
                            <a type="button" href="{{route('services-list')}}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </div>
                    <!-- Remember Me Checkbox -->

                </form>
            </div>
        </div>
    </div>
</section>
<!--/ End Product Style 1  -->

<!-- Modal -->

<!-- Modal end -->
@endsection
@push ('styles')
<style>
.pagination {
    display: inline-flex;
}

.filter_button {
    /* height:20px; */
    text-align: center;
    background: #8c52ff;
    padding: 8px 16px;
    margin-top: 10px;
    color: white;
}
</style>
@endpush
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

{{-- <script>
        $('.cart').click(function(){
            var quantity=1;
            var pro_id=$(this).data('id');
            $.ajax({
                url:"{{route('add-to-cart')}}",
type:"POST",
data:{
_token:"{{csrf_token()}}",
quantity:quantity,
pro_id:pro_id
},
success:function(response){
console.log(response);
if(typeof(response)!='object'){
response=$.parseJSON(response);
}
if(response.status){
swal('success',response.msg,'success').then(function(){
document.location.href=document.location.href;
});
}
else{
swal('error',response.msg,'error').then(function(){
// document.location.href=document.location.href;
});
}
}
})
});
</script> --}}
<script>
$(document).ready(function() {
    /*----------------------------------------------------*/
    /*  Jquery Ui slider js
    /*----------------------------------------------------*/
    if ($("#slider-range").length > 0) {
        const max_value = parseInt($("#slider-range").data('max')) || 500;
        const min_value = parseInt($("#slider-range").data('min')) || 0;
        const currency = $("#slider-range").data('currency') || '';
        let price_range = min_value + '-' + max_value;
        if ($("#price_range").length > 0 && $("#price_range").val()) {
            price_range = $("#price_range").val().trim();
        }

        let price = price_range.split('-');
        $("#slider-range").slider({
            range: true,
            min: min_value,
            max: max_value,
            values: price,
            slide: function(event, ui) {
                $("#amount").val(currency + ui.values[0] + " -  " + currency + ui.values[1]);
                $("#price_range").val(ui.values[0] + "-" + ui.values[1]);
            }
        });
    }
    if ($("#amount").length > 0) {
        const m_currency = $("#slider-range").data('currency') || '';
        $("#amount").val(m_currency + $("#slider-range").slider("values", 0) +
            "  -  " + m_currency + $("#slider-range").slider("values", 1));
    }
})
</script>

@endpush