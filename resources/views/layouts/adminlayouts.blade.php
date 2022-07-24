<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
	<!--bootstrap CSS only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	
	<link rel="stylesheet" href="https://cdn.datatables.net/1.12.0/css/dataTables.bootstrap5.min.css">

	<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.12.0/js/dataTables.bootstrap5.min.js"></script>

	<!-- JavaScript Bundle with Popper -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

	<!-- Sweet Alerts-->
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	
	<!-- My CSS -->
	<link rel="stylesheet" href="/css/admin/style.css">


	<title>Elegent-Admin</title>
</head>
<body>

	<!-- SIDEBAR -->
	<section id="sidebar"><!--
		<a href="#" class="brand">
			<i class='bx bxs-smile'></i>
			<span class="text">Elegent</span>
		</a>-->
		<a class="brand" href="/admin">
            <img src="{{ asset('img/logo.png') }}" alt="" />
        </a>

		<ul class="side-menu top">
			<li class="{{ (request()->is('admin')) ? 'active' : '' }}">
				<a href="/admin">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li class="{{ (request()->is('product')) ? 'active' : '' }}">
				<a href="{{ route('product.details')}}">
					<i class='bx bxs-cart-add' ></i>
					<span class="text">Products</span>
                   
				</a>
			</li>
			<li class="{{ (request()->is('category')) ? 'active' : '' }}">
				<a href="{{ route('category') }}">
					<i class='bx bxs-doughnut-chart' ></i>
					<span class="text">Category</span>
				</a>
			</li>
			<li class="{{ (request()->is('view/orders')) ? 'active' : '' }}">
				<a href="{{ route('view.order.admin') }}">
					<i class='bx bxs-shopping-bags' ></i>
					<span class="text">Order Details</span>
				</a>
			</li>
			<li class="{{ (request()->is('customers')) ? 'active' : '' }}">
				<a href="{{ route('customer.details')}}">
					<i class='bx bxs-user' ></i>
					<span class="text">Customer</span>
				</a>
			</li>
			
		</ul>
		<ul class="side-menu">
			<li class="{{ (request()->is('admin/size-manage')) ? 'active' : '' }}">
				<a href="{{ route('manage.size') }}">
					<i class='bx bxs-cog' ></i>
					<span class="text">Settings</span>
				</a>
			</li>
			<li class="{{ (request()->is('')) ? 'active' : '' }}">
				<a href="#" class="logout">
					<i class='bx bxs-log-out-circle' ></i>
					<span class="text">Logout</span>
				</a>
			</li>
		</ul>
	</section>
	<!-- SIDEBAR -->

	<!-- CONTENT -->
	<section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu' ></i>
			<a href="#" class="nav-link">Categories</a>
			<form action="#">
				<div class="form-input">
					<input type="search" placeholder="Search...">
					<button type="submit" class="search-btn"><i class='bx bx-search' ></i></button>
				</div>
			</form>
			<input type="checkbox" id="switch-mode" hidden>
			<label for="switch-mode" class="switch-mode"></label>
			<a href="#" class="notification">
				<i class='bx bxs-bell' ></i>
				<span class="num">1</span>
			</a>
			<a href="#" class="profile">
				<img src="">
			</a>
		</nav>
    <!-- NAVBAR -->

    <!-- MAIN -->

    @yield('content')

		
	@if(session('status'))
	<script>
		swal("{{session('status')}}");
	</script>
	@endif
    <!-- MAIN -->
</section>

  <!-- Icone Font awesome -->
  <script src="https://kit.fontawesome.com/9778c4863d.js" crossorigin="anonymous"></script>

	<script src="/js/admin/script.js"></script>
	
</body>
</html>