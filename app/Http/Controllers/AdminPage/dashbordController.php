<?php

namespace App\Http\Controllers\AdminPage;

use App\Http\Controllers\Controller; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\order;
use App\Models\orderItem;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Carbon;

class dashbordController extends Controller
{
    function loaddashbord(){
        
        $oderCount = order::where('status',0)->count();
        $orderdetails = order::where('status',0)->get();
        $customer = User::all()->count();

        $create = order::whereDate('created_at', Carbon::today())->first();

        $profit = order::Select('totPrice')->where('status',1)->get();

        return view('/admin/index',compact('oderCount','orderdetails','customer','profit'));

        function loalcount()
        {
            return view('/layouts/adminlayouts',compact('oderCount'));
    
        }
    }


}
