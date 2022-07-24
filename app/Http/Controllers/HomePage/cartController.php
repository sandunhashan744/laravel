<?php

namespace App\Http\Controllers\HomePage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class cartController extends Controller
{
    // Add item to Cart
    public function addCart(Request $request){
        
        $pid = $request->input('pid');
        $pCat = $request->input('pcat');
        $psubCat = $request->input('psubcat');
        $pname = $request->input('pname');
        $pSize = $request->input('prodSize');
        $pQty = $request->input('prodQty');


        if(Auth::check()){
            
            $prochk=Product::where('id',$pid)->first();

            if($prochk){

                if(Cart::where('pro_id',$pid)->where('cus_id',Auth::id())->exists())
                {
                    return response()->json(['status' => $prochk->name. "  Alredy Added...!"]);
                }else{
                    
                    $cartItem = new Cart();
                    $cartItem->pro_id=$pid;
                    $cartItem->cus_id= Auth::id();
                    $cartItem->pro_name=$pname;
                    $cartItem->catid=$pCat;
                    $cartItem->subcatid=$psubCat;
                    $cartItem->size=$pSize;
                    $cartItem->qty=$pQty;
                    
                    $cartItem->save();

                   // return response()->json(['status' => $prochk->name. "  Added Success...!"]);
                }
            }

        }else{
            return response()->json(['status' => "Login to Continue...!"]);
        }

    }

    //calculate the Cart Count

    public function cartCount(){
    
        $cartCount = Cart::where('cus_id', Auth::id())->count();

        return response()->json(['count'=> $cartCount]);
    }

    public function viewCart(){
        
        $cartItem= Cart::Where('cus_id',Auth::id())->get();

        return view('elegent.cart',compact('cartItem'));
    }

    //Delete Item from Cart
    public function removeCart(Request $request){
        
        if(Auth::check()){
            $proId = $request->input('proId');

            if(Cart::where('pro_id',$proId)->where('cus_id',Auth::id())->exists()){

                $cartItem=Cart::where('pro_id',$proId)->where('cus_id',Auth::id())->first();
                $cartItem->delete();

                return response()->json(['status' => "Product Remove from the Cart Successfully"]);
            }

        }else{
            return response()->json(['status' => "Login to Continue...!"]);
        }
    } 

    //Update Price
    public function updatePrice(Request $request){
        
        $proId = $request->input('proid');
        $proQty = $request->input('proQty');

       if(Auth::check())
       {
            if(Cart::where('pro_id',$proId)->where('cus_id',Auth::id())->exists())
            {
                $cart=Cart::where('pro_id',$proId)->where('cus_id',Auth::id())->first();
                $cart->qty=$proQty;
                $cart->update();
                return response()->json(['status' => "Update...!"]);
            }
       }
    }

}
