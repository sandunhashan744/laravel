<?php

namespace App\Http\Controllers\HomePage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\order;

class userController extends Controller
{
    public function index(){

        $orders=order::where('uid',Auth::id())->get();

        return view('elegent.myorder', compact('orders'));
    }

    public function view($id){
       
        $orders = order::where('id',$id)->where('uid', Auth::id())->first();

        return view('elegent.orderview',compact('orders'));
    }
   
}
