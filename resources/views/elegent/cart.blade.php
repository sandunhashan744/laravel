@extends('layouts.mainlayouts')

@section('content')

<section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
      <div class="container">
        <div class="banner_content d-md-flex justify-content-between align-items-center">
          <div class="mb-3 mb-md-0">
            <h2>Cart</h2>
            <p>Very us move be blessed multiply night</p>
          </div>
          
          <div class="page_link">
            <a href="index">Home</a>
            <a href="category.html">Cart</a>
          </div>
        
      </div>
      </div>
    </div>
</section>
<!--================End Home Banner Area =================-->

<!--================ Cart Area =================-->
<section class="cart_area">
    <div class="container">
      <div class="cart_inner">
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">Product</th>
                <th scope="col">Size</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Total</th>
                <th scope="col">Remove</th>
              </tr>
            </thead>
            <tbody class="cart-details proCart">
            @php $subtot=0; @endphp
            @foreach($cartItem as $items)    
              <tr class="cart-item-delete">
                <td>
                  <div class="media">
                    <div class="d-flex">
                      <img
                        src="{{asset('productimg/'.$items->products->image)}}" height="70px" width="70px"
                        alt=""
                      />
                    </div>

                    <div class="media-body">
                      <input type="hidden" value="{{ $items->pro_id }}" class="productId">
                      <p><h5>{{$items->pro_name}}</h5></p>
                    </div>
                  </div>
                </td>

                <td>
                  <h5>{{$items->size}}</h5>
                </td>

                <td>
                  <input type="hidden" value="{{ $items->products->price}}" class="pro-price">
                    <h5>{{$items->products->price}}</h5>
                </td>

                <td>
                  <!--
                  <div class="product_count pro-qty-in-de">
                    <div class="input-group text-center mb-3" >
                      <samp class="input-group-text decrement-btn pri-chan-btn">-</samp>
                      <input type="text" name="quantity" id="valQty" class="form-control text-center qty-input" value="{{$items->qty}}">
                      <samp class="input-group-text increment-btn pri-chan-btn">+</samp>
                    </div>
                  </div>
                  -->
                  
                  <div class="product_count" id="maincount" value="{{ $items->pro_id }}">

                        <input
                            type="text"
                            name="qty"
                            id="sst"
                            maxlength="12"
                            value="{{$items->qty}}"
                            title="Quantity:"
                            class="input-text qty Proqty"
                        />
                    <button
                        onclick="
                        var result = document.getElementById('sst');
                        var main = document.getElementById('maincount'); 
                       // var pcout = result.value;
                        var sst = result.value;

                       // if(!isNaN(pcout))
                          if( !isNaN( sst )) 
                            result.value++;
                          return false;"
                        

                        class="increase items-count qty-chan-btn"
                        type="button"
                    >
                        <i class="lnr lnr-chevron-up"></i>
                    </button>
                    <button
                        onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 0 ) result.value--;return false;"
                        class="reduced items-count qty-chan-btn"
                        type="button"
                    >
                        <i class="lnr lnr-chevron-down"></i>
                    </button>
                    </div>

                </td>
                <td class="totPrice">
                  <h5 class="totPriceqty">{{$items->products->price * $items->qty}}</h5>
                </td>
                <td >
                  <a href="" class="btn btn-danger delete-cart-item"><i class="fa-solid fa-circle-minus"></i></a>
                </td>
              </tr>
              @php  $subtot += $items->products->price * $items->qty;  @endphp
              @endforeach 
              <tr>
                <td></td>
                <td></td>
                <td></td>
                <td>
                  <h5>Subtotal</h5>
                </td>
                <td>
                  <h5>{{$subtot}}</h5>
                </td>
                <td></td>
              </tr>            
              <tr class="out_button_area">
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>
                  <div class="checkout_btn_inner">
                    <a class="gray_btn" href="\">Continue Shopping</a>
                    <a class="main_btn" href="{{url('checkout')}}">Proceed to checkout</a>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
</section>
<!--================End Cart Area =================-->

@endsection