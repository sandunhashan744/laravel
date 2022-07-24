<?php

namespace App\Http\Controllers\HomePage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\order;
use App\Models\orderItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class singalProductController extends Controller
{
    public function showProduct($id){

        $product = Product::findOrFail($id);

        $maincat=$product->cat;
        $subcat=$product->sub_cat;

        $recent_size=[];
        
        if(Auth::check())
        {  
          $user=Auth::id();
          
          $recent_size = DB::table('order_items')
          ->crossJoin('orders')
          ->select('order_items.size as size')
          ->where('order_items.cat_id','=',$maincat)
          ->where('order_items.subcat_id','=',$subcat)
          ->where('orders.uid','=',$user)
          ->orderBy('orders.id','desc') 
          ->limit(1)
          ->get();
        }
      
       // dd($recent_size);

        return view('elegent.single-product', compact('product','recent_size'));

       
        
        
    }
}
