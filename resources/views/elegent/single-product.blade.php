@extends('layouts.mainlayouts')

@section('content')

<style>
    .testcolor{background-color:#f6f6f6;}
    .s_product_text{
        margin-left:20px;
        margin-bottom:20px;
        margin-top: 30px;
        }
    .testbtn{
        background-color: black;
    }
</style>
<!--================Home Banner Area =================-->
<section class="banner_area">
      <div class="banner_inner d-flex align-items-center">
        <div class="container">
          <div class="banner_content d-md-flex justify-content-between align-items-center">
            <div class="mb-3 mb-md-0">
              <h2>Product Details</h2>
              <p>Very us move be blessed multiply night</p>
            </div>
            <div class="page_link">
              <a href="index.html">Home</a>
              <a href="single-product.html">Product Details</a>
            </div>
          </div>
        </div>
      </div>
</section>
<!--================End Home Banner Area =================-->

<!--================Single Product Area =================-->
<div class="product_image_area">
      <div class="container">
        <div class="row s_product_inner maintst">
          <div class="col-lg-6">
          <div class="s_product_img">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active ">
                        <img
                            class="d-block w-100"
                            src="{{ asset('productimg/'.$product-> image)}}"
                            alt="First slide"
                            style="object-fit:cover; width:260px; height:450px;"
                        />
                        <input type="hidden" value="{{$product-> id}}" class="pro_id getcatid">
                        <input type="hidden" value="{{$product-> cat}}" class="pro_cat">
                        <input type="hidden" value="{{$product-> sub_cat}}" class="pro_subcat">
                    </div>
                    <div class="carousel-item">
                        <img
                            class="d-block w-100"
                            src="{{  asset('productimg/'.$product-> image)}}"
                            alt="Second slide"
                            style="object-fit:cover; width:260px; height:450px;"
                        />
                    </div>
                    <div class="carousel-item">
                        <img
                            class="d-block w-100"
                            src=" {{asset('productimg/'.$product-> image)}}"
                            alt="Third slide"
                            style="object-fit:cover; width:260px; height:450px;"
                        />
                    </div>
                </div>
                </div>
            </div>
            </div>

<!-- Item Description Area -->
            
    <div class="col-lg-5 offset-lg-1 testcolor">
                <div class="s_product_text">
                    <h2 class="proName">{{$product->name}}</h2>
                    <h3>Rs: {{$product->price}}</h3>
                    <ul class="list">
                         <li>
                            <a href="#"> <span>Availibility</span> :
                            @if($product-> totProQty > 0 )
                                <label class="badge bg-success" style="color:white;">In Stock</label>
                            @else
                                <label class="badge bg-danger" style="color:white;">Out of Stock</label>
                            @endif
                        </a>
                        </li>
                        <li>
                            
                            @if($recent_size == !null )

                            @foreach($recent_size as $data_value)
                            <span>Reminder</span> :
                                    <label>You had Bought Earlier Size : {{$data_value->size}}</label>
                            @endforeach
                                
        
                            @else
                               
                            @endif
                        
                        </li>
                    </ul>
                    <hr>
                    <p>{{$product->description}}</p>
                    <hr>
<!-- this is for Qty and the Size -->
            <div class="row">
                <div class="col">
                    <div class="product_count">
                        <label for="qty">Quantity:</label>
                        <input
                            type="text"
                            name="qty"
                            id="sst"
                            maxlength="12"
                            value="1"
                            title="Quantity:"
                            class="input-text qty Proqty"
                        />
                    <button
                        onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;"
                        class="increase items-count"
                        type="button"
                    >
                        <i class="lnr lnr-chevron-up"></i>
                    </button>
                    <button
                        onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 0 ) result.value--;return false;"
                        class="reduced items-count"
                        type="button"
                    >
                        <i class="lnr lnr-chevron-down"></i>
                    </button>
                    </div>
                    </div>
                    <div class="col">
                        <div class="product_count for-Size">
                            <select name="size" id="proSize" class="form-select form-select-sm" required>
                                <option value="">Select Size</option>
                                    @if($product -> size_S == !null  or $product -> size_S == !0){
                                        <option value="s">Small</option>
                                    }@endif
                                    @if($product -> size_M == !null  or $product -> size_M == !0){
                                        <option value="m">Medium</option>
                                    }@endif
                                    @if($product -> size_L == !null  or $product -> size_L == !0){
                                        <option value="l">Large</option>
                                    }@endif
                                    @if($product -> size_XL == !null  or $product -> size_XL == !0){
                                        <option value="xl">X-Large</option>
                                    }@endif
                                    @if($product -> size_28 == !null  or $product -> size_28 == !0){
                                        <option value="28">Inch 28</option>
                                    }@endif
                                    @if($product -> size_30 == !null  or $product -> size_30 == !0){
                                        <option value="30">Inch 30</option>
                                    }@endif
                                    @if($product -> size_32 == !null  or $product -> size_32 == !0){
                                        <option value="32">Inch 32</option>
                                    }@endif
                                    @if($product -> size_34 == !null  or $product -> size_34 == !0){
                                        <option value="34">Inch 34</option>
                                    }@endif
                                    @if($product -> size_36 == !null  or $product -> size_36 == !0){
                                        <option value="36">Inch 36</option>
                                    }@endif
                            </select>
                        </div>
                    </div>    
                    </div>
                    <hr>
                    <div class="card_area btnarea">
                        @if($product-> totProQty > 0 )  
                            <a class="btn btn-success sin-btn" href="{{url('single-checkout')}}">Proceed to Checkout</a><samp>&nbsp;</samp>   
                            <a class="btn btn-primary cartbtn" href="#">
                                <i class="lnr lnr lnr-cart"></i>
                            </a>
                        @else
                            <label  style="color:red;">The Product is Out of Stock..!</label>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

<!--================End Single Product Area =================-->

<!--================Product Description Area =================-->
<section class="product_description_area">
    <div class="container">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
        <a
            class="nav-link active"
            id="home-tab"
            data-toggle="tab"
            href="#home"
            role="tab"
            aria-controls="home"
            aria-selected="true"
            >Description</a>
        </li>
        <li class="nav-item">
        <a
            class="nav-link"
            id="profile-tab"
            data-toggle="tab"
            href="#profile"
            role="tab"
            aria-controls="profile"
            aria-selected="false"
            >Find My Size</a
        >
        </li>
        <li class="nav-item">
        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Comments</a
        >
        </li>
        <li class="nav-item">
        <a
            class="nav-link"
            id="review-tab"
            data-toggle="tab"
            href="#review"
            role="tab"
            aria-controls="review"
            aria-selected="false"
            >Reviews</a
        >
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel"aria-labelledby="home-tab">
            <!--
        <p>
            Beryl Cook is one of Britain’s most talented and amusing artists
            .Beryl’s pictures feature women of all shapes and sizes enjoying
            themselves .Born between the two world wars, Beryl Cook eventually
            left Kendrick School in Reading at the age of 15, where she went
            to secretarial school and then into an insurance office. After
            moving to London and then Hampton, she eventually married her next
            door neighbour from Reading, John Cook. He was an officer in the
            Merchant Navy and after he left the sea in 1956, they bought a pub
            for a year before John took a job in Southern Rhodesia with a
            motor company. Beryl bought their young son a box of watercolours,
            and when showing him how to use it, she decided that she herself
            quite enjoyed painting. John subsequently bought her a child’s
            painting set for her birthday and it was with this that she
            produced her first significant work, a half-length portrait of a
            dark-skinned lady with a vacant expression and large drooping
            breasts. It was aptly named ‘Hangover’ by Beryl’s husband and
        </p>
        <p>
            It is often frustrating to attempt to plan meals that are designed
            for one. Despite this fact, we are seeing more and more recipe
            books and Internet websites that are dedicated to the act of
            cooking for one. Divorce and the death of spouses or grown
            children leaving for college are all reasons that someone
            accustomed to cooking for more than one would suddenly need to
            learn how to adjust all the cooking practices utilized before into
            a streamlined plan of cooking that is more efficient for one
            person creating less
        </p>
-->
        <div class="card" style="width: 1050px; height:500px;">
            <img src="{{ asset('sizeImage/size.jpg')}}" alt="" srcset="" >
        </div>

        </div>
        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <div class="table-responsive">
                <table class="table">
                    <div class="card">
                    <div class="cardtest findsize">
                        <div class="card-header" ><h5>Find the Size :</h5></div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h6><label for="inputAddress">Sholder Size &nbsp;&nbsp;'*Inch'</label></h6>
                                    <input type="text" class="form-control sholder" name="" placeholder="Sholder Size">
                                    <input type="hidden" value="{{$product-> cat}}" class="cat_id">
                                </div>
                                <div class="col">
                                <h6> <label for="inputAddress">Chest Size &nbsp;&nbsp;'*Inch'</label></h6>
                                    <input type="text" class="form-control" name="chst" placeholder="chest Size">
                                </div>
                            </div>
                            <br>
                            <hr>
                            <div class="row">
                                <div class="col">
                                    <h4> You Have Mached the Size : 
                                        <label for="txtsize" class="lablesize" id="lablesize"></label></h4>
                                </div>
                                <div class="col">
                                    <button class="btn btn-success float-right btnfindsize"><i class="fa-solid fa-magnifying-glass"></i>  My Size</button>
                                </div>
                            </div>

                        </div>
                        
                    </div>
                    
                    </div>
                </table>
            </div>
        </div>
        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
            <div class="row">
                <div class="col-lg-6">
                    <div class="comment_list">
                        <div class="review_item">
                    <div class="media">
                        <div class="d-flex">
                        <img
                            src="img/product/single-product/review-1.png"
                            alt=""
                        />
                        </div>
                        <div class="media-body">
                        <h4>Blake Ruiz</h4>
                        <h5>12th Feb, 2017 at 05:56 pm</h5>
                        <a class="reply_btn" href="#">Reply</a>
                        </div>
                    </div>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                        sed do eiusmod tempor incididunt ut labore et dolore magna
                        aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                        ullamco laboris nisi ut aliquip ex ea commodo
                    </p>
                    </div>
                    <div class="review_item reply">
                    <div class="media">
                        <div class="d-flex">
                        <img
                            src="img/product/single-product/review-2.png"
                            alt=""
                        />
                        </div>
                        <div class="media-body">
                        <h4>Blake Ruiz</h4>
                        <h5>12th Feb, 2017 at 05:56 pm</h5>
                        <a class="reply_btn" href="#">Reply</a>
                        </div>
                    </div>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                        sed do eiusmod tempor incididunt ut labore et dolore magna
                        aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                        ullamco laboris nisi ut aliquip ex ea commodo
                    </p>
                    </div>
                    <div class="review_item">
                    <div class="media">
                        <div class="d-flex">
                        <img
                            src="img/product/single-product/review-3.png"
                            alt=""
                        />
                        </div>
                        <div class="media-body">
                        <h4>Blake Ruiz</h4>
                        <h5>12th Feb, 2017 at 05:56 pm</h5>
                        <a class="reply_btn" href="#">Reply</a>
                        </div>
                    </div>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                        sed do eiusmod tempor incididunt ut labore et dolore magna
                        aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                        ullamco laboris nisi ut aliquip ex ea commodo
                    </p>
                    </div>
                </div>
                </div>
                <div class="col-lg-6">
                <div class="review_box">
                    <h4>Post a comment</h4>
                    <form
                    class="row contact_form"
                    action="contact_process.php"
                    method="post"
                    id="contactForm"
                    novalidate="novalidate"
                    >
                    <div class="col-md-12">
                        <div class="form-group">
                        <input
                            type="text"
                            class="form-control"
                            id="name"
                            name="name"
                            placeholder="Your Full name"
                        />
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                        <input
                            type="email"
                            class="form-control"
                            id="email"
                            name="email"
                            placeholder="Email Address"
                        />
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                        <input
                            type="text"
                            class="form-control"
                            id="number"
                            name="number"
                            placeholder="Phone Number"
                        />
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                        <textarea
                            class="form-control"
                            name="message"
                            id="message"
                            rows="1"
                            placeholder="Message"
                        ></textarea>
                        </div>
                    </div>
                    <div class="col-md-12 text-right">
                        <button
                        type="submit"
                        value="submit"
                        class="btn submit_btn"
                        >
                        Submit Now
                        </button>
                    </div>
                    </form>
                </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">
            <div class="row">
                <div class="col-lg-6">
                <div class="row total_rate">
                    <div class="col-6">
                    <div class="box_total">
                        <h5>Overall</h5>
                        <h4>4.0</h4>
                        <h6>(03 Reviews)</h6>
                    </div>
                    </div>
                    <div class="col-6">
                    <div class="rating_list">
                        <h3>Based on 3 Reviews</h3>
                        <ul class="list">
                        <li>
                            <a href="#"
                            >5 Star
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i> 01</a
                            >
                        </li>
                        <li>
                            <a href="#"
                            >4 Star
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i> 01</a
                            >
                        </li>
                        <li>
                            <a href="#"
                            >3 Star
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i> 01</a
                            >
                        </li>
                        <li>
                            <a href="#"
                            >2 Star
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i> 01</a
                            >
                        </li>
                        <li>
                            <a href="#"
                            >1 Star
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i> 01</a
                            >
                        </li>
                        </ul>
                    </div>
                    </div>
                </div>
                <div class="review_list">
                    <div class="review_item">
                    <div class="media">
                        <div class="d-flex">
                        <img
                            src="img/product/single-product/review-1.png"
                            alt=""
                        />
                        </div>
                        <div class="media-body">
                        <h4>Blake Ruiz</h4>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        </div>
                    </div>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                        sed do eiusmod tempor incididunt ut labore et dolore magna
                        aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                        ullamco laboris nisi ut aliquip ex ea commodo
                    </p>
                    </div>
                    <div class="review_item">
                    <div class="media">
                        <div class="d-flex">
                        <img
                            src="img/product/single-product/review-2.png"
                            alt=""
                        />
                        </div>
                        <div class="media-body">
                        <h4>Blake Ruiz</h4>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        </div>
                    </div>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                        sed do eiusmod tempor incididunt ut labore et dolore magna
                        aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                        ullamco laboris nisi ut aliquip ex ea commodo
                    </p>
                    </div>
                    <div class="review_item">
                    <div class="media">
                        <div class="d-flex">
                        <img
                            src="img/product/single-product/review-3.png"
                            alt=""
                        />
                        </div>
                        <div class="media-body">
                        <h4>Blake Ruiz</h4>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        </div>
                    </div>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                        sed do eiusmod tempor incididunt ut labore et dolore magna
                        aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                        ullamco laboris nisi ut aliquip ex ea commodo
                    </p>
                    </div>
                </div>
                </div>
                <div class="col-lg-6">
                <div class="review_box">
                    <h4>Add a Review</h4>
                    <p>Your Rating:</p>
                    <ul class="list">
                    <li>
                        <a href="#">
                        <i class="fa fa-star"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                        <i class="fa fa-star"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                        <i class="fa fa-star"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                        <i class="fa fa-star"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                        <i class="fa fa-star"></i>
                        </a>
                    </li>
                    </ul>
                    <p>Outstanding</p>
                    <form
                    class="row contact_form"
                    action="contact_process.php"
                    method="post"
                    id="contactForm"
                    novalidate="novalidate"
                    >
                    <div class="col-md-12">
                        <div class="form-group">
                        <input
                            type="text"
                            class="form-control"
                            id="name"
                            name="name"
                            placeholder="Your Full name"
                        />
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                        <input
                            type="email"
                            class="form-control"
                            id="email"
                            name="email"
                            placeholder="Email Address"
                        />
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                        <input
                            type="text"
                            class="form-control"
                            id="number"
                            name="number"
                            placeholder="Phone Number"
                        />
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                        <textarea
                            class="form-control"
                            name="message"
                            id="message"
                            rows="1"
                            placeholder="Review"
                        ></textarea>
                        </div>
                    </div>
                    <div class="col-md-12 text-right">
                        <button
                        type="submit"
                        value="submit"
                        class="btn submit_btn"
                        >
                        Submit Now
                        </button>
                    </div>
                    </form>
                </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
<!--================End Product Description Area =================-->
<script>
    $('.sin-btn').click(function (e) {
      e.preventDefault();
      alert('onclik');
      var proQty = $(this).closest('pqty').find('.qty').html();
      alert(proQty);
      
    });

    $('.btnfindsize').click(function (e) {
      e.preventDefault();

      var findsize = $(this).closest('.findsize').find('.sholder').val();
      var catid = $(this).closest('.findsize').find('.cat_id').val();
      
      //alert(catid);

      $.ajax({
        method: "POST",
        url: "/find-size",
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        data: {
          'findsize':findsize,
          'catid':catid,
        },
        success: function(response){
            
           // console.log(response.size_lbl);
            $('#lablesize').text(response.size_lbl);

        }
      }) ; 
      
    });
    

</script>
@endsection