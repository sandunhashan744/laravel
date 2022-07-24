<?php

namespace App\Http\Controllers\AdminPage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\order;


class orderViewController extends Controller
{
    // Admin View Orders
    public function viewOrder(){

        $orders= order::where('status','0')->get();    
        return view('/admin/order/viewOrder',compact('orders'));
    }
    
    //Admin View Order Details
    public function viewOrderDetails($id){

        $orders = order::where('id',$id)->first();
        return view('/admin/order/viewOrderDetails',compact('orders'));
    }

    // Admin View Order-History
    public function viewOrderHistory(){

        $orders= order::where('status','1')->get();    
        return view('/admin/order/viewOrderHistory',compact('orders'));
    }

    public function updateStatus(Request $request,$id){

        $orders= order::find($id);
        
        $orders->status = $request->input('order_status');

        $orders->update();

        return redirect('view/orders')->with('status','Order Status Updated..!');
    }
    
}
