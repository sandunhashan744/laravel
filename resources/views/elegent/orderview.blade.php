@extends('layouts.mainlayouts')

@section('content')

<div class="container py-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" style="background-color:#71cd14;">
                    <h4  style="color: #ffffff;">Order View
                    <a href="{{ url('my-orders') }}" class="btn btn-outline-dark float-right"><i class="fa-solid fa-circle-right"></i> back</a>
                </h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-5">
                            <h4>Shipping Details</h4>
                            <hr>
                            <label for="">Name</label>
                            <div class="border p-2">{{ $orders->name }}</div>
                            <label for="">Email</label>
                            <div class="border p-2">{{ $orders->email }}</div>
                            <label for="">Contct No.</label>
                            <div class="border p-2">{{ $orders->phone }}</div>
                            <label for="">Shipping Address</label>
                            <div class="border p-2">
                                {{ $orders->address1}},
                                {{ $orders->address2}},
                                {{ $orders->town}},
                                {{ $orders->district}},
                            </div>
                            <label for="">ZIP Code</label>
                            <div class="border p-2">{{ $orders->zipcode }}</div>
                        </div>

                        <div class="col-md-7">
                            <h4>Order Details</h4>
                            <hr>
                            <table id="myOrder" class="table table-hover table-dark" style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="th-sm">product</th>
                                        <th class="th-sm">Name </th>
                                        <th class="th-sm">Size </th>
                                        <th class="th-sm">Qty</th>
                                        <th class="th-sm">Uni.Pri</th>
                                        <th class="th-sm">tot.Pri</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $total=0; @endphp
                                    @foreach($orders->orderItems as $item)
                                    <tr>
                                        <td>
                                            <img src="{{ asset('productimg/'.$item->products->image) }}"  width = "60" height = "50" alt="Product Image">
                                        </td>
                                        <td>{{$item->products->name}}</td>
                                        <td>{{$item->size}}</td>
                                        <td>{{$item->qty}}</td>
                                        <td>{{$item->price}}</td>
                                        <td>{{$item->price * $item->qty}}</td>
                                    </tr>
                                    @php $total += $item->price * $item->qty; @endphp
                                    @endforeach
                                </tbody>
                            </table>
                            <h4>Grand Total: Rs.{{$total}}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection