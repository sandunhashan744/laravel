
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
<!-- ************************************ Table of Customer **************************************** -->
	<div class="table-data">
		<div class="todo">
			<div class="order">
				<div class="card" style="aline:center">
					<div class="card-header" style="background-color:#71cd14;">
						<h5 style="color:#fff;">Customer Details</h5>
					</div>					
					<div class="card-body">
						<table id="example" class="table" style="width:100%">
							<thead>
								<tr>
									<th class="th-sm">Customer ID</th>
									<th class="th-sm">Name</th>
									<th class="th-sm">Email</th>
									<th class="th-sm">Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach($customer as $cust)
								<tr>
									<td>
										<img src=""   width = "30" height = "30">
										<p>{{ $cust-> id}}</p>
									</td>

									<td>{{ $cust-> name }}</td>
									<td>{{ $cust-> email }}</td>
									<td>  
										<a href="" class="btn btn-danger"><i class='bx bxs-checkbox-minus'></i></a>
									</td>
								</tr>
								@endforeach
							</tbody>
							<tfoot>
								<tr>
									<th>Customer ID</th>
									<th>Name</th>
									<th>Email</th>
									<th>Action</th>
								</tr>
							</tfoot>
						</table> 
					</div>
				</div>
			</table>
		</div>
	</div>

</main>

<script>

	$(document).ready(function () {
    	$('#example').DataTable();
	});

</script>

@endsection
