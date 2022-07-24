
@extends('layouts.mainlayouts')

@section('content')

  <!--================Home Banner Area =================-->
<section class="home_banner_area mb-40">
    <div class="banner_inner d-flex align-items-center">
      <div class="container">
        <div class="banner_content row">
          <div class="col-lg-12">
            <p class="sub text-uppercase">men Collection</p>
            <h3><span>Show</span> Your <br />Personal <span>Style</span></h3>
            <h4>Fowl saw dry which a above together place.</h4>
            <a class="main_btn mt-40" href="#">View Collection</a>
          </div>
        </div>
      </div>
    </div>
</section>
  <!--================End Home Banner Area =================-->

  <!--================ Feature Product Area =================-->
  <section class="feature_product_area section_gap_bottom_custom">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-12">
          <div class="main_title">
          @if(!empty($data))
            <h2><span>Seasonal products</span></h2>
            <p>Bring called seed first of third give itself now ment</p>
          @else
          <h2><span>Random product</span></h2>
            <p>Bring called seed first of third give itself now ment</p>
          @endif

          </div>
        </div>
      </div>

      <div class="row">
        <div class="owl-carousel owl-theme">
            <div class="item"><h4>1</h4></div>
            <div class="item"><h4>2</h4></div>
            <div class="item"><h4>3</h4></div>
            <div class="item"><h4>4</h4></div>
            <div class="item"><h4>5</h4></div>
            <div class="item"><h4>6</h4></div>
            <div class="item"><h4>7</h4></div>
            <div class="item"><h4>8</h4></div>
            <div class="item"><h4>9</h4></div>
            <div class="item"><h4>10</h4></div>
            <div class="item"><h4>11</h4></div>
            <div class="item"><h4>12</h4></div>
        </div>

        @if(!empty($data))
            @foreach($data as $datas)
            <div class="col-lg-3 col-md-6">
              <div class="single-product maintst">
                <div class="card">
                <div class="product-img">
                <a href="{{ route('product.show',$datas['id'])}}">
                  <img class="img-fluid w-100" src="{{ asset('productimg/'.$datas['image'])}}" alt="" style="object-fit:cover; width:200px; height:200px;" />
                  <input type="hidden" value="{{$datas['id']}}" class="pro_id">
                </a>
                  <div class="p_icon">
                    <a href="">
                      <i class="ti-eye"></i>
                    </a>
                    <a href="#">
                      <i class="ti-heart"></i>
                    </a>
                  </div>
                  
                </div>
                <div class="product-btn">
                  <a href="#" class="d-block" >
                    <h4 class="proName">{{$datas['name']}}</h4>
                  </a>
                  <div class="mt-3">
                  @if($datas['dis_price'])
                    <span class="mr-4">Rs: {{$datas['dis_price']}}</span>
                    <del>Rs: {{$datas['price']}}</del>
                  @else
                    <span class="mr-4">Rs: {{$datas['price']}}</span>
                    <del></del>
                  @endif
                  </div>
                  
                </div>
                </div>
              </div>
            </div>
              @if ($loop->index==3) @break @endif
            @endforeach
        @else
            @foreach($randProduct as $newPro)
            <div class="col-lg-3 col-md-6">
              <div class="single-product maintst">
                <div class="card">
                <div class="product-img">
                <a href="{{ route('product.show',$newPro->id)}}">
                  <img class="img-fluid w-100" src="{{ asset('productimg/'.$newPro-> image)}}" alt="" style="object-fit:cover; width:200px; height:200px;" />
                  <input type="hidden" value="{{$newPro-> id}}" class="pro_id">
                </a>
                  <div class="p_icon">
                    <a href="">
                      <i class="ti-eye"></i>
                    </a>
                    <a href="#">
                      <i class="ti-heart"></i>
                    </a>
                  </div>
                  
                </div>
                <div class="product-btn">
                  <a href="#" class="d-block" >
                    <h4 class="proName">{{$newPro->name}}</h4>
                  </a>
                  <div class="mt-3">
                  @if($newPro->dis_price)
                    <span class="mr-4">Rs: {{$newPro->dis_price}}</span>
                    <del>Rs: {{$newPro->price}}</del>
                  @else
                    <span class="mr-4">Rs: {{$newPro->price}}</span>
                    <del></del>
                  @endif
                  </div>
                  
                </div>
                </div>
              </div>
            </div>
              @if ($loop->index==3) @break @endif
            @endforeach
        @endif
      
      </div>
    </div>
  </section>
  <!--================ End Feature Product Area =================-->

  <!--================ Offer Area =================-->
 
  <section class="offer_area">
    <div class="container">
      <div class="row justify-content-center">
        <div class="offset-lg-4 col-lg-6 text-center">
          <div class="offer_content">
            <h3 class="text-uppercase mb-40">all men’s collection</h3>
            <h2 class="text-uppercase">50% off</h2>
            <a href="#" class="main_btn mb-20 mt-5">Discover Now</a>
            <p>Limited Time Offer</p>
          </div>
        </div>
      </div>
    </div>
  </section>
  
  <!--================ End Offer Area =================-->

  <!--================ New Product Area =================-->
  <section class="new_product_area section_gap_top section_gap_bottom_custom">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-12">
          <div class="main_title">
            <h2><span>new products</span></h2>
            <p>Bring called seed first of third give itself now ment</p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-6 mt-5 mt-lg-0">
          <div class="row">
            @foreach($newProducts as $tab)
            <div class="col-lg-6 col-md-6">
              <div class="single-product maintst">
                <div class="product-img">
                  <a href="{{ route('product.show',$tab->id)}}">
                    <img class="img-fluid w-100" src="{{ asset('productimg/'.$tab-> image)}}" alt="" style="object-fit:cover; width:260px; height:200px;"/>
                    <input type="hidden" value="{{$tab-> id}}" class="pro_id">
                  </a> 
                  <div class="p_icon">
                    <a href="#">
                      <i class="ti-eye"></i>
                    </a>
                    <a href="#" class="cartbtn">
                      <i class="ti-shopping-cart"></i>
                    </a>
                  </div>
                </div>
                <div class="product-btm">
                  <a href="#" class="d-block">
                    <h4 class="proName">{{ $tab->name }}</h4>
                  </a>
                  <div class="mt-3">
                  <span class="mr-4">Rs:{{ $tab->price }}</span>
                    <del>{{ $tab->price }}</del>
                  </div>
                </div>
              </div>
            </div>
            @if ($loop->index==3) @break @endif
        @endforeach  
        </div>
        </div>

        <div class="col-lg-6">
          <div class="new_product">
            <h5 class="text-uppercase">Nike latest sneaker</h5>
            <h3 class="text-uppercase">$25.00</h3>
            <div class="product-img">
              <img class="img-fluid" src="img/product/new-product/n1.jpg" alt="" />
            </div>
            <h4></h4>
            <a href="#" class="main_btn">Add to cart</a>
          </div>
        </div>

      </div>
    </div>
  </section>
  <!--================ End New Product Area =================-->

  <!--================ Inspired Product Area =================-->
  <section class="inspired_product_area section_gap_bottom_custom">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-12">
          <div class="main_title">
            <h2><span>Inspired products</span></h2>
            <p>Bring called seed first of third give itself now ment</p>
          </div>
        </div>
      </div>

      <div class="row">
      @foreach($randProduct as $tab)
      
        <div class="col-lg-3 col-md-6">
          <div class="single-product maintst">    
            <div class="product-img">
              <a href="{{ route('product.show',$tab->id)}}">
                <img class="img-fluid w-100" src="{{ asset('productimg/'.$tab-> image)}}" alt="" style="object-fit:cover; width:200px; height:200px;"/>
                <input type="hidden" value="{{$tab-> id}}" class="pro_id">
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
                <h4 class="proName">{{ $tab->name }}</h4>
              </a>
              <div class="mt-3">
                <span class="mr-4">Rs:{{ $tab->price }}</span>
                <del></del>
              </div>
            </div>
          </div>
          
        </div>
        @if ($loop->index==3) @break @endif
      @endforeach
      </div>
    </div>
  </section>
  <!--================ End Inspired Product Area =================-->

  @php $date=date('Y-m-d'); @endphp

  <script>
    $('.featured-carousel').owlCarousel({
      loop:true,
      margin:10,
      nav:true,
      responsive:{
          0:{
              items:1
          },
          600:{
              items:3
          },
          1000:{
              items:5
          }
      }
})
  </script>
@endsection
