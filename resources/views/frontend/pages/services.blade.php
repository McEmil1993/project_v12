@extends('frontend.layouts.master')

@section('title','Moto Shop || Service PAGE')

@section('main-content')
<style>
.service-description {
    max-height: 2em;
    /* Adjust based on line-height and desired cutoff, assuming 'em' unit is proportional to the line height */
    overflow: hidden;
    position: relative;
    margin-left: 10px;
    line-height: 1.2em;
}

.seeMore {
    position: absolute;
    bottom: 0;
    right: 0;
    color: #007bff !important;
    background: #fff;
    cursor: pointer;
}
</style>
<!-- Breadcrumbs -->
<div class="breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="bread-inner">
                    <ul class="bread-list">
                        <li><a href="{{route('home')}}">Home<i class="ti-arrow-right"></i></a></li>
                        <li class="active"><a href="javascript:void(0);">Service</a></li>
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
                <!-- Start Single List -->

                <!-- Begin Card -->
                <div class="col-lg-4 col-md-6 col-sm-6 mb-3">
                    <div class="card">
                        <!-- Card Image -->
                        <div class="row">
                            <div class="col-3 openModalBtn" style="margin-left: 15px;margin-top: 15px; cursor: pointer;" data-store_name="{{ $services->store_name }}" data-store_address="{{ $services->store_address }}" data-store_contact="{{ $services->store_contact }}" data-shopname="{{ $services->shopname }}" data-desc="{!! $services->description !!}">
                                <div class="rating-author">

                                    <img style="width: 50px;" src=" @if(isset($services->shopname)) {{ $services->shopimage }} @else {{ asset('backend/img/avatar.png') }} @endif"
                                        alt="Profile.jpg">

                                </div>

                            </div>
                            <div class="col-6" style="margin-top: 12px;">
                                <h5 class="card-title">{{$services->shopname}}</h5>
                            </div>
                        </div>

                        <div class="card-body">
                            <!-- Shop Name -->

                            <!-- Service Name -->
                            <h6 class="card-subtitle mb-2 text-muted myBtn"  data-id="{{ $services->id }}" style=" cursor: pointer;">
                                {{$services->name}}</h6>
                            <!-- Price -->
                            <p class="card-text">Rate: P {{$services->rate}}</p>

                            <!-- Description -->
                            <!-- <div class="">
                                <strong> Description </strong>
                                <div style="margin-left:10px"> {!! $services->description !!} </div>
                                
                            </div> -->
                            <!-- <strong> Description </strong>
                            <div class="service-description" style="margin-left:10px">

                                {!! $services->description !!}
                                <a href="#" class="seeMore">See more...</a>
                            </div> -->

                            <!-- <p class="card-text">{!! $services->description !!}</p> -->

                            <!-- Ratings Button -->
                            <!-- <a href="#" class="btn btn-primary  btn_rate" data-id="<?=$services->id?>"
                                data-num="0">Ratings</a> -->
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

<div id="myModal" class="modal-custom myModal">
    <!-- Modal content -->
    <div class="modal-custom-content">
        <span class="close-custom">&times;</span>
        <form id="serviceRequestForm1">
            <div class="row">
                <div class="col-12">
                    <h3>Request Form</h3>
                </div>
            </div>
            <div style="margin-left: 20px;margin-right: 20px;margin-top: 10px;">

                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="ownerName">Owner Name:</label>
                            <input type="hidden" value="" name="service_id" class="in_id"> 
                            <input type="text" id="ownerName" name="ownername" required style="width: 100%;">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="contactNumber">Contact Number:</label>
                            <input type="text" id="contactNumber" name="contactnumber" required style="width: 100%;">
                        </div>
                    </div>
                    <div class="col-12">
                        <label for="motorcycleName">Motorcycle Name:</label>
                        <input type="text" id="motorcycleName" name="motorcyclename" required style="width: 100%;">
                    </div>
                    <div class="col-12" style="margin-top:10px">
                        <div class="form-group">
                            <label for="motorcycleType">Motorcycle Type:</label>
                            <select id="motorcycleType" name="motorcycletype" style="width: 100%;">
                                <option value="automatic">Automatic</option>
                                <option value="manual">Manual</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="col-12">
                        <div class="form-group">
                            <label for="requestType">Request Type:</label>
                            <select id="requestType" name="requesttype" style="width: 100%;">
                                <option value="urgent">Urgent/Emergency</option>
                                <option value="homeService">Home Service</option>
                                <option value="dropOff">Drop Off</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="address">Address:</label>
                            <input type="text" id="address" name="address" required style="width: 100%;">
                        </div>
                    </div>

                    <div class="col-12" style="margin-top:10px">
                        <button type="submit" class="close-btn">Submit</button>
                       
                    </div>
                </div>
            </div>
        </form>
    </div>

</div>
<div id="customModal" class="custom-modal">
    <div class="modal-box">
        <span class="close-modal">&times;</span>
        <h5>Information</h5>
        <div class="modal-content">
            <p><strong>Name:</strong><span class="in_name"> <?= 0 ?></span></p>
            <p><strong>Contact:</strong><span class="in_contact"> <?= 0 ?> </span></p>
            <p><strong>Address:</strong> <span class="in_address"> <?= 0 ?> </span></p>
            <p><strong>Shop Name:</strong><span class="in_shopname"> <?= 0 ?> </span></p>
            <br>
            <p><strong>Description:<br></strong><span class="in_des"> <?= 0 ?> </span></p>
        </div>
    </div>
</div>
<!-- Modal end -->
@endsection
@push ('styles')
<style>
/* .modal {
    in_name
    in_contact
    in_address
    in_shopname
    display: none;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0, 0, 0, 0.4);
}

.modal-content {
    background-color: #fefefe;
    margin: 15% auto;
    padding: 20px;
    border: 1px solid #888;
    width: 30%;
}

.close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
} */

/* The Modal (background) */

/* Modal Styles */
.custom-modal {
    display: none;
    position: fixed;
    z-index: 9999;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    overflow: auto;
}

.modal-box {
    background-color: #fefefe;
    margin: 10% auto;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
    max-width: 30%;
}

.close-modal {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close-modal:hover,
.close-modal:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
}

/* Modal Content Styles */
.modal-content {
    padding: 10px;
    border: 0px solid rgba(0, 0, 0, .2);
}

.modal-content p {
    margin-bottom: 10px;
}

.modal-content p:last-child {
    margin-bottom: 0;
}


.close-btn {
    color: #aaa;
    float: left;
    font-size: 28px;
    background: white;
    font-weight: bold;
    border: 0px;
}

.close-btn:hover,
.close-btn:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
}

.modal-custom {
    display: none;
    /* Hidden by default */
    position: fixed;
    /* Stay in place */
    z-index: 1;
    /* Sit on top */
    padding-top: 60px;
    /* Location of the box */
    left: 0;
    top: 0;
    width: 100%;
    /* Full width */
    height: 100%;
    /* Full height */
    overflow: auto;
    /* Enable scroll if needed */
    background-color: rgb(0, 0, 0);
    /* Fallback color */
    background-color: rgba(0, 0, 0, 0.4);
    /* Black w/ opacity */
}

/* Modal-custom Content */
.modal-custom-content {
    background-color: #fefefe;
    margin: auto;
    padding: 20px;
    border: 1px solid #888;
    width: 50%;
}

@media (max-width: 768px) {
    .modal-custom-content {
        width: 80%;
        /* Adjusted width for mobile devices */
    }
}

/* The Close Button */
.close-custom {
    color: #aaaaaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close-custom:hover,
.close-custom:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}

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


<script>
$(document).ready(function() {
    $('#serviceRequestForm1').submit(function(e) {
        e.preventDefault(); // Prevent the form from submitting normally

        var formData = $(this).serialize(); // Serialize form data

        $.ajax({
            type: 'POST',
            url: '{{ route("storeServiceRequest") }}', // Define your route for storing service requests
            data: formData,
            success: function(response) {
                // Handle success response
                if (response.status == '1') {
                    alert(response.message);
                }else{
                    $("#myModal").css("display", "none");
                    alert('Service request submitted successfully!');
                    location.reload();
                }

            },
            error: function(xhr, status, error) {
                // Handle error response
                console.error(xhr.responseText);
                alert('An error occurred while submitting the service request. Please try again later.');
            }
        });
    });
});
$(document).ready(function() {
  var openModalBtn = $('.openModalBtn');
  var modal = $('#customModal');
  var closeModalBtn = modal.find('.close-modal');

  openModalBtn.on('click', function() {
    $('.in_name').html('&nbsp;&nbsp;'+$(this).attr('data-store_name'));
    $('.in_contact').html('&nbsp;&nbsp;'+$(this).attr('data-store_contact'));
    $('.in_address').html('&nbsp;&nbsp;'+$(this).attr('data-store_address'));
    $('.in_shopname').html('&nbsp;&nbsp;'+$(this).attr('data-shopname'));
    $('.in_des').html('&nbsp;&nbsp;'+$(this).attr('data-desc'));
  

    
    modal.css('display', 'block');
  });

  closeModalBtn.on('click', function() {
    modal.css('display', 'none');
  });

  $(window).on('click', function(event) {
    if (event.target == modal[0]) {
      modal.css('display', 'none');
    }
  });
});
$(document).ready(function() {
  // Set the width of elements with class "nice-select" to 100%
  $(".nice-select").css("width", "100%");

  var modal = $("#myModal");
  var btns = $(".myBtn");
  var span = $(".close-custom");

  // Add click event to all buttons
  btns.on("click", function() {
    $('.in_id').val($('.myBtn').attr('data-id'));
    modal.css("display", "block");
  });

  // Close the modal when the close element is clicked
  span.on("click", function() {
    modal.css("display", "none");
  });

  // Close the modal if the user clicks outside of it
  $(window).on("click", function(event) {
    if (event.target == modal[0]) {
      modal.css("display", "none");
    }
  });
});

$('.btn_rate').click(function() {
    console.log($(this).attr('data-id'));
    var id = $(this).attr('data-id');
    var num = $(this).attr('data-num');

    if (num == '0') {
        $('.rate_' + id).attr('style', '');
        $(this).attr('data-num', '1')
    } else {
        $('.rate_' + id).attr('style', 'display:none');
        $(this).attr('data-num', '0')
    }




});
<?=$services->id?>


document.querySelectorAll('.service-description').forEach(function(container) {
    const seeMoreLink = container.querySelector('.seeMore');
    const maxHeight = parseInt(window.getComputedStyle(container).maxHeight);

    // Set initial visibility based on whether the content overflows
    if (container.scrollHeight <= maxHeight) {
        seeMoreLink.style.display = 'none';
    } else {
        seeMoreLink.style.display = 'inline';
    }

    // Toggle functionality on click
    seeMoreLink.addEventListener('click', function(event) {
        event.preventDefault();
        if (container.style.maxHeight !== 'none') {
            container.style.maxHeight = 'none';
            this.textContent = 'See less...';
        } else {
            container.style.maxHeight = maxHeight + 'px';
            this.textContent = 'See more...';
        }
    });
});

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