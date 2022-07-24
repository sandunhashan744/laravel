@extends('layouts.mainlayouts')

@section('content')

<!--================Home Banner Area =================-->
<section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
      <div class="container">
        <div
          class="banner_content d-md-flex justify-content-between align-items-center"
        >
          <div class="mb-3 mb-md-0">
            <h2>Product Checkout</h2>
            <p>Very us move be blessed multiply night</p>
          </div>
          <div class="page_link">
            <a href="{{'/'}}">Home</a>
            <a href="#">Product Checkout</a>
          </div>
        </div>
      </div>
    </div>
</section>
    <!--================End Home Banner Area =================-->

    <!--================Checkout Area =================-->
    <section class="checkout_area section_gap">
      <div class="container">
        <div class="billing_details">

          <form action="{{ url('place-order')}}" method="post">
            <div class="row">
              <div class="col-lg-7">
                <h3>Billing Details</h3>

                <form method="post" action="/bellingDetails">
                  @csrf
                  <div class="row">
                      <div class="col">
                        <input type="text" class="form-control" value="{{ Auth::user()->name }}" name="name" placeholder="Name">
                      </div>
                  </div> 
                  <br>                                     
                  <div class="row">
                      <div class="col">
                        <input type="text" class="form-control" value="{{ Auth::user()->phone }}" name="phone" placeholder="Phone No">
                      </div>
                      <div class="col">
                        <input type="text" class="form-control" value="{{ Auth::user()->email }}" name="email" placeholder="Email Address">
                      </div>
                  </div>
                  <br>
                  <div class="row">
                    <div class="col">
                      <input type="text" class="form-control" value="{{ Auth::user()->address1 }}" name="address1" placeholder="Address Line 01">
                    </div>
                  </div>
                  <br>
                  <div class="row">
                    <div class="col">
                      <input type="text" class="form-control" value="{{ Auth::user()->address2 }}" name="address2" placeholder="Address Line 02">
                    </div>
                  </div>   
                  <br> 
                  <div class="row">
                    <div class="col">
                      <input type="text" class="form-control" value="{{ Auth::user()->city }}" name="city" placeholder="Town/City">
                    </div>
                    <div class="col">
                      <input type="text" class="form-control" value="{{ Auth::user()->district }}" name="district" placeholder="District">
                    </div>
                  </div>
                  <br>  
                  <div class="row">
                    <div class="col">
                      <input type="text" class="form-control" value="{{ Auth::user()->zipCode }}" name="zipcode" placeholder="Postal Code/ZIP">
                    </div>
                  </div>
                  <br>
                  
                </form>
              </div>
              
              <div class="col-lg-5">
                <div class="order_box">
                  <h2>Your Bill</h2>
                    <table width="100%">
                      <thead>
                        <tr>
                          <th>Product</th>
                          <th>Qty</th>
                          <th>U.Price</th>
                          <th>Tot.Price</th>
                        </tr>
                      </thead>
                      
                      <tbody>
                        @php $subTot=0; @endphp
                        @foreach($cartItem as $item)
                        <tr>
                          <td>{{$item->pro_name}}</td>
                          <td>{{$item->qty}}</td>
                          <td>{{$item->products->price}}</td>
                          <td>{{$item->products->price * $item->qty}}</td>
                        </tr>
                        @php $subTot += $item->products->price * $item->qty; @endphp
                        @endforeach

                      </tbody>

                      <tfoot>
                        <tr><span></span></tr>
                        <tr>
                          <th>Sub Total :</th>
                          <th></th> 
                          <th></th> 
                          <th> <input type="hidden" name="totalPrice" value="{{$subTot}}"> Rs: {{$subTot}}</th>
                        </tr>
                      </tfoot>
                    </table>

                  <br><hr><h4>Payment Methods</h4><hr>
                  <div class="payment_item">
                      <div class="radion_btn">
                          <input type="radio" id="f-option5" name="selector" />
                          <label for="f-option5">COD</label>
                          <div class="check"></div>
                      </div>
                  
                      <div class="payment_item active">
                        <div class="radion_btn">
                          <input type="radio" id="f-option6" name="selector" />
                          <label for="f-option6">Paypal </label>
                          <img src="img/product/single-product/card.jpg" alt="" />
                          <div class="check"></div>
                          </div>
                      </div><br><hr>
                  <!--<div class="creat_account">
                    <input type="checkbox" id="f-option4" name="selector" />
                    <label for="f-option4">I’ve read and accept the </label>
                    <a href="#">terms & conditions*</a>
                  </div> -->
                  <div class="text-right">
                    <button type="submit" class="btn btn-success  btn-block ">Proceed</button>
                  </div>
                </div>
              </div>
            </div>
          </form>

        </div>
      </div>
    </section>
    <!--================End Checkout Area =================-->


@endsection