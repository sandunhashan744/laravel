@extends('layouts.mainlayouts')

@section('content')

  <section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
      <div class="container">
        <div class="banner_content d-md-flex justify-content-between align-items-center">
          <div class="mb-3 mb-md-0">
            <h2>Shop Category</h2>
            <p>Very us move be blessed multiply night</p>
          </div>
          
          <div class="page_link">
            <a href="index">Home</a>
            <a href="category.html">Shop</a>
            <a href="category.html">Mens Fashion</a>
          </div>
        
      </div>
      </div>
    </div>
  </section>
<!--================End Home Banner Area =================-->

<!--================Category Product Area =================-->
<section class="cat_product_area section_gap">
  <div class="container">
    <div class="row ">
      <div class="col-lg-9">
        <div class="product_top_bar">
          <div class="left_dorp">
            <select class="sorting">
              <option value="1">Default sorting</option>
              <option value="2">Default sorting 01</option>
              <option value="4">Default sorting 02</option>
            </select>
            <select class="show">
              <option value="1">Show 12</option>
              <option value="2">Show 14</option>
              <option value="4">Show 16</option>
            </select>
          </div>
        </div>

        <div class="latest_product_inner">
          <div class="row">

            @foreach($data as $product)
            <div class="col-lg-4 col-md-6">
              <div class="single-product">
                <div class="product-img">
                  <a href="{{ route('product.show',$product->id)}}">
                    <img
                      class="card-img"
                      src="{{ asset('productimg/'.$product-> image)}}"
                      alt=""
                      style="object-fit:cover; width:260px; height:200px;"
                    />
                    <input type="hidden" value="{{$product-> id}}" class="pro_id">
                  </a>
                  <div class="p_icon">
                    <a href="#">
                      <i class="ti-eye"></i>
                    </a>
                    <a href="#">
                      <i class="ti-heart"></i>
                    </a>
                  </div>
                </div>
                <div class="product-btm">
                  <a href="#" class="d-block">
                    <h4>Latest men’s sneaker</h4>
                  </a>
                  <div class="mt-3">
                    @if($product->dis_price)
                      <span class="mr-4">Rs: {{$product->dis_price}}</span>
                      <del>Rs: {{$product->price}}</del>
                    @else
                      <span class="mr-4">Rs: {{$product->price}}</span>
                      <del></del>
                    @endif
                  </div>
                </div>
              </div>
            </div>
            @endforeach

          </div>
        </div>
      </div>

      <div class="col-lg-3">
        <div class="left_sidebar_area">
          <aside class="left_widgets p_filter_widgets" style="background-color:#f6f6f6;">
            <div class="l_w_title">
              <h3>Sub Categories</h3>
            </div>
            <div class="widgets_inner">
              <ul class="list">
                @foreach($subcat as $subcat)
                  <li active>
                    <a href="{{route('shopSubcat',[$product-> cat,$subcat->id])}}">{{$subcat->SubCat}}</a>
                  </li>
                  <hr>
                @endforeach
              </ul>
            </div>
          </aside>

          <aside class="left_widgets p_filter_widgets" style="background-color:#f6f6f6;">
            <div class="l_w_title">
              <h3>Product Category</h3>
            </div>
            <div class="widgets_inner">
              <ul class="list">
                <li>
                  <a href="{{route('shop',1)}}">Man</a><hr>
                </li>
                <li>
                  <a href="{{route('shop',2)}}">Woman</a><hr>
                </li>
                <li>
                  <a href="{{route('shop',3)}}">Kids</a><hr>
                </li>
                
              </ul>
            </div>
          </aside>

<!--
          <aside class="left_widgets p_filter_widgets">
            <div class="l_w_title">
              <h3>Color Filter</h3>
            </div>
            <div class="widgets_inner">
              <ul class="list">
                <li>
                  <a href="#">Black</a>
                </li>
                <li>
                  <a href="#">Black Leather</a>
                </li>
                <li class="active">
                  <a href="#">Black with red</a>
                </li>
                <li>
                  <a href="#">Gold</a>
                </li>
                <li>
                  <a href="#">Spacegrey</a>
                </li>
              </ul>
            </div>
          </aside>

          <aside class="left_widgets p_filter_widgets">
            <div class="l_w_title">
              <h3>Price Filter</h3>
            </div>
            <div class="widgets_inner">
              <div class="range_item">
                <div id="slider-range"></div>
                <div class="">
                  <label for="amount">Price : </label>
                  <input type="text" id="amount" readonly />
                </div>
              </div>
            </div>
          </aside>
-->
        </div>
      </div>
    </div>
  </div>
</section>

@endsection