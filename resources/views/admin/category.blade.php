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

	<div class="table-data">
		<div class="todo">
			<div class="card">
				<div class="card-header" style="background-color:#71cd14;">
					<h6 style="color:#fff;">Add New Category</h6>
				</div>
				<div class="card-body">
					<form method="post" action="/seveCategory">
						@csrf
						<div class="row">
							<div class="col">
								<label for="inputAddress">Category</label>
								<input type="text" class="form-control" name="category" placeholder="category" required>
							</div>
						</div>
						<br>
						<button type="submit" class="btn btn-success float-end" ><i class="fa-solid fa-circle-plus"></i>  Create</button>
					</form>
				</div>
			</div>
			<br>
			<hr><br>
<!--  ************************************ Form of Add Sub Category ****************************************   -->
			
			<div class="card">
				<div class="card-header" style="background-color:#71cd14;">
					<h6 style="color:#fff;">Add Sub Category</h6>
				</div>
				<div class="card-body">
					<form method="post" action="/seveSubCategory">
						@csrf
						<div class="row">
							<div class="col">
								<label for="inputAddress">Category</label>
								{!! F::select('category',$data1,null, ['class' => 'form-select']) !!}
							</div>

							<div class="col">
								<label for="inputAddress">Sub Category</label>
								<input type="text" class="form-control" name="subcat" placeholder="sub Category" required>
							</div>
						</div>
						<br>
						<button type="submit" class="btn btn-success float-end" ><i class="fa-solid fa-circle-plus"></i>  Create</button>
					</form>
				</div>
			</div>
		</div>
		
<!-- ************************************ Table of Category **************************************** -->
		
		<div class="order">
			<div class="card">
				<div class="card-header" style="background-color:#71cd14;">
					<h6 style="color:#fff;">Category Details</h6>
				</div>
				<div class="card-body">
					<table>
						<thead>
							<tr>
								<th>Sub Category</th>
								<th>Category</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach($data as $tab)
							<tr>
								<td>{{ $tab-> SubCat}}</td>
								<td>{{ $tab->category->category}}</td>
								<td>
																	
									<a href="{{ route('category.delete',$tab-> id)}}" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></a>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</main>								

<script>
	@if(session('status'))
		<div class="alert alert-success">
			{{ session('status') }}
		</div>
	@endif
</script>
		<!-- MAIN -->
@endsection
    
    
	