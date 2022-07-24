@extends('layouts.adminlayouts')

@section('content')

		<!-- MAIN -->
<main>
	<div class="head-title">
		<div class="left">
			<h4>Dashboard</h4>
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

<!--*********************** Product Table ***********************************-->
	<div class="table-data">
		<div class="order">
			<div class="card" style="aline:center">
				<div class="card-header" style="background-color:#71cd14;">
					<h5 style="color:#fff;">All Products
				<!--		<button type="button" class="btn btn-success float-right" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class='bx bx-plus-medical' ></i> New Product</button>-->
						<a href="{{ route('product.add')}}" class="btn btn-primary float-end"><i class="fa-solid fa-plus"></i> Add New</a></h5>
					</h5>
				</div>
			
				<div class="card-body"><br>
					<table id="product" class="table" style="width:100%">
						<thead>
							<tr>
							<th class="th-sm">Product</th>
							<th class="th-sm">Qty</th>
							<th class="th-sm">Price</th>
							<th class="th-sm">Discount</th>
							<th class="th-sm">Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach($product as $tab)
							<tr>
								<td>
									<img src="{{ asset('productimg/'.$tab-> image)}}"   width = "30" height = "30">
									<p>{{ $tab-> name}}</p>
								</td>

								<td>{{ $tab-> totProQty}}</td>
								
								<td>{{ $tab-> price}}</td>
								<td>{{ $tab-> dis_price}}</td>

								<td>
									<a href="{{ route('product.edit',$tab-> id)}}" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i></a>
									<a href="{{ route('product.delete',$tab-> id)}}" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></a>
								</td>
							</tr>
							@endforeach	
						</tbody>
						<!--
							<tfoot>
							<tr>
							<th class="th-sm">Product</th>
							<th class="th-sm">Price</th>
							<th class="th-sm">Qty</th>
							<th class="th-sm">Action</th>
							</tr>
						</tfoot>
						-->
					</table>
				</div>
			</div>
		</div>
	</div>

<!--****************************************** Add New Product popup ******************************************-->

<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#71cd14;">
        <h5 class="modal-title" id="staticBackdropLabel" style="color:#fff;">Add Products</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
	  <form action="/addProduct" method="post" enctype="multipart/form-data">
		@csrf
      <div class="modal-body">
		  <br>
	  	<div class="row product">
			<div class="col">
				<label for="inputAddress">Category</label>
				{!! F::select('category',$cat,null, ['class' => 'form-select testcat']) !!}
				
			</div>
			<div class="col">
				<label for="inputAddress">Sub Category</label>
				{!! F::select('subcat',$subcat,null, ['class' => 'form-select']) !!}
			</div>
		</div>	
		<br>
		<div class="row">
			<div class="col">
				<label for="inputAddress">Product</label>
				<input type="text" class="form-control" name="product" placeholder="Product Name" required>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col">
				<label for="inputAddress">Description</label>
				<textarea class="form-control" name="description"  rows="3" placeholder="Somthing about the Product"></textarea>
			</div>
		</div>
		<br>
		
		<div class="row">
			<div class="col">
				<label for="inputAddress">Reguler Price</label>
				<input type="text" class="form-control" name="price" placeholder="Reguler Price" required>
			</div>

			<div class="col">
				<label for="inputAddress">Discount Price</label>
				<input type="text" class="form-control" name="disPrice" placeholder="Discount Price">
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
		<div class="row">
			<div class="col">
				<label for="inputAddress">Display Image</label>
				<input type="file" class="form-control-file" id="exampleFormControlFile1" name="img" >
				
			</div>
			<div class="col">
				<label for="inputAddress">Image Galary</label>
				<input type="file" class="form-control-file" id="galaty" name="imggalary" multiple>
			</div>
      	</div>
	  <br>	
      <div class="modal-footer">    
		<button type="submit" class="btn btn-success" > <i class='bx bx-plus-medical'></i> Insert</button>
		<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>
</form>
    </div>
  </div>
</div>

<!--****************************************** Add New Product popup End ******************************************-->

<!--********************************************* Edit Product popup **********************************************-->
<!--
<div class="modal fade" id="editProduct" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Edit Products</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
	  <form action="/editProduct" method="post" enctype="multipart/form-data">
		@csrf
      <div class="modal-body">
	  	<div class="row">
			<div class="col">
				<label for="inputAddress">Category</label>
				{!! F::select('category',$cat,null, ['class' => 'form-control']) !!}
				
			</div>
			<div class="col">
				<label for="inputAddress">Sub Category</label>
				{!! F::select('subcat',$subcat,null, ['class' => 'form-control']) !!}
			</div>
		</div>	
		<br>
		<div class="row">
			<div class="col">
				<label for="inputAddress">Product</label>
				<input type="text" class="form-control" name="product" placeholder="Product Name">
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col">
				<label for="inputAddress">Description</label>
				<textarea class="form-control" name="description"  rows="3" placeholder="Somthing about the Product"></textarea>
			</div>
		</div>
		<br>
		
		<div class="row">
			<div class="col">
				<label for="inputAddress">Reguler Price</label>
				<input type="text" class="form-control" name="price" placeholder="Reguler Price">
			</div>

			<div class="col">
				<label for="inputAddress">Discount Price</label>
				<input type="text" class="form-control" name="disPrice" placeholder="Discount Price">
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
				<input type="date" class="form-control" id="seson" placeholder="Start Date">
			</div>

			<div class="col">
				<label for="inputAddress"></label>
				<input type="date" class="form-control" placeholder="End Date">
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col">
				<label for="inputAddress">Display Image</label>
				<input type="file" class="form-control-file" id="exampleFormControlFile1" name="img" >
			</div>
			<div class="col">
				<label for="inputAddress">Image Galary</label>
				<input type="file" class="form-control-file" id="galaty" name="imggalary" multiple>
			</div>
      	</div>
	  <br>	
      <div class="modal-footer">    
		<button type="submit" class="btn btn-success" > <i class='bx bx-plus-medical'></i> Insert</button>
		<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>
</form>
    </div>
  </div>
</div>
-->
<!--****************************************** Edit Product popup End ******************************************-->

</main>
<!-- MAIN -->

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

// size vise Category Radio buttons

	function inchSize(){
		document.getElementById('standSize').hidden = "hidden"; // hide body div tag
		document.getElementById('inchsize').hidden = ""; // show body1 div tag
	}

	function standSize(){
		document.getElementById('inchsize').hidden = "hidden"; // hide body div tag
		document.getElementById('standSize').hidden = ""; // show body1 div tag
	}

// Product Table

	$(document).ready(function () {
		$('#product').DataTable();
	});


</script>

@endsection
    
