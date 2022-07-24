<!DOCTYPE html>
<!-- === Coding by CodingLab | www.codinglabweb.com === -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- bootstrap CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- ===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <!-- Sweet Alerts-->
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!-- ===== CSS ===== -->
    <link rel="stylesheet" href="css/stylelr.css">

</head>
<body>
    <div class="container">
        <div class="forms">
  
        @yield('content')            
        
        </div>
    </div>
    
    <script src="js/scriptlr.js"></script>

    <script>
        @if(session('status'))
            <script>
                swal("{{session('status')}}");
            </script>
        @endif
    </script>
</body>
</html>