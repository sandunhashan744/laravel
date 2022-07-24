@extends('layouts.mainlayouts')

@section('content')

<section class="cart_area">
    <div class="container">
        <div class="cart">                                                              
            <div class="card-header" style="background-color:#71cd14;">
                <h4 style="color: #ffffff;">My Orders</h4>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <table id="myOrder" class="table table-hover table-dark" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="th-sm">Tracking No </th>
                                    <th class="th-sm">Total Price</th>
                                    <th class="th-sm">Status</th>
                                    <th class="th-sm">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                @foreach($orders as $order)
                                <tr>
                                    <td>{{$order->tracking_no}}</td>
                                    <td>{{$order->totPrice}}</td>
                                    <td>{{$order->status == '0' ? 'Pending':'Completed' }}</td>
                                    <td>
                                        <a href="{{ url('viewOrder/'.$order->id) }}" class="btn btn-success"> <i class="fa-solid fa-eye"></i>  View</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
        </div>    
    </div>      
</section>


<script>

    $(document).ready(function () {
        $('#myOrder').DataTable();
    });

</script>

@endsection