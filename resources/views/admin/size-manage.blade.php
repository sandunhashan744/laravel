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
<!-- ************************************ Table of Category **************************************** -->
   
    <div class="table-data">
		<div class="order1" style="width:100%">
            <div class="card" style="aline:center">
				<div class="card-header" style="background-color:#71cd14;">
					<h5 style="color:#fff;">Size Details
                        <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#manageSize">
                            <i class='bx bx-plus-medical' ></i> Manage Size </button></h5>
					</h5>
				</div>
			
				<div class="card-body"><br>
<!--
			<div class="head">
				<h4 style="text-align: center;">Size Details</h4>
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#manageSize"><i class='bx bx-plus-medical' ></i> Manage Size </button>
			</div>
-->
                    <table id="size" class="table" style="width:100%">
                        <thead>
                            <tr>
                            <th class="th-sm">Cat.</th>
                            <th class="th-sm">sub-Cat.</th>
                            <th class="th-sm">Size</th>
                            <th class="th-sm">Sholder</th>
                            <th class="th-sm">Chest</th>
                            <th class="th-sm">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($sizeMana as $size)
                            <tr>
                                <td>{{$size->category->category}}</td>
                                <td>{{$size->subcat->SubCat}}</td>
                                <td>{{$size->size_lbl}}</td>
                                <td>{{$size->sholder}}</td>
                                <td>{{$size->chest}}</td>
                                <td>
                                    <a href="{{ route('sizePro.edit', $size-> id)}}" class="btn btn-primary"><i class='bx bxs-edit'></i></a>
                                    
                                    <a href="{{ route('sizePro.delete', $size-> id)}}" class="btn btn-danger"><i class='bx bxs-checkbox-minus'></i></a>
                                </td>				
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>  
        </div>
    </div>


<!-- ******************************************************* -->
  
    <div class="modal fade" id="manageSize" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header" style="background-color:#71cd14;">
                    <h5 class="modal-title" id="staticBackdropLabel" style="color:#fff;">Size Optimize</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/sizeOptimize" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row sizeMana">
                            <div class="col">
                                <label for="inputAddress">Category</label>
                                {!! F::select('category',$cate,null, ['class' => 'form-select maincat']) !!}
                                
                            </div>
                            <div class="col">
                            <label for="inputAddress">sub-Category</label>
                            {!! F::select('SubCat',$subcat,null, ['class' => 'form-select']) !!}
                            </div>
                        </div>
                        <br>
                        <div class="row">
                        <div class="col">
                            <label for="inputAddress">Select Size</label>
                            <select class="form-select" aria-label="Default select example" name="size">
                                <option value="null">select Product</option>
                                <option value="s">S</option>
                                <option value="m">M</option>
                                <option value="l">L</option>
                                <option value="xl">XL</option>
                            </select>
                            </div>
                            
                            <div class="col">
                                <label for="inputAddress">Product</label>
                                {!! F::select('pname',$product,null, ['class' => 'form-select']) !!}
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col">
                                <label for="inputAddress">Sholder Size &nbsp;&nbsp;'*Inch'</label>
                                <input type="text" class="form-control" name="sholder" placeholder="Sholder Size">
                            </div>
                            <div class="col">
                                <label for="inputAddress">chest Size &nbsp;&nbsp;'*Inch'</label>
                                <input type="text" class="form-control" name="chst" placeholder="chest Size">
                            </div>
                        </div>
                        <br>
                        
                    <br>	
                    <div class="modal-footer">    
                        <button type="submit" class="btn btn-success" > <i class='bx bx-plus-medical'></i> Submit</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<!-- ***********************************  Popup *******************************-->

</main>

<script>
	$(document).ready(function () {
    	$('#size').DataTable();
	});

</script>
		<!-- MAIN -->
@endsection
