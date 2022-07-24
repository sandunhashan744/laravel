
@extends('layouts.adminlayouts')

@section('content')

<!-- MAIN -->
<main>
	<div class="head-title">
		<div class="left">
			<h1>Dashboard</h1>
			<ul class="breadcrumb">
				<li>
					<a href="#">Dashboard</a>
				</li>
				<li><i class='bx bx-chevron-right' ></i></li>
				<li>
					<a class="active" href="#">Home</a>
				</li>
			</ul>
		</div>
		<!--
			<a href="#" class="btn-download">
				<i class='bx bxs-cloud-download' ></i>
				<span class="text">Download PDF</span>
			</a>
		-->
	</div>

	<ul class="box-info">
		<li>
			<i class='bx bxs-calendar-check' ></i>
			<span class="text">
				<h3>{{$oderCount}}</h3>
				<p>Today Orders</p>
			</span>
		</li>
		<li>
			<i class='bx bxs-group' ></i>
			<span class="text">
				<h3>{{$customer}}</h3>
				<p>customers</p>
			</span>
		</li>
		<li>
			<i class='bx bxs-dollar-circle' ></i>
			<span class="text">
				@php $tot=0; @endphp
				@foreach($profit as $profit)
				<h3 hidden>{{$tot += $profit->totPrice}}</h3>
				@endforeach
				<h3>Rs.{{$tot}}</h3>
				<p>Total Sales</p>
			</span>
		</li>
	</ul>

	<div class="table-data">
		<div class="order" >
			<div class="card ">
			<div class="card-header" style="background-color:#71cd14;">
				<h4 style="color:#fff;">Recent Orders</h4>
			</div>
			<div class="card-body">
				<table id="resentOrder" class="table" style="width:100%">
					<thead>
						<tr>
							<th>User</th>
							<th>Date Order</th>
							<th>Tracking No</th>
							<th>Status</th>
						</tr>
					</thead>
					<tbody>
					@foreach($orderdetails as $order)
						<tr>
							<td>
								<img src="img/people.png">
								<p>{{$order->name}}</p>
							</td>
							<td>{{date('Y/m/d', strtotime($order->created_at));}}</td>
							<td>{{$order->tracking_no}}</td>
							<td> {{$order->status == '0' ? 'Pending':'Completed' }}
							</td>
						</tr>
					@endforeach
					</tbody>
				</table>
			</div>
			</div>
		</div>
		<!--
		<div class="todo">
			<div class="head">
				<h3>Todos</h3>
				<i class='bx bx-plus' ></i>
				<i class='bx bx-filter' ></i>
			</div>
			
			<ul class="todo-list">
				<li class="completed">
					<p>Todo List</p>
					<i class='bx bx-dots-vertical-rounded' ></i>
				</li>
				<li class="completed">
					<p>Todo List</p>
					<i class='bx bx-dots-vertical-rounded' ></i>
				</li>
				<li class="not-completed">
					<p>Todo List</p>
					<i class='bx bx-dots-vertical-rounded' ></i>
				</li>
				<li class="completed">
					<p>Todo List</p>
					<i class='bx bx-dots-vertical-rounded' ></i>
				</li>
				<li class="not-completed">
					<p>Todo List</p>
					<i class='bx bx-dots-vertical-rounded' ></i>
				</li>
			</ul>

		</div>
-->
	</div>
</main>
<!-- MAIN -->

<script>
	$(document).ready(function () {
		$('#resentOrder').DataTable();
	});

</script>
@endsection
