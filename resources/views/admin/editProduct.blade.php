@extends('layouts.adminlayouts')

@section('content')

<main>
	<div class="head-title">
		<div class="left">
			<h3>Dashboard</h3>
			<ul class="breadcrumb">
				<li>
					<a href="#">Dashboard</a>
				</li>
				<li><i class='bx bx-chevron-right' ></i></li>
				<li>
					<a class="active" href="admin">Home</a>
				</li>
			</ul>
		</div>
	</div>
    <div class="table-data">
		<div class="todo">
            <div class="col-md-12">
                <div class="card" style="aline:center">
                    <div class="card-header" style="background-color:#71cd14;">
                        <h5 style="color:#fff;">Edit Products
                        <a href="{{ route('product.details')}}" class="btn btn-danger float-end"><i class="fa-solid fa-xmark"></i></a></h5>

                    </div>
                    <div class="card-body">
                        <form action="{{ url('product/update/'.$product->id) }}" method="post" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col">
                                        <label for="inputAddress">Category</label>
                                        <select class="form-select" name="catid">
                                            <option value="{{$product->cat}}">{{$product->category->category}}</option>    
                                        </select>
                                    </div>
                                    <div class="col">
                                        <label for="inputAddress">Sub Category</label>
                                        <select class="form-select" name="subcat">
                                            <option value="{{$product->sub_cat}}">{{$product->subcat->SubCat }}</option>    
                                        </select>
                                    </div>
                                </div>	
                                <br>
                                <div class="row">
                                    <div class="col">
                                        <label for="inputAddress">Product</label>
                                        <input type="text" class="form-control" name="product" value="{{$product->name}}" placeholder="Product name" required>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col">
                                        <label for="inputAddress">Description</label>
                                        <textarea class="form-control" name="description"  rows="3" value="{{$product-> description}}" placeholder="Somthing about the Product" required></textarea>
                                    </div>
                                </div>
                                <br>
                                
                                <div class="row">
                                    <div class="col">
                                        <label for="inputAddress">Reguler Price</label>
                                        <input type="text" class="form-control" name="price" value="{{$product->price}}"placeholder="Reguler Price" required>
                                    </div>

                                    <div class="col">
                                        <label for="inputAddress">Discount Price</label>
                                        <input type="text" class="form-control" name="disPrice" value="{{$product->dis_price}}" placeholder="Discount Price">
                                    </div>
                                </div>
                                <br>
                                
                                <label for="inputAddress">Size vise Qty: </label>&nbsp;&nbsp;&nbsp;
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="radSt" value="option1" onclick="standSize()" checked>
                                    <label class="form-check-label">Standed</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="radInch" value="option2" onclick="inchSize()">
                                    <label class="form-check-label" for="inlineRadio2">inch</label>
                                </div>

                                <div class="row" id="standSize">
                                    <div class="col" >
                                        <label for="inputAddress"></label>
                                        <input type="text" class="form-control" name="s"  placeholder="S_Qty">
                                    </div>
                                    <div class="col" >
                                        <label for="inputAddress"></label>
                                        <input type="text" class="form-control" name="m" placeholder="M_Qty">
                                    </div>
                                    <div class="col">
                                        <label for="inputAddress"></label>
                                        <input type="text" class="form-control" name="l" placeholder="L_Qty">
                                    </div>
                                    <div class="col">
                                        <label for="inputAddress"></label>
                                        <input type="text" class="form-control" name="xl" placeholder="XL_Qty">
                                    </div>
                                </div>
                                <div class="row" id="inchsize"	hidden>
                                    <div class="col" >
                                        <label for="inputAddress"></label>
                                        <input type="text" class="form-control" name="s28"  placeholder="28_Qty">
                                    </div>
                                    <div class="col" >
                                        <label for="inputAddress"></label>
                                        <input type="text" class="form-control" name="s30"  placeholder="30_Qty">
                                    </div>
                                    <div class="col" >
                                        <label for="inputAddress"></label>
                                        <input type="text" class="form-control" name="s32" placeholder="32_Qty">
                                    </div>
                                    <div class="col">
                                        <label for="inputAddress"></label>
                                        <input type="text" class="form-control" name="s34" placeholder="34_Qty">
                                    </div>
                                    <div class="col">
                                        <label for="inputAddress"></label>
                                        <input type="text" class="form-control" name="s36" placeholder="36_Qty">
                                    </div>
                                </div>
                                <br>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="checkbox1">
                                    <label class="form-check-label" for="flexSwitchCheckDefault">Seasonal Product</label>
                                </div>

                                <div class="row"   id="autoUpdate"  style="display:none">
                                    <div class="col" >
                                        <label for="inputAddress"></label>
                                        <input type="date" class="form-control" id="seson" name="stdate" placeholder="Start Date">
                                    </div>

                                    <div class="col">
                                        <label for="inputAddress"></label>
                                        <input type="date" class="form-control" name="endate" placeholder="End Date">
                                    </div>
                                </div>
                                <br>
                                <br>
                                <div class="row">
                                    <div class="col">
                                        <label for="inputAddress">Display Image</label>
                                        
                                        <input type="file" class="form-control-file" id="exampleFormControlFile1" name="img" ><br>
                                        @if($product->image)
                                        <img src="{{asset('productimg/'.$product-> image)}}" alt="" width = "75" height = "75">
                                        @endif
                                    </div>
                                    <div class="col">
                                        <label for="inputAddress">Image Galary</label>
                                        <input type="file" class="form-control-file" id="galaty" name="imggalary" multiple>
                                    </div>
                                </div>
                            </div>
                            <br><br><hr>
                            
                                <button type="submit" class="btn btn-success float-end"> <i class="fa-solid fa-floppy-disk"></i> Update</button>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
	$(document).ready(function () {
		$('#checkbox1').change(function () {
			if (!this.checked)
			//  ^
			$('#autoUpdate').fadeOut('slow');
			else 
				$('#autoUpdate').fadeIn('slow');
		});

	return});


	function inchSize(){
		document.getElementById('standSize').hidden = "hidden"; // hide body div tag
		document.getElementById('inchsize').hidden = ""; // show body1 div tag
	}

	function standSize(){
		document.getElementById('inchsize').hidden = "hidden"; // hide body div tag
		document.getElementById('standSize').hidden = ""; // show body1 div tag
	}

</script>

@endsection