@extends('layouts.adminlayouts')

@section('content')

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
		<div class="order1" style="width:100%">
			<div class="card">
				<div class="card-header" style="background-color:#71cd14;">
                    <a href="{{ url('view/orders') }}" class="btn btn-danger float-end"><i class="fa-solid fa-xmark"></i></a>
					<h5 style="color:#fff;">Order History Details</h5>
				</div>
				<div class="card-body">
					<table id="orderView" class="table" style="width:100%">
						<thead>
							<tr><br>
								<th>Tracking.NO</th>
								<th>order Date</th>	
								<th>Tot.Price</th>
								<th>Status</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach($orders as $order)
							<tr>
								<td>{{$order->tracking_no}}</td>
								<td>{{ date('Y/m/d', strtotime($order->created_at));}}</td>
								<td>{{$order->totPrice}}</td>
								<td>{{$order->status == '0' ? 'Pending':'Completed'}}</td>
								<td>								
									<a href="{{url('admin/order-details/'.$order->id)}}" class="btn btn-primary"> <i class="fa-solid fa-eye"></i>  View</a>
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
    
    $(document).ready(function () {
        $('#orderView').DataTable();
	});

</script>
@endsection
