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
                        <li class="active"><a href="javascript:void(0);">Service</a><i class="ti-arrow-right"></i></li>
                        <li><a href="{{route('services-request')}}">Services Request</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumbs -->
<form action="{{route('shop.filter')}}" method="POST">
    @csrf
    <!-- Product Style 1 -->
    <section class="product-area shop-sidebar shop-list shop section">
        <div class="container">
            <div class="row">
                @if(isset($service))

                @foreach($service as $services)
                {{-- {{$product} SELECT  `id`,  `date_of_request`,  `customer_id`,  `motorcycle_name`,  `motorcycle_type`,  `service_types`,  `total_amount`,  `status`,  `assigned_to`,  `service_contact`, `service_address`,  `store_id`,  `created_at`,  `updated_at` FROM `moto`.`services` ORDER BY `assigned_to` ASC, `total_amount` ASC, `motorcycle_name` DESC LIMIT 1000;} --}}
                <!-- Start Single List -->

                <!-- Begin Card -->
                <div class="col-lg-4 col-md-6 col-sm-6 mb-3">
                    <div class="card">
                        <!-- Card Image -->
                        <div class="rating-author">
                            <img src="{{asset('backend/img/avatar.png')}}" alt="Profile.jpg">
                        </div>

                        <div class="card-body">
                            <!-- Shop Name -->
                            <h5 class="card-title">{{$services->store_name}}</h5>
                            <!-- Service Name -->
                            <h6 class="card-subtitle mb-2 text-muted">{{$services->motorcycle_name}}</h6>
                            <!-- Price -->
                            <p class="card-text">P {{$services->total_amount}}</p>
                            <!-- Description -->
                            <p class="card-text">{{$services->service_types}}</p>
                            <!-- Ratings Button -->
                            <a href="#" class="btn btn-primary  btn_rate" data-id="<?=$services->id?>" data-num="0">Ratings</a>
                        </div>
                        <div class="card-footer rate_<?=$services->id?>" style="display: none">
                           Your Rating <span class="text-danger">*</span>
                            <div class="review-inner">
                                <!-- Form -->
                                @auth
                                <form class="form" method="post" action="{{route('review.store',$services->id)}}">
                                
                                    <div class="row">
                                        <div class="col-lg-12 col-12">
                                            <div class="rating_box">
                                                <div class="star-rating">
                                                    <div class="star-rating__wrap">
                                                        <input class="star-rating__input" id="star-rating-5"
                                                            type="radio" name="rate" value="5">
                                                        <label class="star-rating__ico fa fa-star-o" for="star-rating-5"
                                                            title="5 out of 5 stars"></label>
                                                        <input class="star-rating__input" id="star-rating-4"
                                                            type="radio" name="rate" value="4">
                                                        <label class="star-rating__ico fa fa-star-o" for="star-rating-4"
                                                            title="4 out of 5 stars"></label>
                                                        <input class="star-rating__input" id="star-rating-3"
                                                            type="radio" name="rate" value="3">
                                                        <label class="star-rating__ico fa fa-star-o" for="star-rating-3"
                                                            title="3 out of 5 stars"></label>
                                                        <input class="star-rating__input" id="star-rating-2"
                                                            type="radio" name="rate" value="2">
                                                        <label class="star-rating__ico fa fa-star-o" for="star-rating-2"
                                                            title="2 out of 5 stars"></label>
                                                        <input class="star-rating__input" id="star-rating-1"
                                                            type="radio" name="rate" value="1">
                                                        <label class="star-rating__ico fa fa-star-o" for="star-rating-1"
                                                            title="1 out of 5 stars"></label>
                                                        @error('rate')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-12">
                                            <div class="form-group button5">
                                                <button type="submit" class="btn">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                @else
                                <p class="text-center p-5">
                                    You need to <a href="{{route('login.form')}}"
                                        style="color:rgb(54, 54, 204)">Login</a> OR <a style="color:blue"
                                        href="{{route('register.form')}}">Register</a>

                                </p>
                                <!--/ End Form -->
                                @endauth
                            </div>
                        </div>
                    </div>
                </div>

                <!-- End Card -->

                <!-- End Single List -->
                @endforeach
                @else
                <h4 class="text-danger" style="margin:100px auto;">Sorry, there are no products according to the range
                    given. Try selecting different one to see more results.</h4>
                @endif
            </div>

        </div>
    </section>
    <!--/ End Product Style 1  -->
</form>
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

/* Rating */
.rating_box {
    display: inline-flex;
}

.star-rating {
    font-size: 0;
    padding-left: 10px;
    padding-right: 10px;
}

.star-rating__wrap {
    display: inline-block;
    font-size: 1rem;
}

.star-rating__wrap:after {
    content: "";
    display: table;
    clear: both;
}

.star-rating__ico {
    float: right;
    padding-left: 2px;
    cursor: pointer;
    color: #F7941D;
    font-size: 16px;
    margin-top: 5px;
}

.star-rating__ico:last-child {
    padding-left: 0;
}

.star-rating__input {
    display: none;
}

.star-rating__ico:hover:before,
.star-rating__ico:hover~.star-rating__ico:before,
.star-rating__input:checked~.star-rating__ico:before {
    content: "\F005";
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

$('.btn_rate').click(function(){
    console.log($(this).attr('data-id'));
    var id = $(this).attr('data-id');
    var num = $(this).attr('data-num');

    if (num == '0') {
        $('.rate_'+id).attr('style','');
        $(this).attr('data-num','1')
    }else{
        $('.rate_'+id).attr('style','display:none');
        $(this).attr('data-num','0')
    }

    


});
<?=$services->id?>


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